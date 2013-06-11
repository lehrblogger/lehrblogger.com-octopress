<?php
  include('/home/memento85/private/flickrProxy.php');
 
  $buffer = "";
    
  if (isset($_GET['tag_info']))
    {                    
        $method = 'flickr.photos.search';
        $format = 'json';
       // $api_key = from included php script, for security
       // $user_id = from included php script, for security
 
        $tag_info = $_GET['tag_info'];  // This only returns what is after the ?, the others come in as key=values

        $host = "http://api.flickr.com/services/rest";
        $port = 80;
        $path = '/?method=' . $method . '&format=' . $format . '&api_key=' . $api_key . '&user_id=' . $user_id . $tag_info;
        $url = $host . $path;
		
        
        $ch = curl_init();
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);
        $buffer = curl_exec($ch);
        curl_close($ch);
    }
 
    echo $buffer;
    exit;
?>