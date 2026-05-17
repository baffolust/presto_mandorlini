<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title }} - FastMando</title>
</head>

<body class="background-custom-primary">

    <x-navbar />

    <div class="container-fluid min-vh-100">

        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 pt-5 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="fw-light">{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </header>

        {{ $slot }}


    </div>



    <x-footer />

</body>

</html>
