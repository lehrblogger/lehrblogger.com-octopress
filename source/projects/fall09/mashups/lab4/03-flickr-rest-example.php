<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic Flickr REST Example</title>
</head>

<?php
$baseurl = "http://www.flickr.com/services/rest/";
$api_key = "[YOUR API KEY HERE]";
$username = "[YOUR USERNAME HERE]";

// Build a request to look up a user's ID from a username.
$request_url = $baseurl . "?method=flickr.people.findByUsername&api_key=" . 
               $api_key . "&username=" . $username;
$file = file_get_contents($request_url);
$xmldata = simplexml_load_string($file);

// If we successfully found the user requested, lookup the user's photos.
if ($xmldata['stat'] == "ok") {
  $userid = $xmldata->user['id'];
  // Build a URL to request the user's recent photos.
  $request_url = $baseurl . "?method=flickr.people.getPublicPhotos&api_key=" .
                  $api_key . "&user_id=" . $userid;
  $file = file_get_contents($request_url);
  $xmldata = simplexml_load_string($file);

  foreach ($xmldata->photos->photo as $photo) {
    // Flickr has a fixed URL structure to access photos.
    // Find out more here: http://www.flickr.com/services/api/misc.urls.html
    $server = $photo['server'];
    $photoid = $photo['id'];
    $secret = $photo['secret'];
    $title = $photo['title'];
    echo '<a href="http://www.flickr.com/photos/' .
          $userid . '/' . $photoid . '">';
    echo '<img src="http://static.flickr.com/' . $server. '/' .
          $photoid . '_' . $secret . '_s.jpg"/>';
    echo '</a>';
  }
}

?>

<body>
</body>
</html>