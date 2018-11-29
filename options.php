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
        <button type='submit' class='btn btn-primary' name='user' id=$username>
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
        <button type='submit' class='btn btn-primary' name='grocery' id=$itemName>
        <b>Delete</b>
        </button>
        </td>";
        echo "</tr>";
    }
    echo '</tbody>
    </table><br><br>';

}
?>
<script type="text/javascript">
    $(function() {
        $(".btn").click(function() {
            var del_id = $(this).attr("id");
            var info = 'id="' + del_id + '"';
            var which = $(this).attr("name");
            console.log(info);
            if(which == "user") {
                if (confirm("Sure you want to delete this? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "delete_user.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
                }
            } else if(which == "grocery") {
                if (confirm("Sure you want to delete this? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "delete_grocery.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
                }
            }
            return false;
        });
    });
</script>