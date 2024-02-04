<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Estadísticas del Dashboard</h2>

        <div class="mb-8 md:flex md:flex-wrap w-full">

            <div class="flex flex-col w-full">
                <div class="w-full mb-4 ">
                    <livewire:venue-component />
                </div>

                <div class="md:w-full mb-4">
                    <livewire:booking-component />
                </div>
            </div>

            <div class="flex w-full gap-x-5">
                <div class="md:w-1/2 mb-4">
                    <livewire:booking-chart-component />
                    <livewire:booking-evolution-chart-component />
                </div>

                <div class="md:w-1/2 h-full">
                    <livewire:booking-by-venue-chart-component />
                </div>
            </div>
        </div>
    </div>
</div>
