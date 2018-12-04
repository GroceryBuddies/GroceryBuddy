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
    Grocery List
    <button id="add" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
    <b>Add</b>
    </button>
    </h1>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Items to Grocery List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Add HTML/JS/PHP here. -->
            
            <form>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Name</label>
                    <input class="form-control" id="name"></textarea>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Type</label>
                    <input class="form-control" id="type"></textarea>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Description</label>
                    <input class="form-control" id="description"></textarea>
                </div>
            </form>

            <!-- END -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
    </script>

    <br>

    <table class="table">
        <thead>
            <tr>                
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scopt="col">Add</th>
            </tr>
        </thead>
        <tbody>
     <?php
        session_start();
        require_once 'login.php';
        $connection = new mysqli($hn, $un, $pw, $db);
        if ($connection->connect_error) die($connection->connect_error);
        $userID = $_SESSION['userID'];
        if(isset($_POST['submit']))
        {
            $itemName = $_POST['name'];
            $itemType = $_POST['type'];
            $itemDescription = $_POST['description'];
            $addQuery = "INSERT INTO gb_ShoppingList (userID, itemName, type, shortDescription) VALUES ('$userID', '$itemName', '$itemType', '$itemDescription')";
            $connection->query($addQuery);
        }
        $query = "SELECT * FROM gb_Groceries";
        $result = $connection->query($query);
        while($row = $result->fetch_array()){
            $groceryID = $row[itemID];
            $groceryName = $row[itemName];
            $groceryType = $row[type];
            $groceryDescription = $row[shortDescription];
            echo "<tr>";            
            echo "<td>".$groceryName."</td>";
            echo "<td>".$groceryType."</td>";
            echo "<td>".$groceryDescription."</td>";
            echo "<td>    
            <button type='submit' class='btn btn-primary' name='addGrocery' user=$userID id=$groceryID>
            <b>Add</b>
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
            var info = 'groceryID=' + add_ID + 'userID=' + userID;
            var which = $(this).attr("name");
            if(which == "addGrocery") {
                console.log(info);
                $.post("add_grocery.php", {groceryID:add_ID, userID:userID},function(){
                });
                return false;
            }
        });
    });
</script>