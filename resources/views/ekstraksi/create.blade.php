<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Ekstraksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('ekstraksi.store') }}">
                        @csrf

                        <!-- Dropdown Bahan Baku -->
                        <div>
                            <x-input-label for="bahanbaku_id" :value="__('Bahan Baku')" />
                            <select id="bahanbaku_id" name="bahanbaku_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                                <option value="">-- Pilih Bahan Baku --</option>
                                @foreach ($bahanbakus as $bahanbaku)
                                    <option value="{{ $bahanbaku->id }}" {{ old('bahanbaku_id') == $bahanbaku->id ? 'selected' : '' }}>
                                        {{ $bahanbaku->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('bahanbaku_id')" class="mt-2" />
                        </div>

                        <!-- Hasil Ekstraksi -->
                        <div class="mt-4">
                            <x-input-label for="hasil_ekstraksi" :value="__('Hasil Ekstraksi')" />
                            <x-text-input id="hasil_ekstraksi" class="block mt-1 w-full" type="number" name="hasil_ekstraksi" :value="old('hasil_ekstraksi')" step="0.01" required />
                            <x-input-error :messages="$errors->get('hasil_ekstraksi')" class="mt-2" />
                        </div>

                        <!-- Satuan -->
                        <div class="mt-4">
                            <x-input-label for="satuan_hasil" :value="__('Satuan Hasil')" />
                            <x-text-input id="satuan_hasil" class="block mt-1 w-full" type="text" name="satuan_hasil" :value="old('satuan_hasil')" required />
                            <x-input-error :messages="$errors->get('satuan_hasil')" class="mt-2" />
                        </div>

                        <!-- Tanggal -->
                        <div class="mt-4">
                            <x-input-label for="tanggal_ekstraksi" :value="__('Tanggal Ekstraksi')" />
                            <x-text-input id="tanggal_ekstraksi" class="block mt-1 w-full" type="date" name="tanggal_ekstraksi" :value="old('tanggal_ekstraksi')" required />
                            <x-input-error :messages="$errors->get('tanggal_ekstraksi')" class="mt-2" />
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end mt-6">
                            <x-danger-link-button class="ms-4" :href="route('ekstraksi.index')">
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
