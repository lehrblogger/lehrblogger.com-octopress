<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Retrieve A User's Recent Photos</title>


</head>

<body>

<?php
require_once("phpFlickr/phpFlickr.php");
$f = new phpFlickr("[YOUR API KEY HERE]");

$person = $f->people_findByUsername("[YOUR USERNAME HERE]");
// Get the user's first 25 public photos
$photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 25);

// Loop through the photos and output the html
$numphotos = 0;
foreach ((array)$photos['photos']['photo'] as $photo) {
  echo "<img border='0' alt='$photo[title]' ".
      "src=" . $f->buildPhotoURL($photo, "Square") . ">";
  $numphotos++;
  // Insert a line break every five photos
  if ($numphotos % 5 == 0) {
    echo "<br>\n";
  }
}
?>

</body>
</html>