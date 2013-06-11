<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get Recent Photos</title>
</head>

<body>
<?php
require_once("phpFlickr/phpFlickr.php");

$f = new phpFlickr("[YOUR API KEY HERE]");
$recent = $f->photos_getRecent();

foreach ($recent['photo'] as $photo) {
    $owner = $f->people_getInfo($photo['owner']);
    echo "<a href='http://www.flickr.com/photos/" .
      $photo['owner'] . "/" . $photo['id'] . "/'>";
    echo $photo['title'];
    echo "</a> Owner: ";
    echo "<a href='http://www.flickr.com/people/" .
      $photo['owner'] . "/'>";
    echo $owner['username'];
    echo "</a><br>";
}
?>

</body>

</html>