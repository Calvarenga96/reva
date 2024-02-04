<div class="w-full mt-4">

    <div class="bg-white p-4 rounded-md shadow-md">

        <h3 class="text-xl font-semibold mb-4">Evolución de Agendamientos</h3>

        <div class="flex justify-center">
            <canvas id="lineChart" width="400" height="200"></canvas>
        </div>

        @script
            <script>
                const ctx = document.getElementById('lineChart');

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: $wire.chartData?.labels,
                        datasets: [{
                            label: 'Agendamientos por Mes',
                            data: $wire.chartData?.data,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        @endscript
    </div>
</div>
