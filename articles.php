<?php

require_once('config.php');

// get article slug:
$request = explode('/', $_SERVER['REQUEST_URI']);

//grab the article data
// SELECT title, introtext, fulltext, created, created_by_alias, metakey, metadesc

//prepared statement
$alias = $request[2];

// $stmt = $pdo->prepare('SELECT title, introtext, created, created_by_alias, metakey, metadesc FROM aic5k_content WHERE alias = :alias');
$stmt = $pdo->prepare('SELECT title, introtext, created, created_by_alias, metakey, metadesc, `fulltext` FROM aic5k_content WHERE alias = :alias');
$stmt->execute(['alias' => $alias]);

$result = [];

foreach ($stmt as $row) {
  $result = $row;
}

//clean up the date
$date = date_create($result['created']);
$formattedDate = date_format($date, 'F d, Y') ;

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $result['title'] ?></title>

    <link rel="stylesheet" href="/css/main.css" />
  </head>
  <body>
    <div id="main">
      <h1><?= $result['title'] ?></h1>

      <p><b>Date created:</b> <?= $formattedDate ?></p>
      <p><b>Author:</b> <?= $result['created_by_alias'] ?></p>
      <p><b>tag:</b> <span id="tag"></span><p>

      <div class="content">
        <?= $result['fulltext'] ?>
      </div>

      <hr>
      <hr>
      <hr>

      <div class="content">
        <h2>Intro text</h2>
        <?= $result['introtext'] ?>
      </div>
    </div>
  <!-- include jQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  // get all the img tags and rewrite the src
  $(document).ready(function() {
    $('img').each(function() {
      var src = $(this).attr('href');
      $(this).attr('src', src);
    });

    //get the tag
    $('img').parents('a').each(function() {
      var url = $(this).attr('href').split('/');
      var tag = url[0];

      $('#tag').append(tag);
    })
  });

</script>
  </body>
</html>
