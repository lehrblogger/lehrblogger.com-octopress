<?php
    require_once("error_reporting.php");
    
    // Accepts *only* dates formatted as mm/dd/yyyy, a start date as a string, and an end date as a string (which defaults to now)
    // Returns an array in which the first element is a boolean indicating success
    //   and the second element is either an integer representation of the time, or an error message.
    //
    // These checks are somewhat restrictive, and while other dates might work in strtotime,
    //   I opted to follow the specified formatting requirements to create a consistent and unambiguous UI.
    function validate_date($date, $start, $end = 'now') {
        // needed this to prevent a warning I was getting
        date_default_timezone_set('America/New_York');
        
        //check the length of the string
        if (strlen($date) != 10) { return invalid_date(); }

        //check to make sure it splits properly into three parts
        $date_array = explode("/", $date);
        if (count($date_array) != 3) { return invalid_date();}

        // then make sure that each part is the right length
        $mm = $date_array[0]; 
        $dd = $date_array[1]; 
        $yyyy = $date_array[2];
        if (strlen($mm) != 2 || strlen($dd) != 2 || strlen($yyyy) != 4) { return invalid_date();}
    
        // then make sure it is a valid date
        $mm = (int)$mm;
        $dd = (int)$dd; 
        $yyyy = (int)$yyyy;
        if (!checkdate($mm, $dd, $yyyy)) { return invalid_date();}
        
        // make sure the date is within the specified range
        $startdate_as_time = strtotime($start);
        $enddate_as_time = strtotime($end);
        $userdate_as_time = strtotime($date);
        if (($userdate_as_time - $startdate_as_time) < 0) { return outside_range();}
        if (($userdate_as_time - $enddate_as_time) > 0)   { return outside_range();}
    
        return array(True, $userdate_as_time);
    }
    
    function invalid_date() {
        return array(False, "You entered an incorrectly formatted date, please try again.");
    }
    function outside_range() {
        return array(False, "The date you entered was outside the permitted range, please try again.");
    }
?>