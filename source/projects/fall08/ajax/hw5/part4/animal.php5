<?php
// change this to point to the location of your copy of the file
include('/home/memento85/private/newdb.php5');

// show all errors
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting( E_ALL );

// get the json object
$action = $_GET['action'];

if( isset($_GET['id']) ) $id = $_GET['id'];  
if( isset($_GET['type']) ) $type = $_GET['type'];
if( isset($_GET['location']) ) $location = $_GET['location'];
if( isset($_GET['name']) ) $name = $_GET['name'];

// action on the action property
if( $action == 'add' )
{
  addAnimal( $id, $type, $location, $name );
}
else if( $action == 'delete' )
{
  removeAnimal( $id );
}
else if( $action == 'update' )
{
  updateAnimal( $id, $location );
}
else if( $action == 'load' )
{
  echo getAnimals();
}

?>