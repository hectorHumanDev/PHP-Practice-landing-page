<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-9 text-center text-2xl font-bold leading-5 tracking-tight text-black-900">Login</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/session" method="POST">
                <div>


                    <div>
                        <div class="flex items-center justify-between">


                        </div>
                        <div>
                            <label for="email" class="sr-only">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="mb-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="name@email.com">
                            <?php if (isset($errors['email'])): ?>
                                <p class="text-red-600 text-xs mt-2"><?= $errors['email'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>

                        <div>
                            <label for="password" class="sr-only">password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="mb-6 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="password">
                            <?php if (isset($errors['password'])): ?>
                                <p class="text-red-600 text-xs mt-2"><?= $errors['password'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                    </div>
            </form>


        </div>
    </div>

</main>

<?php require base_path('views/partials/footer.php') ?>