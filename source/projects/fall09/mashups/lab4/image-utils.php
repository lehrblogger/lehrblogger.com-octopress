<?php

/*
 * image-utils.php
 * A collection of image processing and color conversion functions.
 * Dan Maynes Aminzade (monzy@nyu.edu)
 *
 */

function rgb2int($rgb) {
  return ($rgb['blue'] << 16) + ($rgb['green'] << 8) + $rgb['red']; 
}

function int2rgb($int) { 
  $r = ($int >> 16) & 0xFF; 
  $g = ($int >> 8) & 0xFF; 
  $b = $int & 0xFF; 
  return array('red'=>$r, 'green'=>$g, 'blue'=>$b); 
}

function rgb2lab($rgb) { 
  $eps = 216/24389; $k = 24389/27; 
  // reference white D50
  $xr = 0.964221; $yr = 1.0; $zr = 0.825211; 
  
  $rgb['red'] = $rgb['red']/255; //R 0..1 
  $rgb['green'] = $rgb['green']/255; //G 0..1 
  $rgb['blue'] = $rgb['blue']/255; //B 0..1 
  
  // assuming sRGB (D65) 
  $rgb['red'] = ($rgb['red'] <= 0.04045) ?
    ($rgb['red']/12.92) : pow(($rgb['red']+0.055)/1.055,2.4);
  $rgb['green'] = ($rgb['green'] <= 0.04045) ? 
    ($rgb['green']/12.92) : pow(($rgb['green']+0.055)/1.055,2.4);
  $rgb['blue'] = ($rgb['blue'] <= 0.04045) ? 
    ($rgb['blue']/12.92) : pow(($rgb['blue']+0.055)/1.055,2.4); 
  
  // sRGB D50 
  $x =  0.4360747*$rgb['red'] + 0.3850649*$rgb['green'] + 0.1430804 *$rgb['blue']; 
  $y =  0.2225045*$rgb['red'] + 0.7168786*$rgb['green'] + 0.0606169 *$rgb['blue']; 
  $z =  0.0139322*$rgb['red'] + 0.0971045*$rgb['green'] + 0.7141733 *$rgb['blue']; 
  
  $xr = $x/$xr; $yr = $y/$yr; $zr = $z/$zr; 
  
  $fx = ($xr > $eps)?pow($xr, 1/3):($fx = ($k * $xr + 16) / 116); 
  $fy = ($yr > $eps)?pow($yr, 1/3):($fy = ($k * $yr + 16) / 116); 
  $fz = ($zr > $eps)?pow($zr, 1/3):($fz = ($k * $zr + 16) / 116); 
  
  $lab = array(); 
  $lab[] = round(( 116 * $fy ) - 16); 
  $lab[] = round(500*($fx-$fy)); 
  $lab[] = round(200*($fy-$fz));      
  return $lab; 
}

function deltaE($lab1, $lab2) { 
  // CMC 1:1 
  $l = 1; $c = 1; 
  
  $c1 = sqrt($lab1[1]*$lab1[1]+$lab1[2]*$lab1[2]); 
  $c2 = sqrt($lab2[1]*$lab2[1]+$lab2[2]*$lab2[2]); 
  
  $h1 = (((180000000/M_PI) *
           atan2($lab1[1],$lab1[2]) + 360000000) % 360000000)/1000000;
  
  $t = (164 <= $h1 AND $h1 <= 345) ? 
    (0.56 + abs(0.2 * cos($h1+168))) : (0.36 + abs(0.4 * cos($h1+35))); 
  $f = sqrt(pow($c1,4)/(pow($c1,4) + 1900)); 
  
  $sl = ($lab1[0] < 16) ?
    (0.511) : ((0.040975*$lab1[0])/(1 + 0.01765*$lab1[0])); 
  $sc = (0.0638 * $c1) / (1 + 0.0131 * $c1) + 0.638; 
  $sh = $sc * ($f * $t + 1 -$f); 
  
  return sqrt( 
    pow(($lab1[0] - $lab2[0])/($l * $sl), 2) + 
    pow(($c1 - $c2)/($c * $sc), 2) + 
    pow(sqrt( 
          ($lab1[1]-$lab2[1]) * ($lab1[1]-$lab2[1]) + 
          ($lab1[2]-$lab2[2]) * ($lab1[2]-$lab2[2]) + 
          ($c1-$c2) * ($c1-$c2)) / $sh, 2));
} 

function ColorDistance($color1, $color2) {
  return deltaE(rgb2lab(int2rgb($color1)), rgb2lab(int2rgb($color2)));
}

function LoadImage($filename) {
  $im = imagecreatefromjpeg($filename);
  if (!$im) {
    echo "Error: failed to load image " . $filename;
  }
  return $im;
}

function ResizeImage($image, $maxwidth, $maxheight) {
  // Get original image dimensions and aspect ratio
  $width_orig = imagesx($image);
  $height_orig = imagesy($image);
  $ratio_orig = $width_orig / $height_orig;
  
  if ($maxwidth / $maxheight > $ratio_orig) {
    $maxwidth = $maxheight * $ratio_orig;
  } else {
    $maxheight = $maxwidth / $ratio_orig;
  }
  
  // Resize the image (with resampling)
  $image_resized = imagecreatetruecolor($maxwidth, $maxheight);
  imagecopyresampled($image_resized, $image, 0, 0, 0, 0,
                     $maxwidth, $maxheight, $width_orig, $height_orig);
  return $image_resized;
}

function GetDominantColor($image) {
  $image_resized = imagecreatetruecolor(1, 1);
  imagecopyresampled($image_resized, $image, 0, 0, 0, 0,
                     1, 1, imagesx($image), imagesy($image));
  $color = imagecolorat($image_resized, 0, 0);
  imagedestroy($image_resized);
  return $color;
}

?>
