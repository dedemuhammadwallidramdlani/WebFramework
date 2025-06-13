<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aplikasi Penjualan Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-yellow-100 dark:bg-yellow-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-users mr-4 text-yellow-500 dark:text-yellow-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Users</h3>
                            <p class="mt-2">{{ $users }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-blue-100 dark:bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-cash-register mr-4 text-blue-500 dark:text-blue-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Data Obat</h3>
                            <p class="mt-2">Rp 10.000.000</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-green-100 dark:bg-green-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-pills mr-4 text-green-500 dark:text-green-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Data Transaksi</h3>
                            <p class="mt-2">150 Produk</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-red-100 dark:bg-red-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-shopping-cart mr-4 text-red-500 dark:text-red-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Total Pendapatan</h3>
                            <p class="mt-2">15 Pesanan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Bar Chart -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        Grafik Penjualan Per Bulan
                    </h3>
                    <canvas id="barChart"></canvas>
                </div>

                <!-- Pie Chart -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                        Distribusi Kategori Obat
                    </h3>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <!-- Chart.js Script -->
    <script>
        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');

        // Bar Chart
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: [1200000, 1900000, 3000000, 2500000, 2200000, 3100000],
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: 'rgba(37, 99, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { labels: { color: '#fff' } }
                },
                scales: {
                    x: { ticks: { color: '#fff' } },
                    y: { ticks: { color: '#fff' }, beginAtZero: true }
                }
            }
        });

        // Pie Chart
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Antibiotik', 'Vitamin', 'Obat Batuk', 'Obat Luka'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(251, 191, 36, 0.7)',
                        'rgba(239, 68, 68, 0.7)'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#fff' }
                    }
                }
            }
        });
    </script>
</x-app-layout>
