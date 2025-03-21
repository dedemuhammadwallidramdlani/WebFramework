<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Transaksi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transaksi.update', $transaksi->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="obat_id" :value="__('Nama Obat')" />
                            <x-text-input id="obat_id" class="block mt-1 w-full" type="text" name="obat_id"
                                :value="$transaksi->obat_id ?? old('obat_id')" required autofocus autocomplete="obat_id" />
                            <x-input-error :messages="$errors->get('obat_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="jumlah" :value="__('Deskripsi')" />
                            <x-text-input id="jumlah" class="block mt-1 w-full" type="text" name="jumlah"
                                :value="$transaksi->jumlah ?? old('jumlah')" required autofocus autocomplete="jumlah" />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_transaksi" :value="__('Stok')" />
                            <x-text-input id="tanggal_transaksi" class="block mt-1 w-full" type="text" name="tanggal_transaksi"
                                :value="$transaksi->tanggal_transaksi ?? old('tanggal_transaksi')" required autofocus autocomplete="tanggal_transaksi" />
                            <x-input-error :messages="$errors->get('tanggal_transaksi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="total_harga" :value="__('Harga')" />
                            <x-text-input id="total_harga" class="block mt-1 w-full" type="text" name="total_harga"
                                :value="$transaksi->total_harga ?? old('total_harga')" required autofocus autocomplete="total_harga" />
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