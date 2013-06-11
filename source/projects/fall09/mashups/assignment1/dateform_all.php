<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Time Machine</title>
</head>

<body>
    <div id="travel_div">
        <form id="getdate" name="getdate" method="post" action="<?php echo $PHP_SELF;?>">
          <p>
            <label id="travel_label">Bored of the here and now? Enter the date to which you would like to travel in mm/dd/yyyy format: 
              <input type="text" name="date" id="date" />
            </label>
            <input type="submit" name="submit" id="submit" value="Go back in time!" />
          </p>
        </form>
    </div>

<?php
    require_once("error_reporting.php");
    require_once("datevalidate.php");
    require_once("getcover.php");
    require_once("getheadlines.php");
    require_once("getchart.php");
    
    if (isset($_POST['date'])) {
        $validation_results = validate_date($_POST['date'], "1 January 1981");
        if ($validation_results[0]) {
            $date = $validation_results[1];
?>
    <div id="history">
        <h1 id="welcome">Welcome to <?php echo date("l, F jS, Y", $date);?>. This is what you need to know.</h1>
        
        <div id='cover_and_chart' class='column'>
            <p class='section'>
                <h2>This is what you should be worrying about:</h2>
                <?php getCoverForValidDate($date);?>
            </p>
            <p class='section'>
                <h2>This is the music you are supposed to like:</h2>
                <?php getChartForValidDate($date);?>
            </p>
        </div>
        
        <div id='headlines' class='column'>
            <p class='section'>
                <h2>This is what happened yesterday:</h2>
                <?php getHeadlinesForValidDate($date);?>
            </p>
            <p class='section'>
                <h2>This is what will happen tomorrow:</h2>
                <?php getHeadlinesForValidDate(strtotime("+1 days", $date));?>
            </p>
        </div>
<?php
        } else {
?>  
        <p id="error">
            <?php echo $validation_results[1];?><br/>
            (This time machine cannot go back any further than 1981.)
        </p>
<?php       
        }
    } 
?>
    </div>
</body>
</html>