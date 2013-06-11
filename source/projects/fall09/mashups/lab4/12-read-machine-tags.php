<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reading Machine Tags</title>
</head>

<body>

<?php
set_time_limit(200);
require_once("phpFlickr/phpFlickr.php");
require_once("image-utils.php");

$f = new phpFlickr("[YOUR API KEY HERE]");
$person = $f->people_findByUsername("[YOUR USERNAME HERE]");

// Get 10 photos from the user's collection that contain machine tags we want
$search_params = array("user_id "=>$person['id'],
                       "machine_tags"=>"color:",
                       "per_page"=>10);
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
    echo '<img src="' . $photoUrl . '" />';
    print_r($rgb);
    echo '<br/>';
  }
}
?>



</body>
</html>
