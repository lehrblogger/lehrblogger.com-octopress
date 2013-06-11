<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading and Resizing Images</title>
</head>

<body>

<?php
require_once("phpFlickr/phpFlickr.php");
require_once("image-utils.php");

$f = new phpFlickr("[YOUR API KEY HERE]");

$person = $f->people_findByUsername("[YOUR USERNAME HERE]");
// Get the user's first 25 public photos
$photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 25);

// Loop through the photos and output the html
foreach ((array)$photos['photos']['photo'] as $photo) {
  $photoUrl = $f->buildPhotoURL($photo, "Square");
  $image = LoadImage($photoUrl);
  $image_resized = ResizeImage($image, 10, 10);
  ob_start();
  imagejpeg($image_resized);
  $contents =  ob_get_contents();
  ob_end_clean();  
  echo "<img src='data:image/jpg;base64," . base64_encode($contents)."' />";  
  imagedestroy($image_resized);
  imagedestroy($image);
}

?>



</body>
</html>
