<?php

require('dbConnect.php');
$db = get_db();
session_start();

$name = htmlspecialchars($_POST['itemName']);
$subListId = htmlspecialchars($_POST['listid']);
$cost= null;
$loc = null;
$info = null;

if(isset($_POST['itemCost'])) {
  $subListId = $_POST['itemCost'];
}
if(isset($_POST['itemLocation'])) {
  $subListId = $_POST['itemLocation'];
}
if(isset($_POST['itemInfo'])) {
  $subListId = $_POST['itemInfo'];
}

$stmt = $db->prepare('INSERT INTO wishlist.item (itemname, itemcost, itemlocation, iteminfo, listid)
    VALUES (:name, :cost, :loc, :info, :subId)');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':cost', $cost, PDO::PARAM_STR);
$stmt->bindValue(':loc', $loc, PDO::PARAM_STR);
$stmt->bindValue(':info', $info, PDO::PARAM_STR);
$stmt->bindValue(':subId', $subListId, PDO::PARAM_INT);
$stmt->execute();

echo "ITEM ADDED";

?>