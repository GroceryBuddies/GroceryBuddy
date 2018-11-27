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
