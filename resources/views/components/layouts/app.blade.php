<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="/assets/css/animate.min.css" />
        <link rel="stylesheet" href="/assets/css/main.css" />
        <link rel="stylesheet" href="/assets/css/style.css" />
        <title>{{ $title ?? 'سایت آزمون' }}</title>
        @livewireStyles
        <!-- sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
        <!-- End of Sweet Alert -->
    </head>
    <body>

    <livewire:header/>
        {{ $slot }}
    <livewire:footer/>
        <script src="/assets/js/jquery-3.5.1.min.js"></script>
        <script src="/assets/js/popper.js"></script>
        <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="/assets/js/grid.js"></script>
    @livewireScripts

    <!-- sweetAlert -->

    <script>
        window.addEventListener('showAlert', function(event){
            Swal.fire({
                title:  event.detail[0].title,
                text:   event.detail[0].message,
                icon:   event.detail[0].icon
                })
            });
    </script>

    </body>
</html>
