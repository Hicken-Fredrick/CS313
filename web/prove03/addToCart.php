<?php
  $items = include 'items.php';
  
  if(isset($_POST['addItUp'])){
   array_push($_SESSION['cart'], $items[*][$_POST['addItUp']]);
  }

?>