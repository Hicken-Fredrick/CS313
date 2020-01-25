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
    
  <title>Karl's Knick Knack Kacavalcade</title>
  <meta name="author" content="Fred Hicken">
  <meta name="description" content="Karl's Knick Knack Kacavalcade">
  <link href="style.css" rel="stylesheet">

</head>
<body>
  <header>
    <h1>Karl's Knick Knack Kacavalcade</h1>
    <h2>A Few Things - For A Few People</h2>
    <h1><a href="checkout.php">GO TO TEST</a></h1>
  </header>
  <?php
    $items = include 'items.php'; //get items list to display
    echo "<main>";
    for ($i = 0; $i < count($items); $i++){
      for ($j = 0; $j < 1; $j++) {
        echo "<form method=\"GET\" action=\"addToCart.php\">";
        echo "<div><div><h3>" . $items[$i][0] . "</h3>";
        echo "<span>$" . $items[$i][1] . "</span></div>";
        echo "<p>" . $items[$i][2] . "</p></div>";
        echo "<input type=\"submit\" name=\"ADD TO CART\"></form>";
      }
    }
    echo "</main>";
  ?>
</body>
</html>