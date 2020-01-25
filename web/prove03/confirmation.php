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
    <h2><a href="browse.php">BUY MORE STUFFS!</a></h2>
  </header>
  <?php
    $total = htmlspecialchars($_POST['totalAmmount']);
    $address = htmlspecialchars($_POST['address']);
    echo "<main><fieldset>";
    echo "<legend>COMPLETED ORDER DETAILS</legend>";
    foreach($_SESSION['cart'] as $key => $cartItem){
      echo "<label><span> ORDER: " . $cartItem[0] . " : $" . $cartItem[1] . "</span></label>";
    }
    echo "<label><span><strong> TOTAL: $" . $total . "</strong></span></label>";
    echo "</fieldset>";
    echo "<fieldset><legend>DESTINATION</legend>";
    echo "<p>SHIPPING TO: ". $address . "</p>";
    echo "</fieldset></main>";
  ?>
</body>
</html>