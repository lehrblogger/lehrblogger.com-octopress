<?php // A simple PHP proxy to query the SMS Gateway Server
  $url = "http://webremix.org/assignments/sms/messages.php?";
  if (isset($_GET["starttime"])) {
    $url .= "starttime=" . $_GET["starttime"];
  }
  if (isset($_GET["endtime"])) {
    $url .= "&endtime=" . $_GET["endtime"];
  }
  echo file_get_contents($url);
?>