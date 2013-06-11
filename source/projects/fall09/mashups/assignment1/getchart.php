<?php
    require_once("error_reporting.php");
    require_once("datevalidate.php");
    
    // a simple comparator function to determine which (song) element has the greater rank
    function compare_ranks($elem1, $elem2) {
        $elem1_rank = (int)$elem1['rank'];
        $elem2_rank = (int)$elem2['rank'];
        if ($elem1_rank == $elem2_rank) {
            return 0;
        }
        return ($elem1_rank < $elem2_rank) ? -1 : 1;
    }
    
    // I need to make the call to the API twice, so it made sense to decompose that here,
    //   it takes a starting inteer point in the charts and a date, and returns the json data we need as an array
    function getArrayForFiftyResultsStartingAt($start, $date) {
        // this really really does not feel like the right place to be requiring files, but otherwise the function can't see the variable
        //require("mashups_apikeys.php");                         // to use locally
        require("/home/memento85/private/mashups_apikeys.php");   // to use on webserver
        
        // assemble the API call
        $end_date = date("Y-m-d", $date);
        $start_date = date("Y-m-d", strtotime("-6 days",  $date));
        $base_url = "http://api.billboard.com/apisvc/chart/v1/list?api_key=" . $billboard_apikey;
        $request_url = $base_url . "&sdate=$start_date&edate=$end_date" .
                                   "&id=379&format=json&start=$start&count=50";
                                   
        // and return only the part of the response that we need
        $json_obj = json_decode(file_get_contents($request_url), True); // True to get an array back and not an object
        return $json_obj['searchResults']['chartItem'];
    }
    
    // Takes an date integer as a parameter and echos either an ordered list of the top ten results, or an error message
    function getChartForValidDate($userdate_as_time) {
        // get the results in two batches of 50, since we need 100 and that is the max, and then merge and sort
        $array1 = getArrayForFiftyResultsStartingAt(1, $userdate_as_time);
        $array2 = getArrayForFiftyResultsStartingAt(51, $userdate_as_time);
        $merged_array = array_merge($array1, $array2);
        usort($merged_array, "compare_ranks");
        
        // if we got results, go through the first ten and echo the artist and song
        if (count($merged_array) > 0) {
            echo "<p><ol>";
            for ($i = 0; $i < 10; $i++) {
                echo("<li>");

                echo $merged_array[$i]['artist'] . ' - ' . $merged_array[$i]['song'];

                echo("</li>");
            }    
            echo "</ol></p>";
        } else {
            echo "No results found for this date, even though it is within the permitted range.";
        }
    }
?>