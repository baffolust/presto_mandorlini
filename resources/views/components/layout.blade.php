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

    <x-display-session-errors />
    <x-display-session-message />

    @if (!($hideMasthead ?? false))
        <x-masthead title="{{ $title }}" subtitle="{{$subtitle ?? null}}"/>
    @endif

    <div class="container-fluid px-0 overflow-x-hidden min-vh-100">



        {{ $slot }}


    </div>



    <x-footer />

</body>

</html>
