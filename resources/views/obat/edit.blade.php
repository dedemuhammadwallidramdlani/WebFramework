<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Obat') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('obat.update', $obat->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="nama_obat" :value="__('Nama Obat')" />
                            <x-text-input id="nama_obat" class="block mt-1 w-full" type="text" name="nama_obat"
                                :value="$obat->nama_obat ?? old('nama_obat')" required autofocus autocomplete="nama_obat" />
                            <x-input-error :messages="$errors->get('nama_obat')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi"
                                :value="$obat->deskripsi ?? old('deskripsi')" required autofocus autocomplete="deskripsi" />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stok" :value="__('Stok')" />
                            <x-text-input id="stok" class="block mt-1 w-full" type="text" name="stok"
                                :value="$obat->stok ?? old('stok')" required autofocus autocomplete="stok" />
                            <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="harga" :value="__('Harga')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                                :value="$obat->harga ?? old('harga')" required autofocus autocomplete="harga" />
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('obat.index')">
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