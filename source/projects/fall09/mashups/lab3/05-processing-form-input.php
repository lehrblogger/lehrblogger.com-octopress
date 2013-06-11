<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Processing Form Input</title>
<style type="text/css">
</style>
</head>

<?php
if (!isset($_GET['submit'])) {
	// The form has not been submitted, so we will display it.
?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" name="queryform">
      <label>City
        <input name="city" type="text" id="city" value="New York" />
      </label>
      <br />
      <label>
        <input type="radio" name="gender" value="1" id="gender" checked="checked" />
        Male</label>
      <br />
      <label>
        <input type="radio" name="gender" value="0" id="gender" />
        Female</label>
      <br />
      <label>Age Range
        <select name="agerange" id="agerange">
          <option value="10" selected="selected">10-19</option>
          <option value="20">20-29</option>
          <option value="30">30-39</option>
        </select>
      </label>
      <label>Weather
        <select name="weather" id="weather">
          <option value="1">Sunny</option>
          <option value="2">Rainy</option>
          <option value="3">Snowy</option>
          <option value="4">Cloudy</option>
        </select>
      </label>
      <br />
      <input type="submit" name="submit" id="submit" value="I'm feeling feelings!" />
  </form>

<?php
} else {
	// The form has been submitted, so we will process the input.
	$base_url = "http://api.wefeelfine.org:8080/ShowFeelings?display=xml";
	$request_url = $base_url . "&returnfields=feeling,sentence,gender,city";
	$request_url .= "&limit=25";
	$request_url .= "&city=" . urlencode(trim($_GET['city']));
	$request_url .= "&gender=" . $_GET['gender'];
	$request_url .= "&agerange=" . $_GET['agerange'];
	$request_url .= "&conditions=" . $_GET['weather'];
	
	$file = file_get_contents($request_url);
	echo "<pre>";
	$xmldata = simplexml_load_string($file);
	print_r($xmldata);
	echo "</pre>";
}
?>

<body>
</body>
</html>
