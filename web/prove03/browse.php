<?php //check on every page to ensure landing point continuity
  session_start(); //start session

	if(!isset($_SESSION['cart'])){ //check if session is there already
		$_SESSION['cart'] = array(); //name an array to store items
	}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <title>Marshel's Army Depot</title>
  <meta name="author" content="Fred Hicken">
  <meta name="description" content="Marshel's Army Depot">
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
  <header>
  </header>
  <?php
    $items = include 'items.php'; //get items list to display
  
    for ($i = 0; $i < count($items); $i++){
      for ($j = 0; $j < 1; $j++) {
        echo "<p>" . $items[$i][0] . "   Costs --   " . $items[$i][1] . "</p>";
      }
    }
      
  ?>
</body>
</html>