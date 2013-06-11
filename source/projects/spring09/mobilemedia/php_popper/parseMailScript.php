#!/usr/local/bin/php -q
<?
/*
	This is a rewrite in PHP of a Perl script that I wrote a while ago for grabbing MMS to email messages and doing something with them.  The perl version which is specific to posting to a blog via email can be found here: http://www.walking-productions.com/parseMailScript/
*/

/* --------------------------------------------------------------------------*/
/*                                                                           */
/* PHP Parse Mail Script											      	 */   
/* Written by Shawn Van Every <vanevery@walking-productions.com>             */
/*                                                                           */
/* Copyright (c) 2007-2008 Shawn Van Every <vanevery@walking-productions.com>*/
/*                                                                           */
/* This program is free software; you can redistribute it and/or             */
/* modify it under the terms of the GNU General Public License               */
/* as published by the Free Software Foundation; either version 2            */
/* of the License, or (at your option) any later version.                    */
/*                                                                           */
/* See file LICENSE for further informations on licensing terms.             */
/*                                                                           */
/* This program is distributed in the hope that it will be useful,           */
/* but WITHOUT ANY WARRANTY; without even the implied warranty of            */
/* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             */
/* GNU General Public License for more details.                              */
/*                                                                           */
/* You should have received a copy of the GNU General Public License         */
/* along with this program; if not, write to the Free Software Foundation,   */
/* Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           */
/*                                                                           */
/* --------------------------------------------------------------------------*/
	
	// For local install of PEAR
	//ini_set('include_path', '/home/vanevery/pear/lib/php/' . PATH_SEPARATOR . ini_get('include_path'));
	
	// Includes PEAR
	include("Net/POP3.php"); 
	include("Mail/mimeDecode.php"); 
		

	/* User Configurable Variables */

	// Gmail Settings
	$mailbox_username = "lehrburger.test@gmail.com";
	$mailbox_password = "ni8hy5hitt1osh";
	$mailbox_hostname = "ssl://pop.gmail.com";
	$mailbox_port = 995; // SSL
	
	// Normal POP settings
	//$mailbox_username = "xxx@xxx.com"; // CHANGE THIS LINE TO YOUR MAIL SERVER USERNAME
	//$mailbox_password = "xxx";  // CHANGE THIS LINE TO YOUR MAIL SERVER PASSWORD
	//$mailbox_hostname = "mail.xxx.com"; // CHANGE THIS LINE TO YOUR MAIL SERVER NAME
	//$mailbox_port = 110; // Default

	$temp_folder = "/home/memento85/lehrblogger.com/nyu/classes/spring09/mobilemedia/php_popper/tmp/"; // CHANGE THIS LINE TO THE FULL PATH TO A FOLDER WHERE TEMPORARY FILES WILL BE SAVED ON YOUR SERVER
	$attachment_output_folder = "/home/memento85/lehrblogger.com/nyu/classes/spring09/mobilemedia/php_popper/posts/"; // CHANGE THIS LINE TO THE FULL PATH TO A FOLDER WHERE THE ATTACHMENTS WILL BE SAVED ON YOUR SERVER
	$attachment_output_folder_relative = "http://lehrblogger.com/nyu/classes/spring09/mobilemedia/php_popper/posts/"; // CHANGE THIS LINE TO THE WEB ADDRESS OF THE ABOVE FOLDER WHERE THE ATTACHMENTS WILL BE SAVED

	// CHANGE THIS LINE TO FALSE TO NOT HAVE ANYTHING PRINTED OUT BY THE SCRIPT (STOP EMAILING YOU)
	$print_output = true;

	// YOU PROBABLY WANT THIS TO BE TRUE SO THE SAME MESSAGES DON'T KEEP GETTING POSTED
	$delete_messages = true; // Delete messages from your inbox as they are processed

	// list of attachment types that are allowd
	$message_mime_types = array("video/3gpp"=>"3gp", 
								"audio/x-wav"=>"wav", 
								"video/mp4"=>"mp4",
								"video/3gpp2"=>"3g2",
								"video/mpeg"=>"mpg",
								"video/quicktime"=>"mov",
								"video/x-quicktime"=>"mov",
								"video/x-msvideo"=>"avi",
								"image/jpg"=>"jpg",
								"image/jpeg"=>"jpg",
								"image/png"=>"png",
								"audio/vnd.wave"=>"wav"
								);

	// A list of domains that are allowed, put your own domain in this so you can post via email (iphone and other)
	$allowed_domains = array("mms.att.net","mobile.att.net","cingularme.com","messaging.sprintpcs.com","tmomail.net","vtext.com","mmode.com","alltel.net","vzwpix.com","mms.mycingular.com","nyu.edu","walking-productions.com","gmail.com"); 

	// A list of attachment filename regular expressions that you don't want included in the output of the script
	$bad_attachments = array("masthead.jpg","dottedLine_600.gif","spacer.gif","video.gif","dottedLine_350.gif"); 

	// A list of text regular expressions that you don't want included
	$bad_text = array("/nothingatall/",
		"/PIX.*FLIX.*Messaging/",
		"/To.*learn.*how.*you.*can.*snap.*pictures.*with.*your.*wireless.*phone/",
		"/To.*learn.*how.*you.*can/",
		"/www\.verizonwireless\.com/",
		"/To.*play.*video.*messages.*sent.*to.*email/",						"/process.*when.*asked.*to.*choose.*an.*installation.*type.*Minimum.*Recommended.*or.*Custom.*select/",
		"/If.*you.*can.*read.*this.*text/",
		"/^T-Mobile\$/",
		"/If.*you.*are.*having.*trouble.*playing.*this.*attachment/",
		"/This.*Video.*Message.*was.*sent.*from.*a.*T-Mobile.*video.*phone/",
		"/\.footer.*{/",
		"/font-family:.*Arial,.*;/",
		"/font-size.*;/",
		"/color:.*;/",
		"/text-decoration:.*;/",
		"/normal.*{/",
		"/This message was sent using service from Verizon Wireless!/",
		"/visit \/getitnow\/getflix./",
		"/, QuickTime 6.5 or higher is required. Visit www.apple.com\/quicktime\/download to download the free player or upgrade your existing QuickTime Player. Note: During the download/",
		"/Minimum for faster download./",
		"/<.*>/",
		"/^\n/",
		"/^\s+\n/",
		"/^\s\n/"
	); 

	// Turn on error reporting globally
	$error_reporting = 1;

	// All of the attachments for a message, needs to be global (for now)
	// array format: keys: filename, type, original_name
	$attachments = array();
	
	function decodeMessage($message)
	{
		$params = array();
		
		$params['include_bodies'] = TRUE;
		$params['decode_bodies']  = TRUE;
		$params['decode_headers'] = TRUE;

		$decoder = new Mail_mimeDecode($message);
		$structure = $decoder->decode($params);
		
		$textbody = parseMessage($structure);
		
		if (isset($structure->body))
		{
			$textbody = $structure->body;
		}

		return $textbody;
	}
	
	function checkMessagePart($original_name)
	{
		GLOBAL $bad_attachments;
		
		$good = true;
		
		for ($i = 0; $i < sizeof($bad_attachments) && $good; $i++)
		{
			if ($original_name == $bad_attachments[$i])
			{
				$good = false;
			}
		}
		
		return $good;
	}

	// FIX THIS
	function stripBadText($message_text)
	{
		GLOBAL $bad_text;
		
		$patterns = Array();
		$replacements = Array();
		for ($i = 0; $i < sizeof($bad_text); $i++)
		{
			$patterns[$i] = $bad_text[$i];
			$replacements[$i] = '';
		}
		$message_text = preg_replace($patterns,$replacements,$message_text);
		$message_text = preg_replace($patterns,$replacements,$message_text);

		return $message_text;
	}

	function saveMessagePart($part,$type,$original_name)
	{
		GLOBAL $attachments, $print_output, $attachment_output_folder, $attachment_output_folder_relative;
		
		if (checkMessagePart($original_name))
		{
			if ($print_output)
			{
				echo "Saving " . $type . "\n";
			}
			
			$fname = time() . rand(1000,9999) . "." . $type;
			$outputfname = $attachment_output_folder . $fname;
			$relativefname = $attachment_output_folder_relative . $fname;
			$fp = fopen($outputfname, 'w');
			fwrite($fp,$part);
			fclose($fp);

			$index = sizeof($attachments);

			$attachments[$index]['filename'] = $relativefname;
			$attachments[$index]['type'] = $type;
			$attachments[$index]['original_name'] = $original_name;
			
			return $fname;
		}
		else
		{
			if ($print_output)
			{
				echo "Not Saving " . $original_name . "\n";
			}
			return "";
		}
	}
	
	function parseAddressString($address)
	{
		$address_array = array();
		$address_array["host"] = "";
		$address_array["user"] = "";
		
		$ltsymbol = strpos($address,"<");
		$gtsymbol = strpos($address,">");
		$atsymbol = strpos($address,"@");
		
		$replacethese = array("<",">");

		if ($ltsymbol !== false && $gtsymbol !== false && $atsymbol !== false)
		{
			$address_array["user"] = substr($address,$ltsymbol+1,$atsymbol-$ltsymbol-1);
			$address_array["host"] = substr($address,$atsymbol+1,$gtsymbol-$atsymbol-1);
		}	
		else if ($atsymbol !== false)
		{
			$address_array["host"] = substr($address,$atsymbol+1,strlen($address)-1-$atsymbol);
			$address_array["user"] = substr($address,0,$atsymbol);

			$address_array["host"] = str_replace($replacethese,"",$address_array["host"]);
			$address_array["user"] = str_replace($replacethese,"",$address_array["user"]);
		}
		return $address_array;
	}	

	function parseMessage($structure)
	{
		GLOBAL $message_mime_types, $print_output;
		
		$message_text = "";

		if (isset($structure->parts))
		{
			foreach ($structure->parts as $part) 
			{
				// Get the original name
				if (isset($part->d_parameters['filename']))
				{
					$original_name = $part->d_parameters['filename'];
				}
				else
				{
					$original_name = "";
				}
			
				// Check to see if it is an allowed part
				$allowed_types = array_keys($message_mime_types);
				$allowed = false;
				for ($i = 0; $i < sizeof($allowed_types) && !$allowed; $i++)
				{
					if (strstr($part->headers['content-type'], $allowed_types[$i]))
					{
						$name = saveMessagePart($part->body, $message_mime_types[$allowed_types[$i]], $original_name);
					
						$allowed = true;
						
						// tell the user that we got something we want..
						if ($print_output)
						{
							echo "Found part " . $original_name . " of type " . $allowed_types[$i] . "\n";
						}
					}
				}
			
				// If it isn't one of the types we want
				if (!$allowed)
				{
					// see if it is multipart and parse again
					if (strstr($part->headers['content-type'], 'multipart'))
					{
						$message_text .= parseMessage($part);	
					}
					else if (strstr($part->headers['content-type'], 'text/plain'))
					{
						// if it is text, return that part
						if (isset($part->body))
						{
							$message_text .= $part->body;
						}
					}
					else if (strstr($part->headers['content-type'], 'text/html'))
					{
						// if it is html, return that
						if (isset($part->body))
						{
							$message_text .= $part->body;
						}
					}
					else
					{
						// Not a part we know about at the moment
						if ($print_output)
						{
							echo "Found a part that isn't recognized: " . $part->headers['content-type'] . "\n";
						}
					}
				}
    		}
		}
		return $message_text;
	}


	/* Main part of the script */
	
	// Turn error reporting on or off
	if ($error_reporting)
	{	
		ini_set('display_errors', true);
		ini_set('display_startup_errors', true);

		// You could also log them:
		//ini_set('log_errors', true);
		//ini_set('error_log', '/home/xxxx/php_errors.log');

		error_reporting(E_ALL);
	}
	else
	{
		ini_set('display_errors', false);
		ini_set('display_startup_errors', false);

		//ini_set('log_errors', false);
		//ini_set('error_log', '/home/xxxx/php_errors.log');

		error_reporting(0);
	}

	// Create a POP3 Object
	$pop3 = &new Net_POP3();
	
	// Connect to the mail box
	if ($pop3->connect($mailbox_hostname, $mailbox_port))
	{
		// Tell the user we are connected
		if ($print_output)
		{
			echo "Connected to $mailbox_hostname\n";
		}

		// Log in to the mail box
		if ($pop3->login($mailbox_username, $mailbox_password))
		{
			// Tell the user we are logged in
			if ($print_output)
			{
				echo "Logged in to $mailbox_hostname\n";
			}
		
			// Go through the messages
			// Messages start at index 1
			for ($i = 1; $i <= $pop3->numMsg(); $i++)
			{
				// Tell the user which message we are on
				if ($print_output)
				{
					echo "Message number: $i\n";
				}
				
				// Get the headers
				$headers = $pop3->getParsedHeaders($i);

				// Get and parse the from header
				$from = "";
				if (isset($headers["From"]))
				{
					$from = parseAddressString($headers["From"]);
				}
				else if (isset($headers["from"]))
				{
					$from = parseAddressString($headers["from"]);
				}

				if ($print_output) echo "from: " . $from['user'] . " " . $from['host'] . "\n";
				
				
				// Check allowed domains
				$allowed = false;
				
				for ($a = 0; $a < sizeof($allowed_domains) && !$allowed; $a++)
				{
					if ($from['host'] == $allowed_domains[$a])
					{
						$allowed = true;
					}
				}

				// If they are allowed, keep going
				if ($allowed)
				{
					// Tell the user we have a message from an allowed domain
					if ($print_output)
					{
						echo "Message from " . $from['host'] . " is allowed\n";
					}
				
					// Get the subject header
					$subject = "";
					if (isset($headers["Subject"]))
					{
						$subject = $headers["Subject"];
					}
					else if (isset($headers["subject"]))
					{
						$subject = $headers["subject"];
					}

					if ($subject == "" || $subject == null) { $subject = ""; }
				
					if ($print_output) echo "subject: $subject\n";
				
					// Get the message itself
					$message = $pop3->getMsg($i);
					$message_text = decodeMessage($message);
			
					if ($message_text == "" || $message_text === false)
					{
						//$message_text = $pop3->getBody($i);
						$message_text = "";
						if ($message_text === false)
						{
						   $message_text = "";
						}
					}

					if ($print_output) echo "body: $message_text\n";
				
					$message_text = stripBadText($message_text);

					if ($print_output) echo "text (after strip): $message_text\n";
					
					// Make sure that $attachments[0] exists before continuing
					if (!isset($attachments[0]['filename']))
					{
						$attachments[0]['filename'] = "";
					}
					
					if (!isset($attachments[0]['type']))
					{
						$attachments[0]['type'] = "";
					}
					
					if (!isset($attachments[0]['original_name']))
					{
						$attachments[0]['original_name'] = "";
					}
					
					
					#######
					# THIS IS WHERE YOU WOULD DO SOMETHING
					#######
					
					// Let's send something back
					// How about some data for the message
					$mailmsg = "Got your message.  It contained:";
					for ($a = 0; $a < sizeof($attachments); $a++)
					{
						$mailmsg .= $attachments[$a]['filename'] . " of type: " . $attachments[$a]['type'] . " originall called " . $attachments[$a]['original_name'] . "\n";
						$mailmsg .= "You can view it: " . $attachment_output_folder_relative . $attachments[$a]['filename'];
					}
										
					$mailsubject = "Response";
					$mailfrom = "meaningful@xxx.com";
					$mailto =  $from['user'] . "@" . $from['host'];
					$mailheaders = 'From: ' . $mailfrom . "\n"; 
					$mailheaders .= 'Reply-To: ' . $mailfrom . "\n"; 
					$mailheaders .= 'Return-Path: ' . $mailfrom . "\n";
					$mailheaders .= "Message-ID: <".time().">\n"; 
					$mailheaders .= "X-Mailer: Shawns PHP Mailer Function\n";          
					ini_set('sendmail_from',$mailfrom);
					$return = mail($mailto, $mailsubject, $mailmsg, $mailheaders);
					ini_restore('sendmail_from'); 
					echo "Mail Sent?: ";
					var_dump($return);
					// Finished sending back
					
					#######
					# YOU WOULD STOP DOING SOMETHING HERE
					#######
				}
				else
				{
					// Domain not allowed
					if ($print_output) 
					{
						echo $from['host'] . " is not an allowed domain\n";
					}
				}
				
				// Delete the messages if they want them deleted
				if ($delete_messages)
				{
					$pop3->deleteMsg($i);
				}
			}
		}
		else
		{
			// Couldn't login, tell the user
			if ($print_output)
			{
				echo "Couldn't log into to $mailbox_hostname with $mailbox_user $mailbox_password\n";
			}
		}
	}
	else
	{
		// Couldn't connect, tell the user
		if ($print_output)
		{
			echo "Couldn't connect to $mailbox_hostname\n";
		}
	}
	// Disconnect from the mailbox
	$pop3->disconnect();	
?>
