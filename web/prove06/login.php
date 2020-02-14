<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include 'header.php'; ?> <!-- Includes Meta Data for Charset, Viewport, and Author -->
    <link href="main.css" rel="stylesheet">
    <title>CS313 | Login | Fred Hicken</title>
    <meta name="description" content="Index Page">
</head>
<body id="login">
  <header>
  <h1>Welcome To Wishlist Station</h1>
  <h2>Login Here!</h2>
  </header>
  <div class="bar"></div>
  
  <main id="login">
    <fieldset>
      <legend>RETURNING USER</legend>
      <form action="chooseUser.php" method="get">

        <label for="userFirst">First Name:</label> 
        <input type="text" id="userFirst" name="userFirst"><br/>

        <label for="userLast">Last Name:</label> 
        <input type="text" id="userLast" name="userLast"><br/>

        <input type="submit" value="Login">
      </form>
    </fieldset>
    
    <fieldset>
      <legend>NEW USER</legend>
      <form action="newUser.php" method="post">

        <label for="newUserFirst">First Name:</label>
        <input type="text" id="newUserFirst" name="userFirst" required><br/>

        <label for="newUserLast">Last Name:</label>
        <input type="text" id="newUuserLast" name="userLast" required><br/>

        <input type="submit" value="Create">
      </form>
    </fieldset>
    
  </main>
</body>
</html>