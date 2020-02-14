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
    <title>CS313 | Inner List | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1><?php echo strtoupper($listName); ?> LIST</h1>
    <h2><?php echo strtoupper($listDesc); ?></h2>
  </header>
  <?php
    include 'nav.php';
    
    echo '<main id="innerListView">';
      
    echo '<fieldset><legend>LISTS</legend>';  
    foreach ($subLists as $subList)
    {
      echo '<form action="innerListView.php" method="get">';
      echo 'LIST: ' . $subList['listname'] . ' - ' . $subList['listdescription'] . '<br/>';
      echo '<input type="hidden" value="' . $subList[listid] .'" name="listid">';
      echo '<input type="submit" value="Choose"></form>';
    }
    echo '</fieldset>';
    
    echo '<fieldset><legend>ITEMS</legend>';
    foreach ($items as $item)
    {
      echo '<form method="get">';
      echo 'ITEM: ' . $item['itemname'] . ' - ' . $item['itemcost'] . '<br/>';
      echo 'INFO: ' . $item['itemlocation'] . ' - ' . $item['iteminfo'] . '<br/>';
      echo '<input type="hidden" value="' . $item[itemid] .'" name="id">';
      echo '<input type="hidden" value="' . $sublistid .'" name="listid">';
      echo '<input type="submit" value="DELETE"></form>';
    }
    echo '</fieldset>';
    echo '<div id="accordion"><p>ADD NEW ITEMS? CLICK HERE</p>'; 
    echo '<div><form>';
    echo 'Item Name: <input type="text" name="itemName">';
    echo 'Item Cost: <input type="" name="itemCost">';
    echo 'Item Location: <input type="text" name="itemLocation">';
    echo 'Item Info: <input type="text" name="itemInfo">';
    echo '</form></div></div>';  
  
    echo '</main>';

  ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="showAdd.js"></script>
<script src="AJAXAddDB.js"></script>
</body>
</html>