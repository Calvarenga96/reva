<div class="bg-white p-4 rounded-md shadow-md h-full">

    <div wire:ignore class="mb-8">
        <h3 class="text-xl font-semibold mb-4">Meses con más agendamientos</h3>
        <div class="w-full h-64">
            <canvas id="myChart" class="w-full h-full"></canvas>
        </div>
    </div>

    @script
        <script>
            const ctx = document.getElementById('myChart');
            const bookings = $wire.bookings;
            const monthsName = $wire.months;

            const months = [];

            bookings?.forEach((booking) => {
                const month = new Date(booking.date).getMonth() + 1;
                months.push(month);
                return months;
            });

            // Function to count the frequency of each month and map to objects with month name
            const monthCounts = months.reduce((counts, month) => ({
                ...counts,
                [monthsName[month - 1]]: (counts[monthsName[month - 1]] || 0) + 1,
            }), {});

            // Function to create an array with all the months and their counts
            const sortedMonthCounts = monthsName.map((month) => ({
                month,
                count: monthCounts[month] || 0,
            }));

            const data = sortedMonthCounts.map((month) => month.count);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: monthsName,
                    datasets: [{
                        label: 'Agendados',
                        data,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                },
            });
        </script>
    @endscript

</div>
