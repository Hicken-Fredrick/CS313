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
    $firstName = htmlspecialchars(strtolower($_POST['userFirst']));
    $lastName = htmlspecialchars(strtolower($_POST['userLast']));
  
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
        
      foreach ($db->query('SELECT * FROM wishlist."user" WHERE firstname = \'' . $firstName . '\' AND lastname = \'' . $lastName . '\'') as $row)
      {
        echo '<form action="outerListView.php" method="post">';
        echo 'USER: ' . ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']) . '<br/>';
        echo '<input type="hidden" value="' . $row[userid] .'" name="id">';
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