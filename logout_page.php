<!DOCTYPE html>
<html>
    <head>
        <title>Logged Out</title>
    </head>
    <?php
        // remove session and session cookie
        session_start();

        unset($_SESSION['username']);
        unset($_SESSION['firstname']);
        unset($_SESSION['surname']);
        unset($_SESSION['type']);

        session_destroy();
    ?> 
    <body>
        <h1>Logged Out</h1>
        <p>
            You are now logged out of the website.
        </p>
        <p>
            <a href="login_page.php">Log in</a> again.
        </p>
    </body>
</html>