<?php
  echo '<nav>
    <ul id="primaryNav">
    <li><a href="login.php">CHANGE USER</a></li>
    <li><a href="outerListView.php">LISTS</a></li>
    <li><a href="addList.php">NEW LIST</a></li>';
    
  if(isset($_GET['listid']);) {
    echo '<li><a href="deleteListConfirm.php">DELETE LIST</a></li>';
    }

  echo '</ul>
    </nav>';
?>