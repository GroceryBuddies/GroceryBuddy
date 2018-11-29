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

    <table class="table">
    <thead>
        <tr>                
            <th scope="col">User</th>
            <th scope="col">Delete</th>
            <th scope="col">Etc</th>
            <th scope="col">Etc</th>
        </tr>
    </thead>
    <tbody>
     <?php
        session_start();
        require_once 'login.php';
        $connection = new mysqli($hn, $un, $pw, $db);
        if ($connection->connect_error) die($connection->connect_error);
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM gb_ShoppingList WHERE userID='$userID'";
        $result = $connection->query($query);
        while($row = $result->fetch_array()){
            $itemID = $row[itemID];
            $query = "SELECT * FROM gb_Groceries WHERE itemID='$itemID'";
            $groceryResult = $connection->query($query);
            $grocery = $groceryResult->fetch_array();
            $groceryName = $grocery[itemName];
            $groceryType = $grocery[type];
            $groceryDescription = $grocery[shortDescription];
            $groceryQuantity = $row[quantity];

            echo "<tr>";            
            echo "<td>".$groceryQuantity."</td>";
            echo "<td>    
            <button id='add' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
            <b>Add</b>
            </button>
            </td>";
            echo "<td>    
            <button id='add' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
            <b>Add</b>
            </button>
            </td>";
            echo "<td>    
            <button id='add' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
            <b>Add</b>
            </button>
            </td>";
            echo "</tr>";

        }

    ?>

     <?php
        session_start();
        if($_SESSION['type'] == 1 ){
            echo "Welcome Admin<br>";
            echo $_SESSION['username'];
        }else {
            echo "Welcome User<br>";
            echo $_SESSION['username'];
        }
    ?>
        </tbody>
    </table>
</body>
