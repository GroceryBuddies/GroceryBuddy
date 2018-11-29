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
      padding-top: 2px;
      padding-bottom: 2px;
      padding-left: 20px;
      padding-right: 20px;
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
    $username = $firstName = $lastName = $phoneNumber = $password = $email = "";

    if(isset($_POST['submit']))
    {
        $username = $_POST['an'];
        $firstName = $_POST['fn'];
        $lastName = $_POST['ln'];
        $phoneNumber = $_POST['pn'];
        $password = $_POST['pw'];
        $email= $_POST['un'];

        $query = "SELECT * FROM gb_Users WHERE username='$username'";
        $result = $connection->query($query);
        $row = $result->fetch_array();

        if ($result->num_rows == 0)
        {
          $submittedPassword = saltAndHash($password);
          $query = "INSERT INTO gb_Users (username, firstname, lastname, email, password, phone, publicEmail) VALUES ('$username', '$firstName', '$lastName', '$email', '$submittedPassword', '$phoneNumber', '$email')";
          $result = $connection->query($query);
          redirectToPage();
          if (!$result) die($connection->error);
        }

        else{
          die($connection->error);
          $errorMessage = "User already exists: account not created";
        }
    }
  ?>
        <p style="color: red">
          <?php echo $errorMessage;?>
        </p>
    <span class="border-0 center">
      <form class="form-registerUser" method="POST" action="createUser.php">
        <div class="pad"><img src="https://mycourses.msstate.edu/courses/1/CSE-3324-01-201830/groups/_27771_1//_2767570_1/ic_launcher.png" class="rounded"><h1>GroceryBuddy</h1></div>
        <fieldset>
          <!-- User creates first name -->
          <div class="pad">
            <label for="inputFirstName" class="sr-only">First Name</label>
            <input type="firstName" id="inputFirstName" class="form-control" placeholder="First Name" required="" name="fn">
          </div>

          <!-- User creates last name -->
          <div class="pad">
            <label for="inputLastName" class="sr-only">Last Name</label>
            <input type="lastName" id="inputLastName" class="form-control" placeholder="Last Name" required="" name="ln">
          </div>

          <!-- User creates phone number-->
          <div class="pad">
            <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
            <input type="phoneNumber" id="inputPhoneNumber" class="form-control" placeholder="Phone Number" required="" name="pn">
          </div>

          <!-- User creates user name-->
          <div class="pad">
            <label for="inputUserName" class="sr-only">User Name</label>
            <input type="userName" id="inputUserName" class="form-control" placeholder="User Name" required="" name="an">
          </div>

          <!-- User creates email -->
          <div class="pad">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="emailAddress" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="" name="un">
          </div>

          <!-- User creates password -->
          <div class="col-med mb-3 pad">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="pw">
          </div>

      </fieldset>
        <div class="pad">
          <a href="reset_pass.html">Forgot password?</a>
        </div>
        <div class="pad">
          <a href="login_page.php">Already a user? Log In</a>
        </div>
        <div class="pad">
          <button class="btn btn-med btn-warning btn-block" name="submit" type="submit">Sign up</button>
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
    $_SESSION["username"] =  $username;
    $_SESSION["type"] =  $type;
}

function redirectToPage(){
    $type = $_SESSION["type"];
        header('Location: index.php');
        exit();
}
?>
