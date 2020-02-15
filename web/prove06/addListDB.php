<?php

require('dbConnect.php');
$db = get_db();
session_start();

$name = htmlspecialchars($_POST['listName']);
$desc = htmlspecialchars($_POST['listDescription']);
$id = htmlspecialchars($_SESSION['user']);
$subListId = null;
if(isset($_POST['listid'])) {
  $subListId = $_POST['listid'];
}

$stmt = $db->prepare('INSERT INTO wishlist.list (listname, listdescription, userid, sublistid)
    VALUES (:name, :desc, :id, :subId)');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':subId', $subListId, PDO::PARAM_INT);
$stmt->execute();

$newPage = 'outerListView.php';
header('Location:' . $newPage);
die();

?>