<?php //check on every page to ensure landing point continuity
  require('dbConnect.php');
  $db = get_db();

  session_start(); //start session

  $sublistid = $_GET['listid'];

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
    <title>CS313 | Inner List | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1>ACTIVE LISTS WITHIN</h1>
  </header>
  <?php
    include 'nav.php';
    
      echo '<main>';
        
      foreach ($subLists as $subList)
      {
        echo '<form action="innerListView.php" method="get">';
        echo 'LIST: ' . $subList['listname'] . ' - ' . $subList['listdescription'] . '<br/>';
        echo '<input type="hidden" value="' . $subList[listid] .'" name="listid">';
        echo '<input type="submit" value="Choose"></form>';
      }
      
      foreach ($items as $item)
      {
        echo '<form method="get">';
        echo 'ITEM: ' . $item['itemname'] . ' - ' . $item['itemcost'] . '<br/>';
        echo 'INFO: ' . $item['itemlocation'] . ' - ' . $item['iteminfo'] . '<br/>';
        echo '<input type="hidden" value="' . $item[itemid] .'" name="id">';
        echo '<input type="hidden" value="' . $sublistid .'" name="listid">';
        echo '<input type="submit" value="DELETE"></form>';
      }
       echo '</main>';

  ?>
</body>
</html>