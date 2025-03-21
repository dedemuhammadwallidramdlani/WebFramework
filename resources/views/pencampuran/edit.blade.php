<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Pencampuran') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('pencampuran.update', $pencampuran->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="obat_id" :value="__('Nama Obat')" />
                            <x-text-input id="obat_id" class="block mt-1 w-full" type="text" name="obat_id"
                                :value="$pencampuran->obat_id ?? old('obat_id')" required autofocus autocomplete="obat_id" />
                            <x-input-error :messages="$errors->get('obat_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="bahanbaku_id" :value="__('Nama Bahan baku')" />
                            <x-text-input id="bahanbaku_id" class="block mt-1 w-full" type="text" name="bahanbaku_id"
                                :value="$pencampuran->bahanbaku_id ?? old('bahanbaku_id')" required autofocus autocomplete="bahanbaku_id" />
                            <x-input-error :messages="$errors->get('bahanbaku_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="jumlah_bahanbaku" :value="__('Stok')" />
                            <x-text-input id="jumlah_bahanbaku" class="block mt-1 w-full" type="text" name="jumlah_bahanbaku"
                                :value="$pencampuran->jumlah_bahanbaku ?? old('jumlah_bahanbaku')" required autofocus autocomplete="jumlah_bahanbaku" />
                            <x-input-error :messages="$errors->get('jumlah_bahanbaku')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_pencampuran" :value="__('Tanggal pencampuran')" />
                            <x-text-input id="tanggal_pencampuran" class="block mt-1 w-full" type="text" name="tanggal_pencampuran"
                                :value="$pencampuran->tanggal_pencampuran ?? old('tanggal_pencampuran')" required autofocus autocomplete="tanggal_pencampuran" />
                            <x-input-error :messages="$errors->get('tanggal_pencampuran')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('pencampuran.index')">
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