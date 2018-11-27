<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://mycourses.msstate.edu/courses/1/CSE-3324-01-201830/groups/_27771_1//_2767570_1/ic_launcher.png">
    <title>GroceryBuddy</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <style>
    .pad {
      padding-top: 10px;
      padding-bottom: 10px;
    }
    input {
      border-style: "round";
    }
    .center {
      margin: 0 auto !important;
      float: none !important;
      width: 500px;
      border-radius: 1em;
      background-color:rgba(183, 191, 202, 0);
      box-shadow: 5px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    } 
    button {
      background-color:rgb(255, 255, 255);
    }
  </style>
 
  <body class="text-center">

  <?php
    session_start();
    if(isset($_SESSION['username'])){
        redirectToPage();
    }
    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die($connection->connect_error);
    $username = "";
    $password = "";
    if(isset($_POST['submit']))
    {
        $username = $_POST['un'];
        $password = $_POST['pw'];
        $query = "SELECT * FROM gb_Users WHERE username = '$username' ";
        $result = $connection->query($query);
        $row = $result->fetch_array();
        $submittedPassword = saltAndHash($password);
        $userPassword = $row['password'];
        echo $submittedPassword;
        echo "<br>";
        echo $row['password'];
        if($submittedPassword == $userPassword){
            setSession($row['isAdmin'], $row['userID']);
            redirectToPage();
        }else{
            $errorMessage = "Failed Login Attempt";
        }
    }
  ?>
        <p style="color: red">
          <?php echo $errorMessage;?>
        </p>
    <span class="border-0 center">
      <form class="form-signin" method="POST" action="login_page.php">
        <div class="pad"><img src="https://mycourses.msstate.edu/courses/1/CSE-3324-01-201830/groups/_27771_1//_2767570_1/ic_launcher.png" class="rounded"><h1>GroceryBuddy</h1></div>
        <fieldset>
          <div class="pad">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="username" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="" name="un">
          </div>
          <div class="col-med mb-3">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="pw">
          </div>
      </fieldset>
        <div class="pad">
          <a href="reset_pass.html">Forgot password?</a>
        </div>
        <div class="pad">
          <a href="reset_pass.html">Create an Account</a>
        </div>
        <div class="pad">
          <button class="btn btn-med btn-warning btn-block" name="submit" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2018 GroceryBuddy</p>
        </div>
      </form>
    </span>
  </body>
</html>

<?php
function saltAndHash($password){
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('ripemd128', "$salt1$password$salt2");
    return $token;
}

function setSession($type, $username){
    $_SESSION["userID"] =  $username;
    $_SESSION["type"] =  $type;
}

function redirectToPage(){
    $type = $_SESSION["type"];
    if($type == '1'){
        header('Location: index.php');
        exit();
    }else{
        header('Location: index.php');
        exit();
    }
}
?>