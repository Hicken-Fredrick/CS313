<?php //check on every page to ensure landing point continuity
  session_start(); //start session
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include 'header.php'; ?> <!-- Includes Meta Data for Charset, Viewport, and Author -->
    <link href="main.css" rel="stylesheet">
    <title>CS313 | Index | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body>
  <header>
    <h1>ACTIVE LISTS WITHIN</h1>
  </header>
  <?php
    include 'nav.php';
    $sublistid = $_POST['listid'];
    
    try
    {
      $dbUrl = getenv('DATABASE_URL');

      $dbOpts = parse_url($dbUrl);

      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');

      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      echo '<main>';
        
      foreach ($db->query('SELECT * FROM wishlist.list WHERE userid= ' . $_SESSION['user'] . ' AND sublistid= ' . $sublistid) as $row)
      {
        echo '<form action="innerListView.php" method="post">';
        echo 'LIST: ' . $row['listname'] . ' - ' . $row['listdescription'] . '<br/>';
        echo '<input type="hidden" value="' . $row[listid] .'" name="listid">';
        echo '<input type="submit" value="Choose"></form>';
      }
      
      foreach ($db->query('SELECT * FROM wishlist.item WHERE listid= ' . $sublistid) as $row)
      {
        echo '<form method="post">';
        echo 'ITEM: ' . $row['itemname'] . ' - ' . $row['itemcost'] . '<br/>';
        echo 'INFO: ' . $row['itemlocation'] . ' - ' . $row['iteminfo'] . '<br/>';
        echo '<input type="hidden" value="' . $row[itemid] .'" name="id">';
        echo '<input type="hidden" value="' . $sublistid .'" name="listid">';
        echo '<input type="submit" value="DELETE"></form>';
      }
       echo '</main>';
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
  

  ?>
</body>
</html>