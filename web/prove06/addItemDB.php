<?php

require('dbConnect.php');
$db = get_db();

$name = htmlspecialchars($_POST['itemName']);
$subListId = htmlspecialchars($_POST['listid']);
$cost= null;
$loc = null;
$info = null;

if(isset($_POST['itemCost'])) {
  $cost = $_POST['itemCost'];
}
if(isset($_POST['itemLocation'])) {
  $loc = $_POST['itemLocation'];
}
if(isset($_POST['itemInfo'])) {
  $info = $_POST['itemInfo'];
}

$stmt = $db->prepare('INSERT INTO wishlist.item (itemname, itemcost, itemlocation, iteminfo, listid)
    VALUES (:name, :cost, :loc, :info, :subId)');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':cost', $cost, PDO::PARAM_STR);
$stmt->bindValue(':loc', $loc, PDO::PARAM_STR);
$stmt->bindValue(':info', $info, PDO::PARAM_STR);
$stmt->bindValue(':subId', $subListId, PDO::PARAM_INT);
$stmt->execute();

$itemId = $db->lastInsertId('wishlist.item_itemid_seq');

echo '<form action="deleteItemDB.php" method="post">';
echo 'ITEM: ' . $name . ' - $' . number_format((float)$cost, 2, '.', '') . '<br/>';
echo 'INFO: ' . $loc . ' - ' . $info . '<br/>';
echo '<input type="hidden" value="' . $itemId .'" name="id">';
echo '<input type="hidden" value="' . $subListId .'" name="listid">';
echo '<input type="submit" value="DELETE" class="delete"></form>';

die();

?>