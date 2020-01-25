<?php
  if(isset($_POST['addItUp'])){
   array_push($_SESSION['cart'], $_POST['addItUp']);
  }
?>