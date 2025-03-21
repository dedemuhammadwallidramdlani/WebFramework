<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Transaksi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transaksi.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="obat_id" :value="__('obat_id')" />
                            <x-text-input id="obat_id" class="block mt-1 w-full" type="text" name="obat_id" :value="old('obat_id')" required autofocus autocomplete="nama_obat" />
                            <x-input-error :messages="$errors->get('obat_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="jumlah" :value="__('jumlah')" />
                            <x-text-input id="jumlah" class="block mt-1 w-full" type="text" name="jumlah" :value="old('jumlah')" required autofocus autocomplete="deskripsi" />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_transaksi" :value="__('tanggal_transaksi')" />
                            <x-text-input id="tanggal_transaksi" class="block mt-1 w-full" type="text" name="tanggal_transaksi" :value="old('tanggal_transaksi')" required autofocus autocomplete="stok" />
                            <x-input-error :messages="$errors->get('tanggal_transaksi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="total_harga" :value="__('total_harga')" />
                            <x-text-input id="total_harga" class="block mt-1 w-full" type="text" name="total_harga" :value="old('total_harga')" required autofocus autocomplete="harga" />
                            <x-input-error :messages="$errors->get('total_harga')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('transaksi.index')">
                                {{ __('Back') }}
                            </x-danger-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>