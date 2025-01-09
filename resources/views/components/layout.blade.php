<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Jati Unggul | {{ $title }}</title>
</head>

<body>
    @if (!request()->is('login') && !request()->is('register'))
        <div class="w-full min-h-screen max-w-screen-xl mx-auto py-20 relative">
            <x-drawer></x-drawer>
            <x-navbar></x-navbar>
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
