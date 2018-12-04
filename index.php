<!DOCTYPE html>

<html lang="en">

    <?php
        session_start();
        if(isset($_SESSION['userID'])){
        }else{
            header('Location: login_page.php');
            exit();
        }
    ?>

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

    <style>
        .pad {
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 6px;
        }
        .no-pad {
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .big-pad {
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 220%;
            padding-bottom: 0px;
        }
        .fa-1x {
            font-size: 1.5rem;
        }
        .navbar-toggler.toggler-example {
            cursor: pointer;
        }
        .dark-blue-text {
            color: #0A38F5;
        }
        .dark-pink-text {
            color: #AC003A;
        }
        .dark-amber-text {
            color: #ff6f00;
        }
        .dark-teal-text {
            color: #004d40;
        }
        .white {
            color: #FFFFFF
        }
    </style>

    <body>
        <!-- A grey horizontal navbar that becomes vertical on small screens -->
        <nav class="navbar navbar-fixed-top navbar-expand-sm bg-dark navbar-dark">
                <button href="#menu-toggle" type="button" id="menu-toggle" class="btn">
                    <i class="fas fa-align-left"></i>
                        <span>☰</span>
                </button>
                <div>
                    <h4 class="nav-brand pad white">GroceryBuddy</h4>
                </div>
        </nav>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" id="shopping">Shopping Lists</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="recipes">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="grocery">Grocery Lists</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="options">Options</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="logout">Log Out</a>
                    </li>
                    <li class="big-pad">
                        <font color="#FFFFFF">GroceryBuddy 2018</font>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid" id="content">
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>  
        
        <!-- Menu Toggle Script -->
        <script>
        function loadShopping() {
            $('#content').empty();
            $('#content').load('shopping_lists.php');
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        }
        function loadRecipes() {
            $('#content').empty();
            $('#content').load('recipes.php');
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        }
        function loadGrocery() {
            $('#content').empty();
            $('#content').load('groceryList.php');
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        }
        function loadOptions() {
            $('#content').empty();
            $('#content').load('options.php');
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        }
        $(document).ready(function(){
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $('#content').empty();
            $('#content').load('shopping_lists.php');
            $('#shopping').click(function(e){
                loadShopping();
            });
            $('#recipes').click(function(e){
                loadRecipes();
            });
            $('#grocery').click(function(e){
                loadGrocery();
            });
            $('#options').click(function(e){
                loadOptions();
            });
            $('#logout').click(function(e){
                $.get('logout_page.php').success(window.location.replace("logout_page.php"));
            });
        });
        </script>

    </body>

</html>
