<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Aplikasi Penjualan Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Total Penjualan -->
                <div class="bg-blue-100 dark:bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-cash-register mr-4 text-blue-500 dark:text-blue-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Total Penjualan') }}</h3>
                            <p class="mt-2">{{ __('Rp 10.000.000') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Jumlah Produk -->
                <div class="bg-green-100 dark:bg-green-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-pills mr-4 text-green-500 dark:text-green-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Jumlah Produk') }}</h3>
                            <p class="mt-2">{{ __('150 Produk') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Jumlah Pelanggan -->
                <div class="bg-yellow-100 dark:bg-yellow-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-users mr-4 text-yellow-500 dark:text-yellow-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Jumlah Pelanggan') }}</h3>
                            <p class="mt-2">{{ __('500 Pelanggan') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Pesanan Baru -->
                <div class="bg-red-100 dark:bg-red-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-shopping-cart mr-4 text-red-500 dark:text-red-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Pesanan Baru') }}</h3>
                            <p class="mt-2">{{ __('15 Pesanan') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Penjualan -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Grafik Penjualan Bulanan') }}</h3>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Jumlah Penjualan',
                        data: [120, 190, 30, 50, 20, 30],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
        });
    </script>
</x-app-layout>