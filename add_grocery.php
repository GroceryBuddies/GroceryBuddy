<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $groceryID = $_POST['groceryID'];
    $userID = $_POST['userID'];
    $query = "INSERT INTO gb_ShoppingList (userID, itemID, quantity) VALUES ('$userID', '$groceryID', '1')";
    $result = $connection->query($query);
?>