<?php
    // Required Stuff
    $servername  =  "localhost";
    $username    =  "root";
    $password    =  "";
    $dbName      =  "dev_gallery";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbName);

    // Check if connection failed
    if ( !$conn ) {
        die( "Unable to connect to database" . mysqli_connect_error() );
    }
    return $conn;