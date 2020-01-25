<?php
  if(isset($_GET['add'])){
   array_push($_SESSION['cart'], "stuffs");
  }
?>