<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-blue-100 dark:bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-home mr-4 text-blue-500 dark:text-blue-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Selamat Datang!') }}</h3>
                            <p class="mt-2">{{ __('Ini adalah dashboard Anda.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-100 dark:bg-green-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-users mr-4 text-green-500 dark:text-green-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Statistik Pengguna') }}</h3>
                            <div class="flex justify-between">
                                <div>
                                    <p class="font-semibold">{{ __('Pengguna Aktif') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-100 dark:bg-yellow-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-bell mr-4 text-yellow-500 dark:text-yellow-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Informasi Terbaru') }}</h3>
                                <p>{{ __('Informasi terbaru') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-red-100 dark:bg-red-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-chart-bar mr-4 text-red-500 dark:text-red-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Card 4') }}</h3>
                            <p>{{ __('Isi Card 4') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-100 dark:bg-purple-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-cog mr-4 text-purple-500 dark:text-purple-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Card 5') }}</h3>
                            <p>{{ __('Isi Card 5') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-indigo-100 dark:bg-indigo-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-file-alt mr-4 text-indigo-500 dark:text-indigo-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Card 6') }}</h3>
                            <p>{{ __('Isi Card 6') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-pink-100 dark:bg-pink-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-calendar-alt mr-4 text-pink-500 dark:text-pink-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Card 7') }}</h3>
                            <p>{{ __('Isi Card 7') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-teal-100 dark:bg-teal-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-life-ring mr-4 text-teal-500 dark:text-teal-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Card 8') }}</h3>
                            <p>{{ __('Isi Card 8') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Diagram Pengguna') }}</h3>
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('userChart').getContext('2d');
            const userChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Jumlah Pengguna Baru',
                        data: [12, 19, 3, 5, 2, 3],
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