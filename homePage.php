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
    session_start();
    if(isset($_SESSION['username']) && ($_SESSION['type'] == 'user')){
        $username = $_SESSION['username'];
        echo "Welcome back $username <br>";
        echo '<a href="logout_page.php">Log out</a>';
    }else{
        echo "GTFO! <br>";
        echo "...Or login ";
        echo '<a href="login_page.php">Here</a>';
    }
?>

</body>
</html>