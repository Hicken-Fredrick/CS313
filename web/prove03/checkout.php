<?php //check on every page to ensure landing point continuity
  session_start(); //start session
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
  <?php
  echo "<h1>CONTENTS OF CART</h1>";
  $j = 0;
  for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo "<p> Cart Item --" . $j . $_SESSION['cart'][$i] . " Was Added.</p>";
    $j += 1;
  }
  echo "<h1>END OF CONTENTS</h1>";
  ?>                               
                            
</body>
</html>