<?php //check on every page to ensure landing point continuity
  session_start(); //start session
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include 'header.php'; ?> <!-- Includes Meta Data for Charset, Viewport, and Author -->
    <link href="main.css" rel="stylesheet">
    <title>CS313 | Index | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1>ADD LIST</h1>
  </header>
  <?php include 'nav.php'; ?>
  <form action="outerListView.php" method="post">

        <p>List Name: <input type="text" name="userFirst"><br/></p>
        <p>List Description: <input type="text" name="userLast"><br/></p>

        <input type="submit">
    </form>
</body>
</html>