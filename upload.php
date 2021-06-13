<?php include_once '_header.php'; ?>

<!-- Upload form heading  -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Upload a Photograph</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Make you upload the file type, size, name, as it
                is the policy of DevGallery</p>
        </div>

        <!-- Include error file for validation  -->
        <?php include_once 'alerts/upload.php'; ?>

        <hr>
        <!-- Upload form starts here  -->
        <form action="includes/upload-img.inc.php" method="POST" enctype="multipart/form-data">

            <?php
                    if ( isset( $_SESSION['userid'] ) && ( $_SESSION['useremail'] ) == true ) {
                        echo '<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-password">
                                                Photo Title
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                                id="title" name="title" type="text" maxlength="50" placeholder="A Year to Remember.!" required>
                                            <p class="text-grey-dark text-xs italic mx-1">Type your photo title to
                                                improve your publicity [Keep it in under 50 characters and related to photo].</p>
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-full px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-description">
                                                Photo Description
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                                id="desc" name="desc" type="text" maxlength="135"
                                                placeholder="A Plenty of flowers blooming in winter season which will give charming sight.!"
                                                required>
                                            <p class="text-grey-dark text-xs italic mx-1">Write your photo
                                                description to describe about your picture [Write it under 130 characters and related to
                                                photo].
                                            </p>
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-1/2 px-3">
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-file">
                                                Select a Photo
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="file" name="file" type="file" required>
                                            <p class="text-red text-xs italic">Jpeg, Jpg, Png are
                                                allowed to upload.</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                                    <div class="p-2 w-full mt-5">
                                        <button type="submit" name="submit"
                                            class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Upload</button>
                                    </div>
                                </div>
                        </div>
                        </div>';
                    } else {
                        // Display Login first 
                        echo '<div class="max-w-screen-lg bg-red-700 shadow-2xl rounded-lg mx-auto text-center py-12 mt-4">
                                <h2 class="text-3xl leading-9 font-bold tracking-tight text-white sm:text-4xl sm:leading-10">
                                    You need to login for this purpose
                                </h2>
                                <div class="mt-8 flex justify-center">
                                    <div class="inline-flex rounded-md bg-white shadow">
                                        <a href="login.php" class="text-gray-700 font-bold py-2 px-6">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </div>';
                    }

            ?>
        </form>
</section>

<?php include_once '_footer.php'; ?>