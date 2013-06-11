<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scraping a Website for Content</title>
</head>

<body>
<?php
$url = "http://icanhascheezburger.com";
$html = file_get_contents($url);
$dom = new DomDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$img = $xpath->evaluate("//div[@class='entry']//img")->item(0);
$imgSrc = $img->getAttribute('src');
print("<img src=\"$imgSrc\" />");
?>

</body>
</html>