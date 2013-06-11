<?php
	include('/home/memento85/private/dbAccess.php');
	
  dbConnect('retweettree');
	
	$select_result = mysql_query("SELECT * FROM retweet_data");
	
	while ($row = mysql_fetch_array($select_result, MYSQL_ASSOC)) {
		$tweet_id = $row["tweet_id"];
		$author = mysql_escape_string($row["author"]);
		$text = mysql_escape_string($row["original"]);
		$loc_lat = $row["loc_lat"];
		$loc_lon = $row["loc_lon"];
		$time = substr($row["time"], 0, 10) . " " . substr($row["time"], 11, 8);
		$num_retweets = $row["num_retweets"];
		$parent_id = $row["parent_id"];
		
		if ($parent_id == NULL) {
			$insert_query = "INSERT INTO tweets (tweet_id, author, original, loc_lat, loc_lon, time, num_retweets) values (" . $tweet_id . ", \"" . $author . "\", \"" . $text . "\", " . $loc_lat . ", " . $loc_lon . ", \"" . $time . "\", " . $num_retweets . ")";		
		
		}	else {
			$temp_result = mysql_query("SELECT loc_lat, loc_lon FROM retweet_data WHERE tweet_id=" . $parent_id);
			$temp_resultArray = mysql_fetch_array($temp_result);

			$parent_dist = distance($loc_lat, $loc_lon, $temp_resultArray[0], $temp_resultArray[1], 'm');
			$insert_query = "INSERT INTO tweets (tweet_id, author, original, loc_lat, loc_lon, time, num_retweets, parent_id, parent_dist) values (" . $tweet_id . ", \"" . $author . "\", \"" . $text . "\", " . $loc_lat . ", " . $loc_lon . ", \"" . $time . "\", " . $num_retweets . ", " . $parent_id . ", " . $parent_dist . ")";		
		
		}
	
		$insert_result = mysql_query($insert_query);
		
		if (!$insert_result) {
			echo($insert_query .  "<br>");
		}
	}

 	dbClose();
	

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