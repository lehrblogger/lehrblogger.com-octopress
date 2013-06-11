<?php
$content = "";
    
    if (isset($_GET['user']))
    {                    
        $user = $_GET['user'];
        $host = "http://twittervision.com";
        $port = 80;
        $path = "/user/current_status/" . $user . ".xml";
        $url = $host . $path;

        $ch = curl_init($url);
        $content = curl_exec($ch);
        curl_close($ch);
    }
    
     echo substr($content, 0, -1);
?>