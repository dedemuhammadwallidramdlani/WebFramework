<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transaksi.store') }}">
                        @csrf
                        
                        <!-- Obat Dropdown -->
                        <div>
                            <x-input-label for="obat_id" :value="__('Nama Obat')" />
                            <select id="obat_id" name="obat_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Obat</option>
                                @foreach($dataobat as $obat)
                                    <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}"
                                        {{ old('obat_id') == $obat->id ? 'selected' : '' }}>
                                        {{ $obat->nama_obat }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('obat_id')" class="mt-2" />
                        </div>

                        <!-- Jumlah -->
                        <div class="mt-4">
                            <x-input-label for="jumlah" :value="__('Jumlah')" />
                            <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah" 
                                :value="old('jumlah')" required />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>

                        <!-- Tanggal Transaksi -->
                        <div class="mt-4">
                            <x-input-label for="tanggal_transaksi" :value="__('Tanggal Transaksi')" />
                            <x-text-input id="tanggal_transaksi" class="block mt-1 w-full" type="date" name="tanggal_transaksi" 
                                :value="old('tanggal_transaksi')" required />
                            <x-input-error :messages="$errors->get('tanggal_transaksi')" class="mt-2" />
                        </div>

                        <!-- Total Harga -->
                        <div class="mt-4">
                            <x-input-label for="total_harga" :value="__('Total Harga')" />
                            <x-text-input id="total_harga" class="block mt-1 w-full bg-gray-100 dark:bg-gray-700" 
                                type="number" name="total_harga" :value="old('total_harga')" readonly required />
                            <x-input-error :messages="$errors->get('total_harga')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('transaksi.index')">
                                {{ __('Back') }}
                            </x-danger-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk menghitung total harga otomatis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const obatSelect = document.getElementById('obat_id');
            const jumlahInput = document.getElementById('jumlah');
            const totalHargaInput = document.getElementById('total_harga');

            function calculateTotal() {
                const selectedOption = obatSelect.options[obatSelect.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                const jumlah = parseInt(jumlahInput.value) || 0;

                if (harga) {
                    totalHargaInput.value = harga * jumlah;
                } else {
                    totalHargaInput.value = 0;
                }
            }

            obatSelect.addEventListener('change', calculateTotal);
            jumlahInput.addEventListener('input', calculateTotal);
        });
    </script>
</x-app-layout>
