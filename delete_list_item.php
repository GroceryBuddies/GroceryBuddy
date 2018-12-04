<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $itemID = $_POST['itemID'];
    $userID = $_POST['userID'];
    $query = "DELETE FROM gb_ShoppingList WHERE itemID=$itemID AND userID=$userID";
    $result = $connection->query($query);
?>