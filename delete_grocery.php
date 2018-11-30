<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $groceryName = $_POST['id'];
    $query = "SELECT * FROM gb_Groceries WHERE itemName=$groceryName";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $itemID = $row[itemID];
    $query = "DELETE FROM gb_Join WHERE itemID=$itemID";
    $result = $connection->query($query);
    $query = "DELETE FROM gb_ShoppingList WHERE itemID=$itemID";
    $result = $connection->query($query);
    $query = "DELETE FROM gb_Groceries WHERE itemID=$itemID";
    $result = $connection->query($query);
?>