<?php //check on every page to ensure landing point continuity
  require('dbConnect.php');
  $db = get_db();

  session_start(); //start session
  if (isset($_GET['id'])) {
    $_SESSION['user'] = htmlspecialchars($_GET['id']); //name an array to store items
  }

  $query = 'SELECT * FROM wishlist.list WHERE userid= ' . $_SESSION['user'] . ' AND sublistid IS NULL';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include 'header.php'; ?> <!-- Includes Meta Data for Charset, Viewport, and Author -->
    <link href="main.css" rel="stylesheet">
    <title>CS313 | Lists | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1>CURRENT ACTIVE LISTS</h1>
    <h2>These are your root lists, You can make any number of lists here or inside of a given list!</h2>
  </header>
  <?php
    include 'nav.php';
    echo '<main id="outerListView">';
        
    foreach ($lists as $list)
    {
      echo '<form action="innerListView.php" method="get">';
      echo 'LIST: ' . $list['listname'] . ' - ' . $list['listdescription'] . '<br/>';
      echo '<input type="hidden" value="' . $list[listid] .'" name="listid">';
      echo '<input type="hidden" value="' . $list['listname'] .'" name="listName">';
      echo '<input type="hidden" value="' . $list['listdescription'] .'" name="listDesc">';
      echo '<input type="submit" value="Choose"></form>';
    }
    echo '</main>';
  

  ?>
</body>
</html>