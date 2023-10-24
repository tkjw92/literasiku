<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <link href="/assets/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    @if (session('errors'))
        <div id="error-notification" class="toastify-content hidden flex"> <i class="text-danger" data-lucide="alert-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ session('errors')->first() }}</div>
            </div>
        </div>
    @endif
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="#" class="-intro-x flex items-center pt-5">
                    <img class="w-6" src="/assets/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3"> Literasiku </span>
                </a>
                <div class="my-auto">
                    <img class="-intro-x w-1/2 -mt-16" src="/assets/dist/images/reading.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Membangun landasan teori
                        <br>
                        memperbanyak literasi
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Bangun argumenmu bersama literasiku</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <form action="" method="POST">
                        @csrf
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Register
                        </h2>
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username" name="username" required>
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="First Name" name="first_name" required>
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Last Name" name="last_name" required>
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Phone" name="phone" required>
                            <input type="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email" name="email" required>
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" name="password" required>
                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                            <a href="/login" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="/assets/dist/js/app.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (session('errors'))
        <script>
            Toastify({
                node: $("#error-notification").clone().removeClass("hidden")[0],
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
</body>

</html>
