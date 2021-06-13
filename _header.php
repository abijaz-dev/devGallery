<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevGallery - Photo Cloud</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

    <!-- Header Starts from here  -->
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a href="index.php" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                    class="bi bi-camera2 mt-1" viewBox="0 0 16 16">
                    <path d="M5 8c0-1.657 2.343-3 4-3V4a4 4 0 0 0-4 4z" />
                    <path
                        d="M12.318 3h2.015C15.253 3 16 3.746 16 4.667v6.666c0 .92-.746 1.667-1.667 1.667h-2.015A5.97 5.97 0 0 1 9 14a5.972 5.972 0 0 1-3.318-1H1.667C.747 13 0 12.254 0 11.333V4.667C0 3.747.746 3 1.667 3H2a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1h.682A5.97 5.97 0 0 1 9 2c1.227 0 2.367.368 3.318 1zM2 4.5a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0zM14 8A5 5 0 1 0 4 8a5 5 0 0 0 10 0z" />
                </svg>
                <span class="ml-3 text-xl">DevGallery</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">

                <?php
                    
                    // Initialize the session
                    session_start();

                    // Check if user login then display User Profile Dropdown
                    if ( isset( $_SESSION['userid'] ) && ( $_SESSION['useremail'] ) == true ) {
                        echo '<a href="upload.php" class="mr-5 hover:text-gray-900"><b>Upload Your Own</b></a>';
                        echo '<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                                <div class="flex justify-center">
                                    <div x-data="{ dropdownOpen: false }" class="relative">
                                        <button @click="dropdownOpen = !dropdownOpen"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">'.$_SESSION['userid'].'
                                            <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                    
                                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                                        </div>
                    
                                        <div x-show="dropdownOpen"
                                            class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                            <a href="profile.php"
                                                class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                                My Profile
                                            </a>
                                            <a href="logout.php"
                                                class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                                Sign Out
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                    } else {
                        // Display home menu
                        echo '<a href="upload.php" class="mr-5 hover:text-gray-900"><b>Upload Your Own</b></a>';
                        echo '<a href="login.php" class="mr-5 hover:text-gray-900"><b>Login</b></a>';
                        echo '<a href="signup.php" class="mr-5 hover:text-gray-900"><b>Signup</b></a>';
                    }
                ?>
            </nav>
        </div>
    </header>
    <!-- Header ends here  -->