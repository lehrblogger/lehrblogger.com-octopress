<?php
$content = "";
    
    if (isset($_GET['pagenum']))
    {                    
        $pagenum = $_GET['pagenum'];  // This only returns what is after the ?, the others come in as key=values
        $searchstr = "Retweeting";
        $host = "http://search.twitter.com";
        $port = 80;
        $path = "/search.atom?page=" . $pagenum . "&q=" . $searchstr;
        $url = $host . $path;
        
        $ch = curl_init($url);
        $content = curl_exec($ch);
        curl_close($ch);
    }
    
     echo substr($content, 0, -1);
?>