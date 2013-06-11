<?php
	include('/home/memento85/private/dbAccess.php');
	$retweetsPerSearch = 3;
	$null_author = '1';
	$database = "retweettree";
	$englishOnly = '&lang=en';
	
	$xml = getXMLObjectFromURL('http://search.twitter.com/search.atom?ands=Retweeting&rpp=' . $retweetsPerSearch . $englishOnly);
	insertRetweetsIntoDB($xml);
	
	


function insertRetweetsIntoDB( $xml )
{
	global $retweetsPerSearch, $database, $null_author;
	
  dbConnect($database);
  
  for ($i = 0; $i < $retweetsPerSearch; $i += 1) {
		$cur = $xml ->entry[$i];
		
		$author = strtok(mysql_escape_string($cur->author->name), " ");
		$text = mysql_escape_string($cur->title);
		$loc_lat = getLocLat($author);
		$loc_lon = getLocLon($author);
		$time = mysql_escape_string($cur->updated);
		
		
		//echo('<br>' . $username . ' Lat = ' . getLocLat($username));
		//echo('<br>' . $username . ' Lon = ' . getLocLon($username));
		echo($author . ': ' . $text . '<br>');
		
		if (/*retweet string not at beginning*/ false) {
			echo('___________NOT A RETWEET<br>');
		} elseif (($loc_lat == '') || ($loc_lon == '')) {
			echo('___________INVALID LOCATION<br>');
		} elseif (isTweetInDB($author, $text)) {
			echo('___________TWEET IN DB<br>');
		} else {
				
			$offset_author = strpos($text, '@');
			$offset_text = strpos($text, ':');
			
			if ($offset_author) {
				$offset_author += 1;
				$orig_author = substr($text, $offset_author, $offset_text - $offset_author);
						
				if (strpos($orig_author, ' ')) {
					$offset_text = strpos($text, ' ', $offset_author);
					$orig_author = substr($text, $offset_author, $offset_text - $offset_author);
				}
			} else {
				$orig_author = $null_author;
			}

			$orig_text = trim(substr($text, $offset_text + 1));
			$orig_loc_lat = getLocLat($orig_author);
			$orig_loc_lon = getLocLon($orig_author);
			
			$orig = getOriginalTweet($orig_author, substr($orig_text, 0, 138));
			$orig_time = '';
	
			if (!$orig) {
				echo('______ORIG NOT FOUND<br>');
			} elseif (($orig_loc_lat == '') || ($orig_loc_lon == '')) {
				echo('______ORIG INVALID LOCATION<br>');
			} else { 

				$orig_time = mysql_escape_string($orig->updated);
				echo ('______ ORIG ' . $orig_author . ': ' . $orig_text . ' _at_ ' . $orig_time);
				
				
				if (isTweetInDB($orig_author, $orig_text)) {
					incrementNumRetweets($orig_author, $orig_text);
				} else {
	 				insertTweet($orig_author, $orig_text, $orig_loc_lat, $orig_loc_lon , $orig_time, 1, NULL);
				}
			
				insertTweet($author, $text, $loc_lat, $loc_lon , $time, 0, getTweetID($orig_author, $orig_text));
			}

		}
		
		echo('<br>..........................................................................................................................................................<br><br><br><br>');
  }
 
 dbClose();
}


function getLocLat($username) {
	$xml = getXMLObjectFromURL("http://twittervision.com/user/current_status/" . $username . ".xml");
	
	return ($xml->location->latitude);
}
function getLocLon($username) {
	$xml = getXMLObjectFromURL("http://twittervision.com/user/current_status/" . $username . ".xml");
	
	return ($xml->location->longitude);
}


function getXMLObjectFromURL($url) {
	$options = array( 'http' => array(
	    'user_agent'    => 'student',    // who am i
 	    'max_redirects' => 10,          // stop after 10 redirects
	    'timeout'       => 120          // timeout on response
	) );
	
	$context = stream_context_create( $options );
	$page    = @file_get_contents( $url, false, $context );

	return (simplexml_load_string($page)); 
}

function getOriginalTweet($username, $original) {
	global $englishOnly;

	$xml = getXMLObjectFromURL("http://search.twitter.com/search.atom?ands=" . urlencode($original) . "&from=" . $username . $englishOnly);
		
//	echo(var_dump($xml->entry) . '<br>');
	
	return ($xml);
}


function isTweetInDB($username, $original) {
	$query = "SELECT * FROM tweets WHERE author=\"" . $username . "\" AND original=\"" . $original . "\"";
	$result = mysql_query($query);
	return(mysql_fetch_row($result));
}

function getTweetID($username, $original) {
	$query = "SELECT tweet_id FROM tweets WHERE author=\"" . $username . "\" AND original=\"" . $original . "\"";
	
	$result = mysql_query($query);
 	$resultArray = mysql_fetch_array($result);
	
	return($resultArray[0]);
}

function insertTweet($author, $text, $loc_lat, $loc_lon , $time, $num_retweets, $parent_list) {
	$query = "INSERT INTO tweets (author, original, loc_lat, loc_lon, time, num_retweets, parent_list)	values (\"" . $author . "\", \"" . $text . "\", " . $loc_lat . ", " . $loc_lon . ", \"" . $time . "\", " . $num_retweets . ", \"" . $parent_list . "\")";		
	mysql_query($query);
}

function incrementNumRetweets($username, $original) {
	$query = "SELECT num_retweets FROM tweets WHERE author=\"" . $username . "\" AND original=\"" . $original . "\"";
	
	$result = mysql_query($query);
 	$resultArray = mysql_fetch_array($result);
	
	$newTotal = $resultArray[0] += 1;
 	
 	$query = "UPDATE tweets SET num_retweets=" . $newTotal . " WHERE author=\"" . $username . "\" AND original=\"" . $original . "\"";
	mysql_query($query);
} 

?>
