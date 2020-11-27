<?php

require_once 'config.php';

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Focus famille article list</title>
  <link rel="stylesheet" href="css/main.css">
  <script type="text/javascript" src="js/search.js"></script>
</head>

<body>
  <div id="main">
    <h1>Digital media coding example</h1>

    <h2>Context</h2>
    <p>We would like to add some functionality to help out our editors for the French magazine. The database is from an old Drupal instance of a legacy website. Unfortunately it is all we have from the backup, but the editors would like to reference old articles that were published.</p>

    <h2>Add a "Search by date" function</h2>
    <p>This page currently shows a list of all the articles. Use it as an example to see the data structure of an article, how to connect to the database, and return results.</p>
    <p>Your job is to create a "search" function that will return articles from a specific date range. The function will call the "/search" route and return only results from the specified date range. You may not return all articles and sort them on the frontend with Javascript. This must be done asyncronously and not refresh the page. The results should formatted and styled in a way that is easy to read.</p>
    <h2>Requirements</h2>
    <ul>
      <li>Return Articles sorted by a date range from the database</li>
      <li>Use javascript in the "search.js" script to call the "search.php" route on the server asyncronously</li>
      <li>Fill in the "search.php" route to connect to the database and retrieve articles. It must return the articles only from the requested date range</li>
      <li>Update the DOM with the search results</li>
      <li>Article results must be formatted and easy to read</li>
    </ul>
    <h2>Considerations</h2>
    <ul>
      <li>You may add any Javascript libraries that you think are appropriate.</li>
      <li>Styling is not critical, this is not about looks. However the results should have some basic treatments.</li>
      <li>A basic outline of HTML for the search section has been provided. You may modify this as needed for your solution.</li>
    </ul>
    <br>

    <h3>Search by date</h3>
    <form onSubmit="search();return false;" method="get" id="search">
      <input type="date" id="startingDate" name="startingDate" required>
      <input type="date" id="endingDate" name="endingDate" required>
    </form>
    <button type="submit" form="search">Search</button>

    <br>

    <h2>Articles</h2>
    <h4 id="status"></h4>
    <table>
      <thead>
        <tr>
          <td><b>Number</b></td>
          <td><b>Article title</b></td>
          <td><b>Date</b></td>
        </tr>
      </thead>
      <tbody id="articles">
      </tbody>
    </table>

  </div> <!-- end #main -->


</body>
</html>
