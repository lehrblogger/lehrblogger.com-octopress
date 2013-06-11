<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Flickr XML-RPC Example</title>
</head>

<body>
<?php
$apiKey = "[YOUR API KEY HERE]";
$username = "[YOUR USERNAME HERE]";

function getUserId($username) {
  global $apiKey;
  $params = array('api_key' => $apiKey,
                  'username' => $username);  
  $request = xmlrpc_encode_request("flickr.people.findByUsername",
                                   $params);
  $context = stream_context_create(
    array('http' =>
      array('method' => "POST",
            'header' => "Content-Type: text/xml",
            'content' => $request)));
  $file = file_get_contents("http://www.flickr.com/services/xmlrpc/",
                            false, $context);
  $response = xmlrpc_decode($file);
  $xml = simplexml_load_string($response); 
  $userid = $xml['id'];
  return $userid;
}

function getPhotos($userid) {
  global $apiKey;
  $params = array('api_key' => $apiKey,
                  'user_id' => $userid);  
  $request = xmlrpc_encode_request("flickr.people.getPublicPhotos",
                                   $params);
  $context = stream_context_create(
    array('http' =>
      array('method' => "POST",
            'header' => "Content-Type: text/xml",
            'content' => $request)));
  $file = file_get_contents("http://www.flickr.com/services/xmlrpc/",
                            false, $context);
  $response = xmlrpc_decode($file);
  $xml = simplexml_load_string($response); 

  echo '<pre>';
  print_r($xml);
  echo '</pre>';
}

$userid = getUserId($username);
echo $userid;

?>


</body>
</html>