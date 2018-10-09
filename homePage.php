<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grocery Buddy</title>
    <style>
        td {
            border: 1px solid black;
            padding: 1em 1em 1em 1em;
        }
 </style>
</head>
<body>
<h1>
    GroceryBuddy HomePage
</h1>

<?php
include 'login.php';
$customers = new mysqli($hn, $un, $pw, $db);

if($customers->connect_error){
    die("Connection Failed... Bummer<br>".$customers->connect_error);
}

$un = $_POST["un"];
$pw = $_POST["pw"];

$query = "SELECT * FROM CUSTOMERS WHERE EMAIL='$un'";
$result = $customers->query($query);

$row = $result->fetch_array();

if($row[PASSWORD] === $pw){
    echo "You have been authenticated.<br>";
}else{
    echo "Get out of my website";
}
?>

</body>
</html>