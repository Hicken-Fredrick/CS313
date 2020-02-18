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
      
    echo '<fieldset id="listsList"><legend>LISTS</legend>';  
    foreach ($subLists as $subList)
    {
      echo '<form action="innerListView.php" method="get">';
      echo 'LIST: ' . $subList['listname'] . ' - ' . $subList['listdescription'] . '<br/>';
      echo '<input type="hidden" value="' . $subList[listid] .'" name="listid">';
      echo '<input type="submit" value="Choose"></form>';
    }
    echo '</fieldset>';
    echo '<div class="accordion"><p>ADD A NEW LIST? CLICK HERE</p></div>'; 
    echo '<div class="hide"><form id="listInsert" action="addInnerListDB.php" method="post">';
    echo '<label for="listName">List Name:</label> <input type="text" id="listName" name="listName" required>';
    echo '<label for="desc">List Description:</label> <input type="" id="desc" name="listDescription">';
    echo '<input type="hidden" value="' . $sublistid .'" name="listid">';
    echo '<button id="listAdd">CREATE</button>';
    echo '</form></div>';  
  
    echo '<fieldset id="itemsList"><legend>ITEMS</legend>';
    foreach ($items as $item)
    {
      echo '<form method="get">';
      echo 'ITEM: ' . $item['itemname'] . ' - $' . $item['itemcost'] . '<br/>';
      echo 'INFO: ' . $item['itemlocation'] . ' - ' . $item['iteminfo'] . '<br/>';
      echo '<input type="hidden" value="' . $item[itemid] .'" name="id">';
      echo '<input type="hidden" value="' . $sublistid . '" name="listid">';
      echo '<input type="submit" value="DELETE"></form>';
    }
    echo '</fieldset>';
    echo '<div class="accordion"><p>ADD NEW ITEMS? CLICK HERE</p></div>'; 
    echo '<div class="hide"><form id="itemInsert" action="addItemDB.php" method="post">';
    echo '<label for="itemName">Item Name:</label> <input type="text" id="itemName" name="itemName" required>';
    echo '<label for="cost">Item Cost:</label> <input type="" id="cost" name="itemCost">';
    echo '<label for="loc">Item Location:</label> <input type="text" id="loc" name="itemLocation">';
    echo '<label for="info">Item Info:</label> <input type="text" id="info" name="itemInfo">';
    echo '<input type="hidden" value="' . $sublistid .'" name="listid">';
    echo '<button id="itemAdd">CREATE</button>';
    echo '</form></div>';  
    echo '</main>';

  ?>
<script src="showAdd.js"></script>
<script src="AJAXAddCall.js"></script>
</body>
</html>