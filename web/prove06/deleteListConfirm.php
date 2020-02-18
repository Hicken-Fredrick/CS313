<?php //check on every page to ensure landing point continuity
  require('dbConnect.php');
  $db = get_db();

  session_start(); //start session

  $listid = $_GET['listid'];
  $listName = $_GET['listName'];
  $listDesc = $_GET['listDesc'];

  $query = 'SELECT * FROM wishlist.list WHERE userid= ' . $_SESSION['user'] . ' AND sublistid= ' . $listid;
  $stmt = $db->prepare($query);
  $stmt->execute();
  $subLists = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $query = 'SELECT * FROM wishlist.item WHERE listid= ' . $listid;
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
    <br/>
    <h2>REVIEW DATA TO BE DELETED</h2>
  </header>
  <?php
    include 'nav.php';
    
    echo '<main id="deleteListConfirm">';
    
    echo '<h4>ALL DATA BELOW WILL BE DELETED<h4>';  
    echo '<form action="deleteListDB.php" method="post" id="delete">';
    echo '<input type="hidden" value="' . $listid . '" name="listid"></form>';
    echo '<fieldset id="listsList"><legend>LISTS</legend>';  
    foreach ($subLists as $subList)
    {
      echo '<form>';
      echo 'LIST: ' . $subList['listname'] . ' - ' . $subList['listdescription'] . '<br/>';
      echo '</form>';
    }
    echo '</fieldset>';
  
    echo '<fieldset id="itemsList"><legend>ITEMS</legend>';
    foreach ($items as $item)
    {
      echo '<form>';
      echo 'ITEM: ' . $item['itemname'] . ' - $' . $item['itemcost'] . '<br/>';
      echo 'INFO: ' . $item['itemlocation'] . ' - ' . $item['iteminfo'] . '<br/>';
      echo '</form>';
    }
    echo '</fieldset> <br/>';
    
    echo '<button type="submit" form="delete" value="submit">DELETE</button>';  
  
  ?>
</body>
</html>