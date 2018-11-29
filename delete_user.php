<?php
require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $username = _POST['id'];
    $query = "DELETE FROM gb_Users WHERE username='$username'";
    $result = $connection->query($query);
?>