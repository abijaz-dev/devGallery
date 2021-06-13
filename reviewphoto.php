    <style>
.line-height-username1 {
    line-height: 1.80rem;
}
    </style>

    <?php include_once '_header.php'; ?>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">

            <?php
                // Include the db file
                include_once 'includes/dbh.inc.php';

                // Get Photo ID
                $id  = mysqli_real_escape_string( $conn, $_GET['photoid'] );

                // Create query to display required image
                $sql   =  "SELECT * FROM photo WHERE id = $id;";
                $stmt  =  mysqli_stmt_init( $conn );
                if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
                    echo "SQL Statement Failed!";
                } else {
                    mysqli_stmt_execute( $stmt );
                    $result   =  mysqli_stmt_get_result( $stmt );
                    $numRows  =  mysqli_num_rows( $result );
                    if ( $numRows > 0 ) {
                        while ( $row  =  mysqli_fetch_assoc( $result ) ) {
                            $user_id  =  $row['user_id'];

                            $userSql  =  "SELECT * FROM users WHERE id = $user_id;";
                            if ( !mysqli_stmt_prepare( $stmt, $userSql ) ) {
                                echo "SQL Statement Failed!";
                            } else {
                                mysqli_stmt_execute( $stmt );
                                $result    =  mysqli_stmt_get_result( $stmt );
                                $userRow   =  mysqli_fetch_assoc( $result );
                                $posted_by =  $userRow['fullname'];
                            }

                            echo '<div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                                    <img class="object-cover object-center rounded" alt="photo" src="img/'.$row['img_name'].'" style="box-shadow: 0 0 2px;">
                                    </div>
                                    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-small text-gray-900">'.$row['title'].'
                                        <br class="hidden lg:inline-block">
                                        </h1>
                                        <p class="mb-8 leading-relaxed">'.$row['description'].'.</p>

                                        <p class="mb-1 leading-relaxed"><b>Posted by :</b></p>
                                        <div class="inline-block mb-20 rounded-full bg-gray-300 pr-3  h-8 line-height-username1">
                                            <img class="rounded-full float-left h-full" src="img/default-image.png"> <span class="ml-3">'.$posted_by.'</span>
                                        </div>

                                        <div class="flex justify-center ml-20 mt-9">
                                        <a href="img/'.$row['img_name'].'" download><button
                                        class="bg-grey-light hover:bg-grey text-grey-darkest font-bold ml-12 mt-9 py-2 px-3 rounded inline-flex items-center object-cover" style="box-shadow: 0 0 2px;">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Download Photo</span>
                                    </button></a>
                                        </div>
                                </div>';
                        }
                    }
                }
            ?>

        </div>
    </section>

    <?php include_once '_footer.php'; ?>