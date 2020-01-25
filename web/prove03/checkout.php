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
    <h2><a href="viewCart.php">Return To Cart</a></h2>
  </header>
  <?php
  $total = 0;
  echo "<main><fieldset>";
  echo "<legend>ORDER INFORMATION</legend>";
  foreach($_SESSION['cart'] as $key => $cartItem){
    echo "<label><span> ORDER: " . $cartItem[0] . " : $" . $cartItem[1] . "</span></label>";
    $total+=$_SESSION['cart'][$i][1];
  }
  unset($cartItem);
  echo "<label><span> TOTAL: $" . $total . "</span></label>";
  echo "</fieldset>";
  echo "<fieldset><legend>SHIPPING INFORMATION</legend>";
  echo "<form action=\"confirmation.php\" method=\"POST\">";
  echo "<p>ADDRESSS: <input name=\"address\" type=\"text\" placeholder=\"123 Fake Street\"/></p>";
  echo "<input type=\"hidden\" name=\"totalAmmount\" value=\"" . $total . "\">"; //used to add items using code
  echo "<input type=\"submit\" value=\"CONFIRM\"/>";
  echo "</form></fieldset></main>";
  ?>
</body>
</html>