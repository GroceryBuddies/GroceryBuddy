<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $recipeID = $_POST[recipeID];
    $userID = $_POST[userID];
    $query = "SELECT * FROM gb_Join WHERE recipeID=$recipeID";
    $result = $connection->query($query);
    while($row = $result->fetch_array()){
        $itemID = row[itemID];
        $quantity = row[quantity];
        $query = "INSERT INTO gb_ShoppingList (userID, itemID, timeAdded, isPurchased, quantity) VALUES ($userID, $itemID, '12', '0', $quantity)";
        $result = $connection->query($query);
    }
    
?>