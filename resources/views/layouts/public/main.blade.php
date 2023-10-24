@php
    if (!session()->has('theme')) {
        session(['theme' => 'light']);
    }
@endphp

<!DOCTYPE html>
<html lang="en" class="{{ session('theme') }}">
<!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <link href="/assets/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Literasiku</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="main">
    @if (session('errors'))
        <div id="error-notification" class="toastify-content hidden flex"> <i class="text-danger" data-lucide="alert-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ session('errors')->first() }}</div>
            </div>
        </div>
    @endif

    @if (session('notification'))
        <div id="notification" class="toastify-content hidden flex"> <i class="text-success" data-lucide="check-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">{{ session('notification') }}</div>
            </div>
        </div>
    @endif

    <!-- BEGIN: Mobile Menu -->
    @include('layouts.public.mobile')
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    @include('layouts.admin.navbar')
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            @include('layouts.public.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- END: Content -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="/assets/dist/js/app.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        const switchDarkBtn = document.getElementById('switch-dark');
        switchDarkBtn.addEventListener('click', () => {
            if (switchDarkBtn.checked) {
                document.querySelector('html').setAttribute('class', 'dark');
                fetch('/theme/dark');
            } else {
                document.querySelector('html').setAttribute('class', 'light');
                fetch('/theme/light');
            }
        })
    </script>
    @yield('script')

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
    @if (session('notification'))
        <script>
            Toastify({
                node: $("#notification").clone().removeClass("hidden")[0],
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    <!-- END: JS Assets-->
</body>

</html>
