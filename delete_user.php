<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $username = $_POST['id'];
    $query = "SELECT * FROM gb_Users WHERE username=$username";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $userID = $row[userID];
    $query = "DELETE FROM gb_ShoppingList WHERE userID=$userID";
    $connection->query($query);
    $query = "SELECT * FROM gb_Recipes WHERE userID=$userID";
    $recipeResult = $connection->query($query);
    while($row = $recipeResult->fetch_array()){
        $recipeID = $row[recipeID];
        $query = "UPDATE gb_Recipes SET userID='13' WHERE recipeID=$recipeID";
        $connection->query($query);
    }
    $query = "SELECT * FROM gb_Groceries WHERE userID=$userID";
    $recipeResult = $connection->query($query);
    while($row = $recipeResult->fetch_array()){
        $itemID = $row[itemID];
        $query = "UPDATE gb_Groceries SET userID='13' WHERE itemID=$itemID";
        $connection->query($query);
    }
    $query = "DELETE FROM gb_Users WHERE userID=$userID";
    $connection->query($query);
?>