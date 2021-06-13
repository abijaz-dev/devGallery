<?php
    // Include the db file
    include_once 'dbh.inc.php';

    // Check if something Post or not
    if(isset($_POST['submit'])) {
        $title  =  mysqli_real_escape_string($conn, $_POST['title']);
        $desc   =  mysqli_real_escape_string($conn, $_POST['desc']);
        $sno    =  $_POST['sno'];

        // Image file upload
        $file          =  $_FILES['file'];
        $fileName      =  $file['name'];
        $fileType      =  $file['type'];
        $fileTempName  =  $file['tmp_name'];
        $fileError     =  $file['error'];
        $fileSize      =  $file['size'];

        // Include the functions file
        require_once 'functions.inc.php';

        // Check error by calling upload photo function
        if (invalidTitle($title) !== false) {
            header("Location: ../upload.php?error=invalidtitle");
            exit();
        }
        if (invalidDescription($desc) !== false) {
            header("Location: ../upload.php?error=invaliddescription");
            exit();
        }


        // Image upload logic
        $fileExt        =  explode( ".", $fileName );
        $fileActualExt  =  strtolower(end( $fileExt ));
        // Allow image extension
        $allowed        =  array("jpg", "jpeg", "png",);

        if ( in_array( $fileActualExt, $allowed ) ) {
            if ( $fileError === 0 ){
                if ( $fileSize < 5242880 ) {      // Keep remind that PHP execute only in Bytes not in KB
                    $ImageFullName    =  $title . "." . uniqid('', true) . "." . $fileActualExt;
                    $fileDestination  =  "../img/" . $ImageFullName;

                    // Create query to upload image
                    $sql   =  "SELECT * FROM photo;";
                    $stmt  =  mysqli_stmt_init($conn);
                    if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
                        echo "1st SQL Statement Failed!";
                    } else {
                        mysqli_stmt_execute( $stmt );
                        $result        =  mysqli_stmt_get_result( $stmt  );
                        $rowCount      =  mysqli_num_rows( $result );
                        $setImageOrder =  $rowCount + 1;

                        $sql   =  "INSERT INTO photo ( `title`, `description`, `img_name`, `img_order`, `user_id` ) VALUES( ?, ?, ?, ?, ? );";
                        $stmt  =  mysqli_stmt_init( $conn );
                        if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
                            echo "SQL Statement Failed!";
                        } else {
                            mysqli_stmt_bind_param( $stmt, "sssss", $title, $desc, $ImageFullName, $setImageOrder, $sno );
                            mysqli_stmt_execute( $stmt );

                            move_uploaded_file( $fileTempName, $fileDestination );
                            header("Location: ../index.php?upload=success");
                        }
                    }
                } else {
                    header("Location: ../upload.php?error=bigfilesize");
                    exit();
                }
            } else {
                header("Location: ../upload.php?error=error");
                exit();
            }
        } else {
            header("Location: ../upload.php?error=wrongfiletype");
            exit();
        }
    }