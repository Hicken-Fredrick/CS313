<?php //check on every page to ensure landing point continuity
  session_start(); //start session

	if(!isset($_SESSION['user'])){ //check if session is there already
		$_SESSION['user'] = htmlspecialchars($_POST['id']); //name an array to store items
	}

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
  <?php
  
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
    
      echo "<h1>CHOOSE USER</h1>";
        
      foreach ($db->query('SELECT * FROM wishlist.list WHERE userid= ' . $_SESSION['user'] . ' AND sublistid IS NULL') as $row)
      {
        echo '<form action="innerListView.php" method="post">';
        echo 'LIST: ' . $row['listname'] . ' - ' . $row['listdescription'] . '<br/>';
        echo '<input type="hidden" value="' . $row[listid] .'" name="id">';
        echo '<input type="submit" value="Choose"></form>';
      }
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
  

  ?>
</body>
</html>