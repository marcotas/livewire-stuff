@props(['title' => config('app.name', 'Laravel'), 'bgColor' => 'bg-gray-100'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
        content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles()

    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body>
    <div class="h-screen overflow-auto w-full {{ $bgColor }}">{{ $slot }}</div>
    @livewireScripts()
    @stack('scripts')
</body>

</html>
