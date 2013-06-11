<!DOCTYPE html>
<html>
<head>
  <title>Parsing a Feed</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="feed-styles.css" />
</head>
<body>

<?php

require_once('simplepie_1.2/simplepie.inc');
$feed = new SimplePie('http://newyork.craigslist.org/fua/index.rss');
  
echo '<div class="header">';
echo '<h1><a href="' . $feed->get_permalink() . '">' .
                       $feed->get_title() . '</a></h1>';
echo '<p>' . $feed->get_description() . '</p>';
echo '</div>';

// Loop through the items in the feed, displaying them one by one.

foreach ($feed->get_items() as $item) {
  echo '<div class="item">';
  echo '<h2><a href="' . $item->get_permalink() . '">';
  echo $item->get_title();
  echo '</a></h2>';
  echo '<p>' . $item->get_description() . '</p>';
  echo '<p>Posted on ' . $item->get_date('j F Y | g:i a') . '</p>';
  echo '</div>';
}

?>

</body>
</html>