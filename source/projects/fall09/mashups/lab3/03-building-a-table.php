<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Building a Table</title>
</head>

<?php

echo "<table>";
for ($i = 200; $i < 210; $i++) {
	echo "<tr>\n";
	$filename = sprintf("monzy%d.jpg", $i);
	$url = sprintf("http://files.nyu.edu/da51/public/monzy/%s", $filename);
	printf("<td>Monzy Picture #%d</td>\n", $i);
	printf("<td><img src=\"%s\" width=\"100\" height=\"90\"/></td>\n", $url);
	echo "</tr>\n";
}
echo "</table>"
?>

<body>
</body>
</html>
