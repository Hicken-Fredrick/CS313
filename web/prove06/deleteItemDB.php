<?php

require('dbConnect.php');
$db = get_db();
session_start();

$id = htmlspecialchars($_SESSION['user']);
$listId = htmlspecialchars($_POST['listid']);

$stmt = $db->prepare('DELETE FROM wishlist.list WHERE listid= :listid AND userid= :id');
$stmt->bindValue(':listid', $listId, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

die();

?>