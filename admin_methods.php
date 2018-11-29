<?php

function user_delete($username){
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $query = "DELETE FROM gb_Users WHERE username='$username'";
    $result = $connection->query($query);
}

function grocery_delete($groceryName){
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $query = "DELETE FROM gb_Groceries WHERE username='$groceryName'";
    $result = $connection->query($query);
}

?>
