<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Enter a Date, Get Stuff</title>
</head>
<body>
    
    <div>
        <h3>Enter a date in mm/dd/yyyy format:</h3>
    </div>
    <ul>
        <li>
            <form id="getcover" name="getcover" method="post" action="<?php echo $PHP_SELF;?>">
                <label>and retrieve the time cover:
                  <input type="text" name="date_forcover" id="date_forcover" />
                </label>
                <input type="submit" name="submit" id="submit" value="Get a Cover!" />
            </form>
            <br/>
        </li>
        <li>
            <form id="getheadlines" name="getheadlines" method="post" action="<?php echo $PHP_SELF;?>">
                <label> and retrieve the NYT headlines:
                  <input type="text" name="date_forheadlines" id="date_forheadlines" />
                </label>
                <input type="submit" name="submit" id="submit" value="Get headlines!" />
            </form>  
            <br/>
      </li>
      <li>
        <form id="getchart" name="getchart" method="post" action="<?php echo $PHP_SELF;?>">
            <label> and retrieve the Top Ten Billboard singles:
              <input type="text" name="date_forchart" id="date_forchart" />
            </label>
            <input type="submit" name="submit" id="submit" value="Get the top singles!" />
        </form>
      </li>
    </ul>
    
<?php
    require("error_reporting.php");
    require_once("datevalidate.php");
    require("getcover.php");
    require("getheadlines.php");
    require("getchart.php");
    
    if (isset($_POST['date_forcover'])) {
        $validation_results = validate_date($_POST['date_forcover'], "3 March 1923");
        if ($validation_results[0]) {
            echo "<h4>Time Magazine cover</h4>";
            getCoverForValidDate($validation_results[1]);
        } else {
            echo $validation_results[1];
        }
    } else if (isset($_POST['date_forheadlines'])) {
        $validation_results = validate_date($_POST['date_forheadlines'], "1 January 1981");
        if ($validation_results[0]) {
            echo "<h4>New York Times headlines</h4>";
            getHeadlinesForValidDate($validation_results[1]);
        } else {
            echo $validation_results[1];
        }
    } else if (isset($_POST['date_forchart'])) {
        $validation_results = validate_date($_POST['date_forchart'], "1 January 1945");
        if ($validation_results[0]) {
            echo "<h4>Billboard Top Ten</h4>";
            getChartForValidDate($validation_results[1]);
        } else {
            echo $validation_results[1];
        }
    }
?>
</body>
</html>