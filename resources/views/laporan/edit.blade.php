<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Laporan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('laporan.update', $laporan->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul"
                                :value="$laporan->judul ?? old('judul')" required autofocus autocomplete="judul" />
                            <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="isi" :value="__('Isi')" />
                            <x-text-input id="isi" class="block mt-1 w-full" type="text" name="isi"
                                :value="$laporan->isi ?? old('isi')" required autofocus autocomplete="isi" />
                            <x-input-error :messages="$errors->get('isi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_laporan" :value="__('Tanggal Laporan')" />
                            <x-text-input id="tanggal_laporan" class="block mt-1 w-full" type="text" name="tanggal_laporan"
                                :value="$laporan->tanggal_laporan ?? old('tanggal_laporan')" required autofocus autocomplete="tanggal_laporan" />
                            <x-input-error :messages="$errors->get('tanggal_laporan')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('laporan.index')">
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