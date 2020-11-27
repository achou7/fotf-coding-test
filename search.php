<?php

require_once 'config.php';

/* Fill in this page to search the database and return results from a specific date range */
/* see index.php for an example of how to get articles from the database */
  $start = $_GET["startingDate"];
  $end = $_GET["endingDate"];
  $stmt = $pdo->prepare('SELECT title, alias, created FROM aic5k_content WHERE CREATED >= :start AND CREATED <= :end ORDER BY created');
  $stmt-> execute(['start' => $start, 'end' => $end]);

  $result = [];

  foreach ($stmt as $row) {
    array_push($result, $row);
  }

  $reverse = array_reverse($result);

  echo json_encode($result);

?>