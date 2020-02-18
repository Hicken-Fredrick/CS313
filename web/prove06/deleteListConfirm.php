<?php //check on every page to ensure landing point continuity
  require('dbConnect.php');
  $db = get_db();

  session_start(); //start session

  $sublistid = $_GET['listid'];
  $listName = $_GET['listName'];
  $listDesc = $_GET['listDesc'];

  $query = 'SELECT * FROM wishlist.list WHERE userid= ' . $_SESSION['user'] . ' AND sublistid= ' . $sublistid;
  $stmt = $db->prepare($query);
  $stmt->execute();
  $subLists = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $query = 'SELECT * FROM wishlist.item WHERE listid= ' . $sublistid;
  $stmt = $db->prepare($query);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include 'header.php'; ?> <!-- Includes Meta Data for Charset, Viewport, and Author -->
    <link href="main.css" rel="stylesheet">
    <title>CS313 | LIST DELETE | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1><?php echo strtoupper($listName); ?> LIST</h1>
    <h2><?php echo strtoupper($listDesc); ?></h2>
    <h2>REVIEW DATA TO BE DELETED</h2>
  </header>
  <?php
    include 'nav.php';
    
    echo '<main id="deleteListConfirm">';
    
    echo '<h4>ALL DATA BELOW WILL BE DELETED<h4>';  
    echo '<form action="deleteListDB.php" method="post">';
    echo '<fieldset id="listsList"><legend>LISTS</legend>';  
    foreach ($subLists as $subList)
    {
      echo '<form action="innerListView.php" method="get">';
      echo 'LIST: ' . $subList['listname'] . ' - ' . $subList['listdescription'] . '<br/>';
      echo '</form>';
    }
    echo '</fieldset>';
  
    echo '<fieldset id="itemsList"><legend>ITEMS</legend>';
    foreach ($items as $item)
    {
      echo '<form method="get">';
      echo 'ITEM: ' . $item['itemname'] . ' - $' . $item['itemcost'] . '<br/>';
      echo 'INFO: ' . $item['itemlocation'] . ' - ' . $item['iteminfo'] . '<br/>';
      echo '</form>';
    }
    echo '</fieldset> <br/>';
    echo '<input type="hidden" value="' . $sublistid . '" name="listid" id="bigDelete">';
    echo '<input type="submit" value="DELETE"></form>';
  ?>
</body>
</html>