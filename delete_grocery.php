<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $groceryName = $_POST['id'];
    $query = "DELETE FROM gb_Groceries WHERE username=$groceryName";
    $result = $connection->query($query);
?>