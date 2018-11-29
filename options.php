<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GroceryBuddy</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <h1>Options</h1>
    <br>
     <?php
        session_start();
        if($_SESSION['type'] == 1 ){
            require_once 'login.php';
            $connection = new mysqli($hn, $un, $pw, $db);
            if ($connection->connect_error) die($connection->connect_error);
           createUserTable($connection);
           createGroceryTable($connection);
        }else {
            echo "Welcome User<br>";
            echo $_SESSION['username'];
        }
    ?>
</body>

<?php

function createUserTable($connection){
    $query = "SELECT * FROM gb_Users";
    $result = $connection->query($query);
    echo ' <table class="table">
    <thead>
        <tr>                
            <th scope="col">User</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_array()){
        $username = $row[username];

        echo "<tr>";            
        echo "<td>".$username."</td>";
        echo "<td>    
        <button id='add' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
        <b>Delete</b>
        </button>
        </td>";
        echo "</tr>";
    }
    echo '</tbody>
    </table><br><br>';
}

function createGroceryTable($connection){
    $query = "SELECT * FROM gb_Groceries";
    $result = $connection->query($query);
    echo ' <table class="table">
    <thead>
        <tr>                
            <th scope="col">Grocery</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_array()){
        $itemName = $row[itemName];

        echo "<tr>";            
        echo "<td>".$itemName."</td>";
        echo "<td>    
        <button id='add' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
        <b>Delete</b>
        </button>
        </td>";
        echo "</tr>";
    }
    echo '</tbody>
    </table><br><br>';

}
?>

