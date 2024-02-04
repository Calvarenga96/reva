<div class="w-full bg-white p-4 rounded-md shadow-md">

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Cantidad de agendamientos</h2>
        <div class="w-full">
            <canvas id="pieChart" class="w-full"></canvas>
        </div>
    </div>

    @script
        <script>
            const ctx = document.getElementById('pieChart');
            const venuesData = $wire.venuesData;

            // To delete the locals with value 0
            Object.keys(venuesData).forEach((venue) => {
                if (venuesData[venue] === 0) {
                    delete venuesData[venue];
                }
            });

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(venuesData),
                    datasets: [{
                        label: 'Cantidad de agendamientos',
                        data: Object.values(venuesData),
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });
        </script>
    @endscript
</div>
