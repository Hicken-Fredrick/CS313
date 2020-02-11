<?PHP
  $db = get_db();

  $firstName = htmlspecialchars(strtolower($_GET['userFirst']));
  $lastName = htmlspecialchars(strtolower($_GET['userLast']));

  $query = 'SELECT * FROM wishlist."user" WHERE firstname ="$firstName" AND lastname ="$lastName"';
  $stmt = $db->prepare($query);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <h1>CHOOSE ACTIVE USER</h1>
  </header>
  <?php
  
      foreach ($users as $user)
      {
        echo '<form action="outerListView.php" method="post">';
        echo 'USER: ' . ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']) . '<br/>';
        echo '<input type="hidden" value="' . $row[userid] .'" name="id">';
        echo '<input type="submit" value="Choose"></form>';
      }
  
      unset($user);
      echo '</main>';

  ?>
</body>
</html>