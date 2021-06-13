<?php include_once '_header.php'; ?>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col">


        <?php

            // Include the db file
            require_once 'includes/dbh.inc.php';

                if ( isset( $_SESSION['userid'] ) || ( $_SESSION['useremail'] ) === true ) {

                    $sql   =  "SELECT * FROM users WHERE username = ? OR email = ?;";
                    $stmt  =  mysqli_stmt_init( $conn );
                    if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
                        echo "SQL Statment Failed!";
                    } else {
                        mysqli_stmt_bind_param( $stmt, "ss", $_SESSION['userid'], $_SESSION['useremail'] );
                        mysqli_stmt_execute( $stmt );
                        $result = mysqli_stmt_get_result( $stmt ); 
                            if ($row = mysqli_fetch_assoc( $result )) {
                                echo '<div class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-600 mb-4">
                                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col items-center text-center justify-center">
                                                    <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">'.$row['fullname'].'
                                                    </h2>
                                                    <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                                    <p class="text-base">Profile Information.</p>
                                                </div>
                                            </div>
                                
                                            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                                                <div class="p-2 sm:w-1/2 w-full">
                                                <p><b>E-mail</b></p>
                                                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                            <path d="M22 4L12 14.01l-3-3"></path>
                                                        </svg>
                                                        <span class="title-font font-medium">'.$row['email'].'</span>
                                                    </div>
                                                </div>

                                                <div class="p-2 sm:w-1/2 w-full">
                                                <p><b>Username</b></p>
                                                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                            <path d="M22 4L12 14.01l-3-3"></path>
                                                        </svg>
                                                        <span class="title-font font-medium">'.$row['username'].'</span>
                                                        <span class="title-font font-medium"></span>
                                                    </div>
                                                </div>

                                                <div class="p-2 sm:w-1/2 w-full mt-3">
                                                <p><b>City</b></p>
                                                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                            <path d="M22 4L12 14.01l-3-3"></path>
                                                        </svg>
                                                        <span class="title-font font-medium">'.$row['city'].'</span>
                                                    </div>
                                                </div>

                                                <div class="p-2 sm:w-1/2 w-full mt-3">
                                                <p><b>Country</b></p>
                                                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                            <path d="M22 4L12 14.01l-3-3"></path>
                                                        </svg>
                                                        <span class="title-font font-medium">'.$row['country'].'</span>
                                                    </div>
                                                </div>

                                                <div class="p-2 sm:w-1/2 w-full mt-4">
                                                <p><b>Zip Code</b></p>
                                                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                            <path d="M22 4L12 14.01l-3-3"></path>
                                                        </svg>
                                                        <span class="title-font font-medium">'.$row['zipcode'].'</span>
                                                    </div>
                                                </div>
                                            </div>';
                            } else {
                                $result = false;
                                return $result;
                            }
                            mysqli_stmt_close($stmt);
                    }
                } else {
                    // Else redirect to home page
                    header('location: index.php');
                    exit;
                }
        ?>

    </div>
</section>

<?php include_once '_footer.php'; ?>