<?php

$firstName = strtolower(htmlspecialchars($_POST['userFirst']));
$lastName = strtolower(htmlspecialchars($_POST['userLast']));

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('INSERT INTO wishlist."user" (firstname, lastname)
    VALUES (:first, :last)');
$stmt->bindValue(':first', $firstName, PDO::PARAM_STR);
$stmt->bindValue(':last', $lastName, PDO::PARAM_STR);
$stmt->execute();

$newPage = 'chooseUser.php?userFirst=' . $firstName . '&userLast=' . $lastName;
header('Location:' . $newPage);
die();

?>