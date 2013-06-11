<?php
    require_once("error_reporting.php");
    require_once("datevalidate.php");
    
    // a simple comparator function to determine which article is longer
    function compare_word_counts($elem1, $elem2) {
        $elem1_wc = (int)$elem1['word_count'];
        $elem2_wc = (int)$elem2['word_count'];
        if ($elem1_wc == $elem2_wc) {
            return 0;
        }
        return ($elem2_wc < $elem1_wc) ? -1 : 1;
    }
    
    // Takes an date integer as a parameter and returns a list of headlines for that date
    function getHeadlinesForValidDate($userdate_as_time) {
        // this really really does not feel like the right place to be requiring files, but otherwise the function can't see the variable
        //require("mashups_apikeys.php");                       // to use locally
        require("/home/memento85/private/mashups_apikeys.php"); // to use on webserver
        
        // assemble the API call and get the results from the response
        $base_url = "http://api.nytimes.com/svc/search/v1/article?api-key=" . $nyt_apikey;
        $request_url = $base_url . "&fields=title,small_image,small_image_url,word_count" .
                                   "&query=" .
                                   "date:[" . date("Ymd", $userdate_as_time) . "]" .
                                   "page_facet:[1]";
        $json_obj = json_decode(file_get_contents($request_url), True); // True to get an array back and not an object
        $results = $json_obj['results'];

        usort($results, "compare_word_counts");
        $html = "<ul>";
        for ($i = 0; $i < count($results); $i++) {
            if (array_key_exists('small_image', $results[$i])) {
                $html = $html . "<li class='hasimage'>";
                $html = $html . "<img src=" . $results[$i]['small_image_url'] . ">";
            } else {
                $html = $html . "<li>";
            }
            $html = $html . "<p>" . $results[$i]['title'] . "</p>";
        
            $html = $html . "</li>";
        }
        return $html . "</ul>";
    }

    // So that the JS can pass the date as a parameter and get the html as the response    
    if (isset($_GET["date"])) {
        $validation_results = validate_date($_GET['date'], "1 January 1981");
        if ($validation_results[0]) {
            echo getHeadlinesForValidDate($validation_results[1]);
        }
    }
?>