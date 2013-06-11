<?php
set_time_limit(400);
require_once("phpFlickr/phpFlickr.php");
require_once("image-utils.php");

ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Final PhotoMosaic</title>

<style type="text/css">
body {
  line-height: 10px;
}

img {
  border: none;
  padding: 0px;
  margin: 0px;
}

#grid {
  border: solid 1px #000000;
  position: absolute;
  top: 250px;
  left: 0px;
}

#overlay {
  background-repeat: no-repeat;
  background-image: url(vinyl-large.png);
  border: solid 1px #000000;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 75px;
  height: 75px;
  z-index: 1;
}

.disabled {
  display: none;
}
</style>

<script src="utility.js"></script>
<script type="text/javascript">
var updateOverlay = function(evt) {
  var overlay = document.getElementById("overlay");
  overlay.style.left = (evt.clientX+5)+ "px";
  overlay.style.top = (evt.clientY+5) + "px";
  var imgurl = evt.target.src;
  overlay.style.backgroundImage = "url(" + imgurl + ")";
  if (hasClass(overlay, 'disabled')) {
    removeClass(overlay, 'disabled');
  }
};
</script>

</head>

<body>

<?php

$numPhotos = 500;

$f = new phpFlickr("[YOUR API KEY HERE]");
$f->enableCache("fs", "/home/[YOUR NETID HERE]/public_html/cache");
$person = $f->people_findByUsername("[YOUR USERNAME HERE]");

$imageUrls = array();
$referenceImage = imagecreate($numPhotos, 1);
// Get photos from the user's collection that contain the color machine tags
$search_params = array("user_id "=>$person['id'],
                       "machine_tags"=>"color:",
                       "per_page"=>$numPhotos,
                       "page"=>1);
$photos = $f->photos_search($search_params);

// Loop through the photos and store each URL with its dominant color
foreach ((array)$photos['photo'] as $photo) {
  $photoUrl = $f->buildPhotoURL($photo, "Square");
  $tags = $f->tags_getListPhoto($photo['id']);
  $rgb = array();
  foreach ($tags as $tag) {
    if ($tag['machine_tag'] == 1) {
      if (eregi('^color:(red|green|blue)=([0-9]+)$',
                $tag['raw'], $colordata)) {
        $rgb[$colordata[1]] = $colordata[2];
      }
    }
  }
  if (count($rgb) == 3)  {
    $imageUrls[] = $photoUrl;
    imagecolorallocate($referenceImage,
                       $rgb['red'], $rgb['green'], $rgb['blue']);    
  }
}

// Load an image as a source for the mosaic
$image = LoadImage('http://www.webremix.org/images/monzy.jpg');
echo '<img src="http://www.webremix.org/images/monzy.jpg" /><br/>';

echo '<div id="grid">';
// Make a small version of the image
$imageResized = ResizeImage($image, 50, 50);

// Step through the pixels in the image. For each pixel, find the
// image that most closely approximates the pixel's color.
$width = imagesx($imageResized);
$height = imagesy($imageResized);
for($y = 0; $y < $height; $y++) {
  for($x = 0; $x < $width; $x++){
    $rgb = int2rgb(imagecolorat($imageResized, $x, $y));
    $matchIndex =
      imagecolorclosesthwb($referenceImage,
                           $rgb['red'], $rgb['green'], $rgb['blue']);
    $matchImageUrl = $imageUrls[$matchIndex];
    echo '<img width="10" height="10" src="' . $matchImageUrl . '" />';
  }
  echo "<br/>";    
}
imagedestroy($referenceImage);
imagedestroy($imageResized);
imagedestroy($image);

echo '</div>';

ob_end_flush();
?>

<div id="overlay" class="disabled"></div>

<script type="text/javascript">
var grid = document.getElementById('grid');
var images = grid.getElementsByTagName('img');
for (var i=0; i < images.length; i++) {
  addEventSimple(images[i], 'mousemove', updateOverlay);
}
</script>

</body>
</html>
