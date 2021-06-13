<?php
    // Include the db file
    require_once 'dbh.inc.php';

    // Check if something post or not
    if ( isset($_POST["login-submit"]) ) {
        $username = mysqli_real_escape_string($conn, $_POST['email/username']);
        $password = mysqli_real_escape_string($conn, $_POST['login-pwd']);

        // Include the functions file
        require_once 'functions.inc.php';

        // Check errors by calling login function
        if ( emptyInputLogin( $username, $password ) !== false ) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }
        if ( invalidUserName( $username ) !== false ) { 
            header("Location: ../login.php?error=invalidusername");
            exit();
        }

        // Log in the user
        loginUser( $conn, $username, $password );

    } else {
        // Redirect to login page
        header("Location: ../login.php");
        exit();
    }