<?php

require('dbConnect.php');
$db = get_db();
session_start();

$name = htmlspecialchars($_POST['listName']);
$desc = htmlspecialchars($_POST['listDescription']);
$id = htmlspecialchars($_SESSION['user']);

$stmt = $db->prepare('INSERT INTO wishlist.list (listname, istdescription, userid)
    VALUES (:name, :desc, :id)');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
$stmt->bindValue(':id', $id,PDO::PARAM_INT);
$stmt->execute();

$newPage = 'outerListView.php';
header('Location:' . $newPage);
die();

?>