<?php

$munchkins = array();

/*
$munchkin3 = array();
$munchkin3['type'] = 'bob';
$munchkin3['x'] = 300;
$munchkin3['y'] = 50;
*/

for ($i=0; $i < 500; $i++) {
  // info for munchkin one
  $munchkin1 = array();
  $munchkin1['type'] = 'bill';
  $munchkin1['x'] = (rand()%500);
  $munchkin1['y'] = (rand()%500);
  $munchkin1['y'] = (rand()%500);

  // info for munchkin two
  $munchkin2 = array();
  $munchkin2['type'] = 'bob';
  $munchkin2['x'] = (rand()%500);
  $munchkin2['y'] = (rand()%500);

  array_push( $munchkins, $munchkin1, $munchkin2/*, $munchkin3 */);
 }


echo json_encode( $munchkins );
?>