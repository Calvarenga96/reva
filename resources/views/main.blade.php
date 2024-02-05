<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reva | Dashboard</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite('resources/css/normalize.css')
    @vite('resources/css/app.css')
</head>

<body class="flex bg-gray-100 h-full">
    <livewire:sidebar-component />

    <div class="w-full">
        <livewire:show-dashboard />
    </div>
</body>

</html>
