<?php

require('dbConnect.php');
$db = get_db();
session_start();

$list = htmlspecialchars($_POST['listid']);
$itemId = htmlspecialchars($_POST['id']);

$stmt = $db->prepare('DELETE FROM wishlist.item WHERE itemid= :itemid AND listid= :listid');
$stmt->bindValue(':listid', $list, PDO::PARAM_INT);
$stmt->bindValue(':itemid', $itemId, PDO::PARAM_INT);
$stmt->execute();

die();

?>