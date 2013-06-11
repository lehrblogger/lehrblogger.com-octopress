<?php

// change this to your info, store this file OUTSIDE you public_html folder
$host = "mysql.lehrblogger.com";
$username = "phpuser";
$password = "tev9shesh5gi3ha";
$database = "animals_example_db";

error_reporting( E_ALL );

/*
  Core database functions
  */
function dbConnect() {
  global $username, $password, $database, $host;
  mysql_connect( $host, $username, $password );
  mysql_select_db( $database ) or die ("Unable to select database for " . $username );
}

function dbQuery( $aQuery ) {
  return mysql_query( $aQuery );
}

function dbClose() {
  mysql_close();
}

/*
  Animals functions
  */
function getAnimals() {
  dbConnect();
  $query = "SELECT * FROM animals";
  $result = dbQuery( $query );
  dbClose();
  
  $returnArray = array();
  while( $row = mysql_fetch_array( $result ) )
  {
    array_push( $returnArray, $row );
  }

  return json_encode( $returnArray );
}

function addAnimal( $id, $type, $location, $name )
{
  dbConnect();
  $query = "INSERT INTO animals (id, type, location, name) VALUES(" . $id . ", \"" . $type . "\", \"" . $location . "\", \"" . $name . "\")";  
  $result = dbQuery( $query );
  dbClose();

  return $result;
}

function removeAnimal( $id ) {
  dbConnect();
  $query = "DELETE FROM animals WHERE id=" . $id;  
  $result = dbQuery( $query );
  dbClose();
}

function updateAnimal( $id, $location ) {
  dbConnect();
  $query = "UPDATE animals SET location=\"" . $location . "\" WHERE id=" . $id;
  dbQuery( $query );
  dbClose();
}

/*
  Drawing functions
  */
function updateDrawing( $drawing ) {
  dbConnect();

  // need to add slashes for MySQL query
  $query = "UPDATE draw SET drawing=\"" . addslashes( $drawing ) . "\" WHERE id=1";
  dbQuery( $query );

  dbClose();
}

function getDrawing() {
  dbConnect();

  $query = "SELECT drawing FROM draw WHERE id=1";
  $result = dbQuery( $query );

  dbClose();

  $resultArray = mysql_fetch_array( $result );

  // remove the slashes
  return stripslashes( $resultArray['drawing'] );
}

?>