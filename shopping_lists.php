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
    Shopping List
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
                <label for="message-text" class="col-form-label">Quantity</label>
                    <input class="form-control" id="quantity"></textarea>
                    <label for="message-text" class="col-form-label">Grocery</label>
                    <input class="form-control" id="name"></textarea>
                </div>
            </form>
            <!-- END -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
                <th scope="col">Quantity</th>
                <th scope="col">Grocery</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Remove</th>
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
            echo "<td>".$groceryName."</td>";
            echo "<td>".$groceryType."</td>";
            echo "<td>".$groceryDescription."</td>";
            echo "<td>    
            <button type='submit' class='btn btn-primary' name='removeGrocery' user=$userID id=$itemID>
            <b>Remove</b>
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
            var del_id = $(this).attr("id");
            var userID = $(this).attr("user");
            var info = 'itemID=' + del_id + 'userID=' + userID;
            var which = $(this).attr("name");
            if(which == 'removeGrocery'){
                console.log(info);
                $.post("delete_list_item.php",{itemID:del_id, userID:userID},function() {
                });
                loadShopping();
                return false;
            }
        });
    });
</script>