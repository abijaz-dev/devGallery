<?php include_once '_header.php'; ?>

<!-- Search form heading  -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Search For Photo You Like</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">The ultimate Search Engine... whould understand
                exactly what you mean and give back exactly what you want.</p>
        </div>
        <!-- Image search box -->
        <div class="container mb-10">
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
                                    class="w-full pl-4 mx-2 outline-none focus:outline-none bg-transparent"
                                    maxlength="100" required>
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
        <div class="container flex flex-wrap md:-m-2 -m-1">

            <?php
                    // Include the db file
                    include 'includes/dbh.inc.php';

                    if ( isset($_POST['submit-search']) ) {
                        $search  =  mysqli_real_escape_string($conn, $_POST['search']);

                        // Create Query to fetch searched image
                        $sql         =  "SELECT * FROM photo WHERE `title` LIKE '%$search%' OR `description` LIKE '%$search%';";
                        $result      =  mysqli_query($conn, $sql);
                        $queryResult =  mysqli_num_rows($result);
                        // Show the total result number
                        echo '<p class="container mt-8 ml-4 justify-center leading-relaxed item-center"><b>Search : </b>" '.$search.'", there are total '.$queryResult.' results!</p>';
                            if ( $queryResult > 0 ){
                                while ( $row  =  mysqli_fetch_assoc( $result ) ) {
                                        $id   =  $row['id'];
                                    echo '<div class="lg:w-1/3 sm:w-1/2 p-4 mt-6">
                                                <div class="flex relative mt-6 bg-auto">
                                                <a href="reviewphoto.php?photoid='.$id.'" class="href"><img alt="gallery" class="relative inset-0 w-full h-full object-cover object-center md:object-scale-down" src="img/'.$row['img_name'].'" style="width: auto; height: auto;  object-fit: cover; box-shadow: 0 0 2px;"></a>
                                                </div>
                                            </div>';
                                }
                            }
                            else {
                                // Display "Nothing Found" result
                                echo '<div class="max-w-screen-lg bg-red-400 shadow-2xl rounded-lg mx-auto text-center px-3 py-6 mt-12">
                                        <h2 class="text-3xl leading-9 font-bold tracking-tight text-white sm:text-4xl sm:leading-10">
                                            Search : "'.$search.'"
                                        </h2>
                                        <div class="mt-8 flex justify-center px-2">
                                                    <div class="inline-flex rounded-md bg-transparent shadow px-2">
                                                        <p class="text-white">No Result Found !</p>
                                                    </div>
                                        </div>
                                </div>';
                            }
                    } 
                ?>

        </div>
    </div>
</section>

<?php include_once '_footer.php'; ?>