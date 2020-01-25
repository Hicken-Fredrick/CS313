<?php
  $items = include 'items.php';
  
  if(isset($_POST['addItUp'])){
   array_push($_SESSION['cart'], $items[0][$_POST['addItUp']]);
  }

?>