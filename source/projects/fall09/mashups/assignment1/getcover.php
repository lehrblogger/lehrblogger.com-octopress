<?php
    require_once("error_reporting.php");
    
    // Takes an date integer as a parameter and echos an image tag with the corresponding cover
    function getCoverForValidDate($userdate_as_time){
        // get the preceding Monday
        $day_of_week = date("w", $userdate_as_time);
        if ($day_of_week == 0) {        // if it's Sunday, go back a whole week
            $coverdate_as_time = strtotime("-6 days", $userdate_as_time);
        } else {                        // otherwise, just go back to the previous Monday (maybe there's a way to combine these?) 
            $offset = $day_of_week - 1;                                                 //(with the modulus operator hmm        )
            $coverdate_as_time = strtotime("-$offset days", $userdate_as_time);
        }

        // some extra information useful for debugging
        //echo "<p>The user entered " . date("l jS \of F Y", $userdate_as_time) . "</p>";
        //echo "<p>The corresponding Monday is " . date("l jS \of F Y", $coverdate_as_time) . "</p>";

        // create the image URL and echo the HTML
        $img_src = "http://img.timeinc.net/time/magazine/archive/covers/" . date("Y", $coverdate_as_time) . "/1101"
                                                                          . date("ymd", $coverdate_as_time) . "_400.jpg";                                                                      
        echo "<p><img src=$img_src></p>";
    }
?>