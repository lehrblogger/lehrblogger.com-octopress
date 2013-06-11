<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading and Resizing Images</title>
</head>

<body>

<?php
require_once("image-utils.php");

$image = LoadImage('http://kittenwar.com/c_images/2008/12/07/169170.2.jpg');
if ($image) {
  $image_resized = ResizeImage($image, 150, 150);
  ob_start();
  imagejpeg($image_resized);
  $contents =  ob_get_contents();
  ob_end_clean();  
  echo "<img src='data:image/jpg;base64," .
    base64_encode($contents)."' />";
  
  $color = GetDominantColor($image);
  echo "<pre>";
  print_r(int2rgb($color));
  echo "</pre>";

  imagedestroy($image_resized);
  imagedestroy($image);
}

?>



</body>
</html>
