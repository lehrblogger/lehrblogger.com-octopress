<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Getting Dominant Image Color</title>
</head>

<body>

<?php
require_once("phpFlickr/phpFlickr.php");
require_once("image-utils.php");

$f = new phpFlickr("[YOUR API KEY HERE]");

$person = $f->people_findByUsername("[YOUR USERNAME HERE]");
// Get the user's first 25 public photos
$photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 25);

// Loop through the photos and store its URL with its dominant color
$imagesByColor = array();
foreach ((array)$photos['photos']['photo'] as $photo) {
  $photoUrl = $f->buildPhotoURL($photo, "Square");
  $image = LoadImage($photoUrl);
  $color = GetDominantColor($image);
  $imagesByColor[$color] = $photoUrl;
  imagedestroy($image);
}

foreach ($imagesByColor as $imageColor => $photoUrl) {
  $rgb = int2rgb($imageColor);
  echo '<div style="background-color:rgb(' .
        $rgb['red'] . ',' . $rgb['green'] . ',' . $rgb['blue'] . ')">';
  echo '<img src="' . $photoUrl . '" />';
  echo '</div>';
}
?>



</body>
</html>
