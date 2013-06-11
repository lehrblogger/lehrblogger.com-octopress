<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Charting Data</title>
<style type="text/css">
</style>
</head>

<?php
include_once("gphpchart.class.php");

$data = array('happy' => 22,'sad' => 12, 'befuddled' => 5, 'aroused' => 1);
$chart = new GphpChart('bvs'); // 'bvs' stands for a vertical stacked bar chart 
$chart->width = 500;
$chart->height = 300;
$chart->set_bar_width(80, 20);

$chart->title = 'How PHP Makes Me Feel'; // this title will be on the chart image 
$chart->add_data(array_values($data)); // adding values 
$chart->add_labels('x', array_keys($data)); // adding x labels (bottom axis) 
$chart->add_labels('y', array(0,5,10,15,25)); // adding y labels (left axis) 
echo $chart->get_Image_String(); 

?>

<body>
</body>
</html>
