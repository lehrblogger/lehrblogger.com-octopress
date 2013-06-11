<?php
    require_once("error_reporting.php");
    require_once("datevalidate.php");
    
    // Takes an date integer as a parameter and returns an image tag with the corresponding cover
    function getCoverForValidDate($userdate_as_time){
        // get the preceding Monday
        $day_of_week = date("w", $userdate_as_time);
        if ($day_of_week == 0) {        // if it's Sunday, go back a whole week
            $coverdate_as_time = strtotime("-6 days", $userdate_as_time);
        } else {                        // otherwise, just go back to the previous Monday (maybe there's a way to combine these?) 
            $offset = $day_of_week - 1;                                                 //(with the modulus operator hmm        )
            $coverdate_as_time = strtotime("-$offset days", $userdate_as_time);
        }

        // create the image URL and echo the HTML
        $img_src = "http://img.timeinc.net/time/magazine/archive/covers/" . date("Y", $coverdate_as_time) . "/1101"
                                                                          . date("ymd", $coverdate_as_time) . "_400.jpg";                                                                      
        return "<img src=$img_src>";
    }
    
    // So that the JS can pass the date as a parameter and get the html as the response
    if (isset($_GET["date"])) {
    	$validation_results = validate_date($_GET['date'], "1 January 1981");
      if ($validation_results[0]) {
          echo getCoverForValidDate($validation_results[1]);
      }
    }
?>