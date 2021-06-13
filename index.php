<?php include_once '_header.php'; ?>

<!-- Gallery starts from here  -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <!-- Bg indigo -->
        <div class="max-w-screen-lg bg-gray-800 shadow-2xl rounded-lg mx-auto text-center py-12 mt-4 mb-12">
            <div class="inline-flex rounded-md bg-transparent shadow-2xl py-3 px-2">
                <h2 class="text-3xl leading-9 font-bold tracking-tight text-white sm:text-4xl sm:leading-10">
                    Developer Photo Gallery
                </h2>
            </div>
            <div class="mt-8 flex justify-center">

                <p class="lg:w-2/3 mx-auto leading-relaxed text-white mb-1">Choose or pick the item which motivate
                    you
                    and
                    inspired you to achieve your programming dream goal, always beat your enemy in coding war.
                </p>

            </div>
            <hr>
        </div>

        <!-- Image search box -->
        <div class="container">
            <div class="px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
                <div class="box pt-6">
                    <div class="box-wrapper">
                        <form action="search.php" method="post">
                            <div
                                class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                                <svg class=" w-5 text-gray-600 h-5" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>

                                <input type="search" name="search" id="search" placeholder="search for images"
                                    maxlength="100"
                                    class="w-full pl-4 mx-2 outline-none focus:outline-none bg-transparent" required>
                                <button type="submit-search" name="submit-search" id="submit-search"
                                    class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-400 rounded text-base mt-4 md:mt-0">Search
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1"
                                        viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image dispaly Box -->
        <div class="flex flex-wrap md:-m-3 -m-1">

            <?php
                // Include the db file
                include_once 'includes/dbh.inc.php';

                // Create query to fetch photo from db
                $sql   =  "SELECT * FROM photo;";
                $stmt  =  mysqli_stmt_init($conn);
                if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {
                    echo "SQL Statement Failed!";
                } else {
                    mysqli_stmt_execute( $stmt );
                    $result   =  mysqli_stmt_get_result($stmt);
                    $numRows  =  mysqli_num_rows($result);
                    if ($numRows > 0) {
                        while ( $row  =  mysqli_fetch_assoc( $result ) ) {
                                $id  =  $row['id'];
                            echo '<div class="lg:w-1/4 sm:w-1/2 p-1 mt-12">
                            <div class="flex relative mt-12 bg-auto mx-2">
                            <a href="reviewphoto.php?photoid='.$id.'" class="href"><img alt="gallery" class="relative inset-0 w-full h-full object-cover object-center md:object-scale-down" src="img/'.$row['img_name'].'" style="width: 100%; height: 300px;  object-fit: cover; box-shadow: 0 0 1px;"></a>
                            </div>
                        </div>';
                        }
                    }
                }
            ?>
        </div>
    </div>
</section>
<!-- gallery ends here  -->

<?php include_once '_footer.php'; ?>