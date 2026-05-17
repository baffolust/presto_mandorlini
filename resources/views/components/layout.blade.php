<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title }} - FastMando</title>
</head>

<body class="background-image-filter">

    <x-navbar />

    <div class="container-fluid min-vh-100">

        <x-masthead title={{$title}}/>

        {{ $slot }}


    </div>



    <x-footer />

</body>

</html>
