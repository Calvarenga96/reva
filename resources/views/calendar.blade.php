<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reva | Calendario</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    @vite('resources/css/normalize.css')
    @vite('resources/css/app.css')
</head>

<body class="flex h-screen bg-gray-100">
    <livewire:sidebar-component />

    <div class="flex mt-5 gap-5 mx-10">
        <div class="w-1/2 mx-auto">
            <div id="calendar"></div>
        </div>

        <div class="w-1/2 mx-auto">
            <livewire:tournament-table-component :tournaments="$tournaments" />
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const events = {{ Illuminate\Support\JS::from($tournaments) }};

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events,
            });

            calendar.render();
        });
    </script>
</body>

</html>
