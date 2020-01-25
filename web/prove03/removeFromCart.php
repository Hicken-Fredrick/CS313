<?php
  
  if(isset($_POST['bringItDown'])){
    unset($_SESSION['cart'][$_POST['cartNumber']]);
  }

?>