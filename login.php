<?php include_once '_header.php'; ?>

<!-- Login form heading  -->
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Login to your account</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Login to your account to actually access photo and
                upload photo.</p>
        </div>

        <!-- Include error file for login validation  -->
        <?php include_once 'alerts/login.php'; ?>

        <hr>
        <!-- Login from starts here  -->
        <form action="includes/handleLogin.inc.php" method="post">
            <!-- component -->
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-email-username">
                            Email / Username
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            id="email/username" name="email/username" type="text" maxlength="30"
                            placeholder="@johnsmith / example@domain.com">
                        <p class="text-red text-xs italic">Enter username or e-mail.</p>
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Password
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            id="login-pwd" name="login-pwd" type="password" maxlength="12" placeholder="*********">
                    </div>
                </div>
                <div class="p-2 w-full mt-3">
                    <button type="submit" name="login-submit"
                        class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">Login</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once '_footer.php'; ?>