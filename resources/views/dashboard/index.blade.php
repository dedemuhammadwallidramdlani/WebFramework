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

                <div class="bg-yellow-100 dark:bg-yellow-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-users mr-4 text-yellow-500 dark:text-yellow-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Users') }}</h3>
                            <p class="mt-2">{{ $users }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-100 dark:bg-blue-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-cash-register mr-4 text-blue-500 dark:text-blue-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Data Obat') }}</h3>
                            <p class="mt-2">{{ __('Rp 10.000.000') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Jumlah Produk -->
                <div class="bg-green-100 dark:bg-green-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-pills mr-4 text-green-500 dark:text-green-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Data Transaksi') }}</h3>
                            <p class="mt-2">{{ __('150 Produk') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Jumlah Pelanggan -->
                

                <!-- Card 4: Pesanan Baru -->
                <div class="bg-red-100 dark:bg-red-900 overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center">
                        <i class="fas fa-shopping-cart mr-4 text-red-500 dark:text-red-300 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Total Pendapatan') }}</h3>
                            <p class="mt-2">{{ __('15 Pesanan') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    
</x-app-layout>