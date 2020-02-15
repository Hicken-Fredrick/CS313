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

$stmt = $db->prepare('INSERT INTO wishlist.item ()
    VALUES ()');
$stmt->bindValue('', $, PDO::);
$stmt->bindValue('', $, PDO::);
$stmt->bindValue('', $, PDO::);
$stmt->bindValue('', $, PDO::);
$stmt->bindValue('', $, PDO::);
$stmt->execute();

$newPage = 'outerListView.php';
header('Location:' . $newPage);
die();

?>

echo '<label for="itemName">Item Name:</label> <input type="text" id="itemName" name="itemName" required>';
    echo '<label for="cost">Item Cost:</label> <input type="" id="cost" name="itemCost">';
    echo '<label for="loc">Item Location:</label> <input type="text" id="loc" name="itemLocation">';
    echo '<label for="info">Item Info:</label> <input type="text" id="info" name="itemInfo">';
    echo '<input type="hidden" value="' . $sublistid .'" name="listid">';