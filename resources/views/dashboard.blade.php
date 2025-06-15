<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                {{-- Card for Users --}}
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 dark:from-yellow-700 dark:to-yellow-900 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 sm:rounded-lg h-full transform hover:scale-105">
                    <div class="p-6 text-white flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">Total Users</h3>
                            <p class="text-3xl font-extrabold">{{ $users }}</p>
                        </div>
                        <i class="fas fa-users text-4xl opacity-75"></i>
                    </div>
                </div>

                {{-- Card for Data Obat --}}
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 dark:from-blue-700 dark:to-blue-900 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 sm:rounded-lg h-full transform hover:scale-105">
                    <div class="p-6 text-white flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">Data Obat</h3>
                            <p class="text-3xl font-extrabold">{{ $dataobat }}</p>
                        </div>
                        <i class="fas fa-pills text-4xl opacity-75"></i>
                    </div>
                </div>

                {{-- Card for Data Transaksi --}}
                <div class="bg-gradient-to-br from-green-400 to-green-600 dark:from-green-700 dark:to-green-900 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 sm:rounded-lg h-full transform hover:scale-105">
                    <div class="p-6 text-white flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">Data Transaksi</h3>
                            <p class="text-3xl font-extrabold">{{ $transaksi }}</p>
                        </div>
                        <i class="fas fa-cash-register text-4xl opacity-75"></i>
                    </div>
                </div>

                {{-- Card for Total Pendapatan --}}
                <div class="bg-gradient-to-br from-red-400 to-red-600 dark:from-red-700 dark:to-red-900 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 sm:rounded-lg h-full transform hover:scale-105">
                    <div class="p-6 text-white flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">Total Pendapatan</h3>
                            {{-- Format pendapatan sebagai mata uang --}}
                            <p class="text-3xl font-extrabold">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                        </div>
                        <i class="fas fa-dollar-sign text-4xl opacity-75"></i>
                    </div>
                </div>
            </div>

            {{-- Charts Section --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Sales Chart --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                        Grafik Penjualan Per Bulan
                    </h3>
                    <div style="height: 300px;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                {{-- Category Distribution Chart --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                        Distribusi Kategori Obat
                    </h3>
                    <div style="height: 300px;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Font Awesome CSS version (preferred) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0xHDJjR/fH+Lz7T/sYp/T4f9f7L3N7H9O7e01234567890" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Function to determine text color based on dark mode
        function getTextColor() {
            return document.documentElement.classList.contains('dark') ? 'rgb(209 213 219)' : 'rgb(55 65 81)';
        }

        // Function to determine grid line color based on dark mode
        function getGridColor() {
            return document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
        }

        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');

        // Bar Chart
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'], // Lengkapi label bulan
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: [1200000, 1900000, 3000000, 2500000, 2200000, 3100000, 2800000, 3500000, 2900000, 3300000, 2700000, 3800000], // Sesuaikan data
                    backgroundColor: 'rgba(59, 130, 246, 0.8)', // Lebih terang
                    borderColor: 'rgba(37, 99, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: getTextColor() // Dynamic text color
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: getTextColor() }, // Dynamic text color
                        grid: { color: getGridColor() } // Dynamic grid color
                    },
                    y: {
                        ticks: {
                            color: getTextColor(), // Dynamic text color
                            callback: function(value, index, values) {
                                // Format angka menjadi mata uang Rupiah
                                return 'Rp' + value.toLocaleString('id-ID');
                            }
                        },
                        grid: { color: getGridColor() }, // Dynamic grid color
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Antibiotik', 'Vitamin', 'Obat Batuk', 'Obat Luka', 'Analgesik', 'Antiinflamasi'], // Tambah label
                datasets: [{
                    data: [35, 20, 15, 10, 10, 10], // Sesuaikan data
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.8)',   // Biru terang
                        'rgba(34, 197, 94, 0.8)',    // Hijau terang
                        'rgba(251, 191, 36, 0.8)',   // Kuning terang
                        'rgba(239, 68, 68, 0.8)',    // Merah terang
                        'rgba(168, 85, 247, 0.8)',   // Ungu terang
                        'rgba(249, 115, 22, 0.8)'    // Oranye terang
                    ],
                    borderColor: getGridColor(), // Match grid color for border
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: getTextColor() // Dynamic text color
                        }
                    }
                }
            }
        });

        // Optional: Re-render charts on dark mode toggle (if your dark mode is dynamic)
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            barChart.options.plugins.legend.labels.color = getTextColor();
            barChart.options.scales.x.ticks.color = getTextColor();
            barChart.options.scales.x.grid.color = getGridColor();
            barChart.options.scales.y.ticks.color = getTextColor();
            barChart.options.scales.y.grid.color = getGridColor();
            barChart.update();

            pieChart.options.plugins.legend.labels.color = getTextColor();
            pieChart.options.borderColor = getGridColor(); // Update border color
            pieChart.update();
        });
    </script>
</x-app-layout>