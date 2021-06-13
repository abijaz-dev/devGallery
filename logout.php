<?php
    session_start();
    // Remove the session
    session_unset();
    session_destroy();
    // Redirect to home page
    header("Location: index.php?loggedout");
    exit();