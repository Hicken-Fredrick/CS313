<?php

require('dbConnect.php');
$db = get_db();
session_start();

$name = htmlspecialchars($_POST['listName']);
$desc = htmlspecialchars($_POST['listDescription']);
$userId = htmlspecialchars($_SESSION['user']);
$subListId = htmlspecialchars($_POST['listid']);

$stmt = $db->prepare('INSERT INTO wishlist.list (listname, listdescription, userid, sublistid)
    VALUES (:name, :desc, :userId, :subId)');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
$stmt->bindValue(':userId', $id, PDO::PARAM_INT);
$stmt->bindValue(':subId', $subListId, PDO::PARAM_INT);
$stmt->execute();

echo '<form action="innerListView.php" method="get">';
echo 'LIST: ' . $name . ' - ' . $desc . '<br/>';
echo '<input type="hidden" value="' . $subListId . '" name="listid">';
echo '<input type="submit" value="Choose"></form>';

?>