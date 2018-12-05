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
<h1>
    Recipes
</h1>
    <br>
    <table class="table">
        <thead>
            <tr>                
                <th scope="col">Recipe</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Add</th>
            </tr>
        </thead>
        <tbody>
     <?php
        session_start();
        require_once 'login.php';
        $connection = new mysqli($hn, $un, $pw, $db);
        if ($connection->connect_error) die($connection->connect_error);
        $userID = $_SESSION['userID'];
        $query = "SELECT * FROM gb_Recipes";
        $result = $connection->query($query);
        while($row = $result->fetch_array()){
            $recipeID = $row[recipeID];
            $recipeName = $row[recipeName];
            $recipeType = $row[recipeType];
            $recipeDescription = $row[shortDescription];
            echo "<tr>";
            echo "<td>".$recipeName."</td>";
            echo "<td>".$recipeType."</td>";
            echo "<td>".$recipeDescription."</td>";
            echo "<td>    
            <button type='submit' class='btn btn-primary' name='addRecipe' user=$userID id=$recipeID>
            <b>Add to List</b>
            </button>
            </td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</body>

<script type="text/javascript">
    $(function() {
        $(".btn").click(function() {
            var add_ID = $(this).attr("id");
            var userID = $(this).attr("user");
            var info = 'recipeID=' + add_ID + 'userID=' + userID;
            var which = $(this).attr("name");
            if(which == "addRecipe") {
                console.log(info);
                $.post("add_recipe.php", {recipeID:add_ID, userID:userID},function(){
                });
                return false;
            }
        });
    });
</script>