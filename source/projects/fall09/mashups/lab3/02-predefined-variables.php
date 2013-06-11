<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Predefined Variables</title>
</head>

<?php
echo "You are connected from: ", $_SERVER["REMOTE_ADDR"];
echo "<br/>";
echo "This script is: ", $_SERVER['PHP_SELF'];
?>

<body>
</body>
</html>
