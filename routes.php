<?php

// Basic Front Controller

$request = explode('/', $_SERVER['REQUEST_URI']);

if($request[1] == 'articles') {
  include 'articles.php';
}  else if ($request[1] == 'search') {
  include 'search.php';
}  else {
  include 'index.php';
}


 ?>
