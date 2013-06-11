<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding Tags to Images</title>
</head>

<body>

<?php
set_time_limit(200);
require_once("phpFlickr/phpFlickr.php");
require_once("image-utils.php");

$f = new phpFlickr("[YOUR API KEY HERE]",
                   "[YOUR SECRET KEY HERE]");
$f->auth("write");

$person = $f->people_findByUsername("[YOUR USERNAME HERE]");
$startpage = (isset($_GET['startpage'])) ? intval($_GET['startpage']) : 1;
$photos = $f->people_getPublicPhotos($person['id'],
                                     NULL, NULL, 50, $startpage);

// Loop through the photos and find the dominant color of each.
// Add machine tags for the average color.
foreach ((array)$photos['photos']['photo'] as $photo) {
  $photoUrl = $f->buildPhotoURL($photo, "Square");
  echo '<img src="' . $photoUrl . '" /><br/>';
  $image = LoadImage($photoUrl);
  $color = GetDominantColor($image);
  $rgb = int2rgb($color);
  $tags = "color:red=" . $rgb['red'] .
          ",color:green=" . $rgb['green'] .
          ",color:blue=" . $rgb['blue'];
  $photoid = $photo['id'];
  echo "Adding tags <em>$tags</em> to photo with id <em>$photoid</em><br/>";
  if ($f->photos_addTags($photo['id'], $tags)) {
    echo 'It worked!<br/>';
  } else {
    echo 'ERROR<br/>';
  }
  imagedestroy($image);
}

?>



</body>
</html>
