<?php
    // Include the db file
    require_once 'dbh.inc.php';

    // Check if something post or not
    if (isset($_POST['submit'])) {
        $fullname   =  mysqli_real_escape_string( $conn, $_POST['full-name'] );
        $username   =  mysqli_real_escape_string( $conn, $_POST['user-name'] );
        $email      =  mysqli_real_escape_string( $conn, $_POST['email'] );
        $password   =  mysqli_real_escape_string( $conn, $_POST['pwd'] );
        $cpassword  =  mysqli_real_escape_string( $conn, $_POST['cpwd'] );
        $city       =  mysqli_real_escape_string( $conn, $_POST['city'] );
        $country    =  mysqli_real_escape_string( $conn, $_POST['country'] );
        $zip        =  mysqli_real_escape_string( $conn, $_POST['zip'] );

        // Include the functions file
        require_once 'functions.inc.php';

        // Check errors by calling signup function
        if ( emptyInputSignup( $fullname, $username, $email, $password, $cpassword, $city, $country, $zip) !== false ) {
            header("Location: ../signup.php?error=emptyInput");
            exit();
        }
        if ( invalidFullName( $fullname ) !== false ) {
            header("Location: ../signup.php?error=invalidname");
            exit();
        }
        if ( invalidUserName( $username ) !== false ) {
            header("Location: ../signup.php?error=invalidusername");
            exit();
        }
        if ( invalidEmail( $email ) !== false ) {
            header("Location: ../signup.php?error=invalidemail");
            exit();
        }
        if ( invalidpwd( $password, $cpassword ) !== false ) {
            header("Location: ../signup.php?error=invalidpassword");
            exit();
        }
        if ( pwdMatch( $password, $cpassword ) !== false ) {
            header("Location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        if ( invalidCity( $city ) !== false ) {
            header("Location: ../signup.php?error=invalidcity");
            exit();
        }
        if ( invalidZip( $zip ) !== false ) {
            header("Location: ../signup.php?error=invalidzip");
            exit();
        }
        if ( UsernameExists( $conn, $username ) !== false ) {
            header("Location: ../signup.php?error=usernamealreadytaken");
            exit();
        }
        if ( emailExists( $conn, $email ) !== false ) {
            header("Location: ../signup.php?error=emailalreadytaken");
            exit();
        }

        // Create the user
        createUser( $conn, $fullname, $username, $email, $password, $cpassword, $city, $country, $zip );


    } else {
        // Redirect to signup page
        header("Location: ../index.php");
        exit;
    }