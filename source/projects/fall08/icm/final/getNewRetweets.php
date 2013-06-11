<?php
	include('/home/memento85/private/dbAccess.php');
	$retweetsPerSearch = 50;
	$null_author = '1';
	$database = 'retweettree';
	$englishOnly = '';//'&lang=en';
	$signifiers = array('Retweeting', 'RT', 'R/T', 'RTWT', 'Retweet');
		
  dbConnect($database);
	$last_id = 0;
	$select_query = "SELECT * FROM tweets ORDER BY tweet_id DESC LIMIT 1";
	$select_result = mysql_query($select_query);
	if ($select_result) {
		$select_resultArray = mysql_fetch_array($select_result);
		$last_id =$select_resultArray[0];
	}
	println('last_id = ' . $last_id);
 	dbClose();
	
  for ($i = 0; $i < count($signifiers); $i += 1) {
		$xml = getXMLObjectFromURL('http://search.twitter.com/search.atom?ands=' . $signifiers[$i] . '&rpp=' . $retweetsPerSearch . $englishOnly . '&since_id=' . $last_id);
		handleSearchResults($xml);
	}
	
	

function resolveTweetChain($entry, $child_id, $grandchild_id, $is_leaf) {
	if (($entry == NULL) || ($entry->author == NULL)) {
		println('___________NULL ENTRY/AUTHOR');
		return false;		//idk why i need this, but i do
	}
	
	$tweet_id = substr($entry->id, strpos($entry->id, ":", strpos($entry->id, ',')) + 1);
	$author = strtok(mysql_escape_string($entry->author->name), " ");
	$text = mysql_escape_string($entry->title);
	$loc_lat = getLocLat($author);
	$loc_lon = getLocLon($author);
	$time = mysql_escape_string($entry->updated);
	
	println('.................................................................\n\n\n');
	println('#' . $tweet_id . '  ' . $author . ': ' . $text);	
	
	if ($tweet_id == $grandchild_id) {
		println('___________INFINITE LOOP AVERTED');
		return false;
	}
	
	if ($is_leaf && isTweetInDB($tweet_id)) {
		println('___________REPEATED LEAF');
		return false;
	}
			
			
	if (($loc_lat == '') || ($loc_lon == '')) {
		println('___________INVALID LOCATION');
		return false;
		
	} elseif (!isSignifierFirst($text)) {
		if ($is_leaf) {
			println('___________INVALID RETWEET');
			return false;
		} else {
		  insertTweet($tweet_id, $author, $text, $loc_lat, $loc_lon, $time, NULL);
			println('-----------ROOT INSERTED');
		  return $tweet_id;	//ahh no return type, the parent call will need to know what its parent is
		}
		
	} else {	//signifier is first
		$offset_author = strpos($text, '@');											// get the position of the @
		if ($offset_author) {																			// if there was an @
			$offset_author += 1;																		// move past it to the next character
			
			$offset_text = findOffsetText($text, $offset_author);
																															// the text starts right after the author ends
			if (($offset_text > $offset_author) && ($offset_text < strlen($text))) {			//we dont want it to keep goijng iof the whole string is bad
				$query_author = substr($text, $offset_author, $offset_text - $offset_author);		
																															// get the author, which is the substring between the start of the author and the start of the text
			} else {																									// else there was no @, we have a bad retweet
				println('___________WEIRD TEXT FORMATION');
				return false;
			}
			
			$query_text = trim(substr($text, $offset_text + 1));
		
		} else {																									// else there was no @, we have a bad retweet
			println('___________@AUTHOR NOT IN TWEET');
			return false;
		}

		$query_result = searchForTweet($query_author, substr($query_text, 0, 138));
	
		if ($query_result) {
			$recursive_return = resolveTweetChain($query_result->entry, $tweet_id, $child_id, false);
   	  if ($recursive_return) {
   		  insertTweet($tweet_id, $author, $text, $loc_lat, $loc_lon, $time, $recursive_return);
   			println('-----------BRANCH INSERTED');
   		 	return $tweet_id;
   	  } else {
				println('___________(RECURSION FAILED)');
	      return false;
			}
		} else {
			println('___________TWEET NOT FOUND');
			return false;
		}		
	}
}


function findOffsetText($text, $offset_author) {
	$colon_offset = strpos($text, ':', $offset_author);
	$dash_offset = strpos($text, '-', $offset_author);
	$space_offset = strpos($text, ' ', $offset_author);

	if ($colon_offset < $offset_author) $colon_offset = strlen($text);
	if ($dash_offset < $offset_author) $dash_offset = strlen($text);
	if ($space_offset < $offset_author) $space_offset = strlen($text);
	
	
	return min($colon_offset, $dash_offset, $space_offset);
}

function isSignifierFirst($text) {
	global $signifiers;
	
	$tok = strtok($text, " ");
	
  for ($i = 0; $i < count($signifiers); $i += 1) {
		if (($tok == $signifiers[$i]) || ($tok == strtolower($signifiers[$i])))
			return true;
	}
	
	return false;
}

