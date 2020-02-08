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
        
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
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
    $user = htmlspecialchars($_POST['user']);
    
    foreach ($db->query('SELECT ' . $user . 'FROM wishlist.\"user\"') as $row)
    {
      echo 'USER: ' . $row["firstName"] . ' ' . $row["lastName"];        
    }
  
    if ($row == null)
    {
      echo 'NO USER FOUND BY THAT NAME';
    }
  ?>
</body>
</html>