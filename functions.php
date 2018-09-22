<?php

$color = "red";

$rss = new DOMDocument();
$feed = array();
$urlArray = array(array('name' => 'Homestead Brooklyn', 'url' => 'http://homesteadbrooklyn.com/all?format=RSS'),
              array('name' => 'Jane Perrone', 'url' => 'http://www.janeperrone.com/blog?format=RSS'),
              array('name' => 'Houseplant Journal', 'url' => 'https://www.houseplantjournal.com/home?format=RSS'));

foreach ($urlArray as $url) {
   $rss->load($url['url']);

   foreach ($rss->getElementsByTagName('item') as $node) {
      $item = array (
         'site' => $url['name'],
         'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
         'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
         'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
         'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
      );
      array_push($feed, $item);
   }
}

usort($feed, function($a, $b) {
   return strtotime($b['date']) - strtotime($a['date']);
});
?>


<!-- <!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="styles.css">
      <title>RSS Feed</title>
   </head>

   <body>
      <div class=container>
         <h1>Planty blogs</h1>
         
         <?php
         $limit = 30;
         echo '<div> <ul>';
         for ($x = 0; $x < $limit; $x++) {
            $site = $feed[$x]['site'];
            $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
            $link = $feed[$x]['link'];
            $description = $feed[$x]['desc'];
            $date = date('l F d, Y', strtotime($feed[$x]['date']));

            echo '<li>';
            echo '<h2> <strong>'.$site.'</strong> </h2>
            <br> <h3> <a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.' </a> </h3> 
            <br> <small>'.$date.'</small> 
            <br> <br> '.$description.' ';
            echo '<li>';
         }
         echo '</ul> </div>';
         ?>
      </div>
   </body>
</html> -->