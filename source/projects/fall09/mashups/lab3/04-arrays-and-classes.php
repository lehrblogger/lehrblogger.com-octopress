<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using Arrays and Classes</title>
<style type="text/css">
pre {
	font-size: 9px;
}
img {
	float: left;
	margin: 5px;
}
p {
	height: 50px;
}
</style>
</head>

<?php
include_once("twitter.class.php");

$summize = new summize;
$data = $summize->search("#itp");

echo "<pre>";
print_r($data);
echo "</pre>";

foreach ($data->results as $result) {
	echo "<p>";
	printf("<img src=\"%s\" />", $result->profile_image_url);
	printf("<strong>%s</strong>: %s", $result->from_user, $result->text);
	echo "</p>";
}

?>

<body>
</body>
</html>
