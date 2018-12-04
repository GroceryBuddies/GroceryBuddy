<?php
require_once 'login.php';
    echo "in the file";
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $groceryName = $_POST['groceryName'];
    $groceryType = $_POST['groceryType'];
    $groceryDescription = $_POST['groceryDescription'];
    $userID = $_POST['userID'];
    $query = "INSERT INTO gb_Groceries (userID, itemName, type, shortDescription) VALUES ('$userID', '$groceryName', '$groceryType', '$groceryDescription')";
    echo $query;
    $result = $connection->query($query);
    echo $result;
?>