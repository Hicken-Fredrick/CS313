<?php //check on every page to ensure landing point continuity
  session_start(); //start session

	if(!isset($_SESSION['cart'])){ //check if session is there already
		$_SESSION['cart'] = array(); //name an array to store items
        $_SESSION['address'];
	}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <title>Karl's Knick Knack Kacavalcade</title>
  <meta name="author" content="Fred Hicken">
  <meta name="description" content="Marshel's Army Depot">
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
  <header>
    <h1>Karl's Knick Knack Kacavalcade</h1>
    <h2>A Few Things - For A Few People</h2>
    <h2><a href="browse.php">Return To Store</a></h2>
  </header>
  
  <?php
  include 'removeFromCart.php'; //allows removal button to work
  $total = 0;
  echo "<main>";
  foreach($_SESSION['cart'] as $key => $cartItem){
    echo "<form method=\"post\">";
    echo "<p> ORDER: " . $cartItem[0] . " : $" . $cartItem[1] . "</p>";
    echo "<input type=\"hidden\" name=\"cartNumber\" value=\"" . $key . "\">"; //used to add items using code
    echo "<input type=\"submit\" name=\"bringItDown\" class=\"button\" value=\"REMOVE FROM CART\"></form>";
    $j+=$_SESSION['cart'][$i][1];
  }
  unset($cartItem);
  echo "<h3>TOTAL: $" . $j . "</h3>";
  echo "</main>";
  print_r($_SESSION);
  ?>  
</body>
</html>