function handleSearchResults($xml) {
	global $retweetsPerSearch, $database, $null_author;
	
  dbConnect($database);
  
  for ($i = 0; $i < $retweetsPerSearch; $i += 1) {	//dont update if its already there!
		$tweet_id = resolveTweetChain($xml ->entry[$i], NULL, NULL, true);			
	//	if ($tweet_id)	updateRetweetCounts($tweet_id);
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

function searchForTweet($author, $text) {
	global $englishOnly;
	
	$xml = getXMLObjectFromURL("http://search.twitter.com/search.atom?ands=" . urlencode($text) . "&from=" . $author . $englishOnly);
	
	return ($xml); 	//NOTE TEST THIS FOR FAIL RETURN VALUE
}
	
	
function isTweetInDB($tweet_id) {
	$query = "SELECT * FROM tweets WHERE tweet_id=" . $tweet_id;
	$result = mysql_query($query);
	return(mysql_fetch_row($result));
}


function getTweetID($author, $original) {
	$query = "SELECT tweet_id FROM tweets WHERE author=\"" . $author . "\" AND original=\"" . $original . "\"";
	
	$result = mysql_query($query);
 	$resultArray = mysql_fetch_array($result);
	
	return($resultArray[0]);
}

function insertTweet($tweet_id, $author, $text, $loc_lat, $loc_lon , $time, $parent_id) {
	$time = substr($time, 0, 10) . " " . substr($time, 11, 8);
	
	if ($parent_id == NULL) {
		$insert_query = "INSERT INTO tweets (tweet_id, author, original, loc_lat, loc_lon, time, num_retweets) values (" . $tweet_id . ", \"" . $author . "\", \"" . $text . "\", " . $loc_lat . ", " . $loc_lon . ", \"" . $time . "\", " . 0 . ")";		
	} else {
	
		$temp_result = mysql_query("SELECT loc_lat, loc_lon FROM tweets WHERE tweet_id=" . $parent_id);
		$temp_resultArray = mysql_fetch_array($temp_result);

		$parent_dist = distance($loc_lat, $loc_lon, $temp_resultArray[0], $temp_resultArray[1], 'm');
	
	
		$insert_query = "INSERT INTO tweets (tweet_id, author, original, loc_lat, loc_lon, time, num_retweets, parent_id, parent_dist) values (" . $tweet_id . ", \"" . $author . "\", \"" . $text . "\", " . $loc_lat . ", " . $loc_lon . ", \"" . $time . "\", " . 0 . ", " . $parent_id . ", " . $parent_dist . ")";		
	} 

	$insert_result = mysql_query($insert_query);
	if ($insert_result)	updateRetweetCounts($tweet_id);

	return ($insert_result); //if it fails, it will return false
	
}
function updateRetweetCounts($tweet_id) {
	$select_query = "SELECT parent_id FROM tweets WHERE tweet_id=" . $tweet_id;
	$select_result = mysql_query($select_query);
	$select_resultArray = mysql_fetch_array($select_result);
	$parent_id = $select_resultArray[0];
	
	if (!$parent_id || ($parent_id == NULL)) {
		return;
	} else {
		$select_query = "SELECT num_retweets FROM tweets WHERE tweet_id=" . $parent_id;
		$select_result = mysql_query($select_query);
		$select_resultArray = mysql_fetch_array($select_result);
		$newTotal = $select_resultArray[0] += 1;
		
		$update_query = "UPDATE tweets SET num_retweets=" . $newTotal . " WHERE tweet_id=" . $parent_id;
		mysql_query($update_query);
		
		updateRetweetCounts($parent_id);
	}
}

function println ($string_message) {
	// from http://us2.php.net/manual/en/function.print.php#83241
  // $_SERVER['SERVER_PROTOCOL'] ? print "$string_message<br />" : print "$string_message\n";
  echo($string_message);
}



//FOUND CODE
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  this routine calculates the distance between two points (given the     :*/
/*::  latitude/longitude of those points). it is being used to calculate     :*/
/*::  the distance between two zip codes or postal codes using our           :*/
/*::  zipcodeworld(tm) and postalcodeworld(tm) products.                     :*/
/*::                                                                         :*/
/*::  definitions:                                                           :*/
/*::    south latitudes are negative, east longitudes are positive           :*/
/*::                                                                         :*/
/*::  passed to function:                                                    :*/
/*::    lat1, lon1 = latitude and longitude of point 1 (in decimal degrees)  :*/
/*::    lat2, lon2 = latitude and longitude of point 2 (in decimal degrees)  :*/
/*::    unit = the unit you desire for results                               :*/
/*::           where: 'm' is statute miles                                   :*/
/*::                  'k' is kilometers (default)                            :*/
/*::                  'n' is nautical miles                                  :*/
/*::  united states zip code/ canadian postal code databases with latitude & :*/
/*::  longitude are available at http://www.zipcodeworld.com                 :*/
/*::                                                                         :*/
/*::  For enquiries, please contact sales@zipcodeworld.com                   :*/
/*::                                                                         :*/
/*::  official web site: http://www.zipcodeworld.com                         :*/
/*::                                                                         :*/
/*::  hexa software development center © all rights reserved 2004            :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
function distance($lat1, $lon1, $lat2, $lon2, $unit) { 
	if (($lat1 == $lat2) && ($lon1 == $lon2)) return 0;

	$theta = $lon1 - $lon2; 
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
	$dist = acos($dist); 
	$dist = rad2deg($dist); 
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K") {
		return ($miles * 1.609344); 
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
}


?>

