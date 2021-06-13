<?php

                                        // Signup Error Handlers.

    // Empty Fields Error.
    function emptyInputSignup( $fullname, $username, $email, $password, $cpassword, $city, $country, $zip ) {
        $result;
        if ( empty($fullname) || empty($username) || empty($email) || empty($password) || empty($cpassword) || empty($city) || empty($country) || empty($zip) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid Name Error.
    function invalidFullName( $fullname ) {
        $result;
        if ( !preg_match("/^[a-zA-Z]/", $fullname) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid Username Error.
    function invalidUserName( $username ) {
        $result;
        if ( !preg_match("/^[a-zA-Z0-9]/", $username) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid E-mail Error.
    function invalidEmail( $email ) {
        $result;
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid Password Error.
    function invalidpwd( $password, $cpassword ) {
        $result;
        if ( !preg_match("/^[a-zA-Z0-9]/", $password, $cpassword) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Passwords dont match Error.
    function pwdMatch( $password, $cpassword ) {
        $result;
        if ($password !== $cpassword) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid City Name Error.
    function invalidCity( $city ) {
        $result;
        if ( !preg_match("/^[a-zA-Z]/", $city) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid Zip Code Error.
    function invalidZip( $zip ) {
        $result;
        if ( !preg_match("/^[0-9]/", $zip) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Username Existing Error.
    function UsernameExists( $conn, $username ) {
        $result;
        $sql   =  "SELECT * FROM users WHERE username = ?;";
        $stmt  =  mysqli_stmt_init( $conn );
        if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
            echo "SQL Statment Failed!";
        } else {
            mysqli_stmt_bind_param( $stmt, "s", $username );
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result($stmt); 

                if ($row = mysqli_fetch_assoc($result)) {
                    return $row;
                } else {
                    $result = false;
                    return $result;
                }
                mysqli_stmt_close( $stmt );
        }
    }

    // E-mal existing Error.
    function emailExists( $conn, $email ) {
        $result;
        $sql   =  "SELECT * FROM users WHERE email = ?;";
        $stmt  =  mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($stmt, $sql) ) {
            echo "SQL Statment Failed!";
        } else {
            mysqli_stmt_bind_param( $stmt, "s", $email );
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result( $stmt ); 
                if ( $row = mysqli_fetch_assoc( $result ) ) {
                    return $row;
                } else {
                    $result = false;
                    return $result;
                }
                mysqli_stmt_close ($stmt );
        }
    } 

    // Signup User Script.
    function  createUser( $conn, $fullname, $username, $email, $password, $cpassword, $city, $country, $zip ) {
        $sql   =  "INSERT INTO users (`fullname`, `username`,`email`, `pass`, `cpass`, `city`, `country`, `zipcode`) VALUES(?,?,?,?,?,?,?,?);";
        $stmt  =  mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($stmt, $sql) ) {
            header("Location: ../signup.php?error=failed");
            exit();
        } else {
            $hash  =  password_hash( $password, PASSWORD_DEFAULT );
            mysqli_stmt_bind_param( $stmt, "ssssssss", $fullname, $username, $email, $hash, $cpassword, $city, $country, $zip );
            mysqli_stmt_execute( $stmt );
            mysqli_stmt_close( $stmt );

            header("Location: ../signup.php?error=none");
            exit();
        }
    }




                                            // Login error handlers

    // This for Username/Email Login.
    function userExists( $conn, $username, $email ) {
        $result;
        $sql   =  "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt  =  mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
            echo "SQL Statment Failed!";
        } else {
            mysqli_stmt_bind_param( $stmt, "ss", $username, $email );
            mysqli_stmt_execute( $stmt );
            $result = mysqli_stmt_get_result( $stmt ); 
                if ( $row = mysqli_fetch_assoc( $result ) ) {
                    return $row;
                } else {
                    $result = false;
                    return $result;
                }
                mysqli_stmt_close( $stmt );
        }
    }

    // Empty fields error
    function emptyInputLogin( $username, $password ) {
        $result;
        if ( empty($username) || empty($password) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Logged in the user
    function loginUser( $conn, $username, $password ) {
        $usernameExists = userExists( $conn, $username, $username );
            if ( $usernameExists === false ) {
                header("Location: ../login.php?error=userdoesnotexists");
                exit();
            }
             else {
                $pwdHased  =  $usernameExists['pass'];
                $checkPwd  =  password_verify( $password, $pwdHased );
                    if ( $checkPwd === false ) {
                        header("Location: ../login.php?error=wronglogin");
                        exit();
                    } elseif ($checkPwd === true) {
                        session_start();
                        $_SESSION['userid']     =   $usernameExists['username'];
                        $_SESSION['useremail']  =   $usernameExists['email'];
                        $_SESSION['name']       =   $usernameExists['fullname'];
                        $_SESSION['sno']        =   $usernameExists['id'];
                        header("Location: ../index.php?error=none");
                        exit();
                    }
            }
    }



                                        // Upload Photo Error Handlers.

    // Invalid Photo Title Error.
    function invalidTitle( $title ) {
        $result;
        if ( !preg_match("/^[a-zA-Z]/", $title) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Invalid Photo Description Error.
    function invalidDescription( $desc ) {
        $result;
        if ( !preg_match("/^[a-zA-Z]/", $desc) ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }