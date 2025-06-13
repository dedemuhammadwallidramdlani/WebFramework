<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Gudang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('gudang.update', $gudang->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Dropdown Nama Obat -->
                        <div class="mt-4">
                            <x-input-label for="obat_id" :value="__('Nama Obat')" />
                            <select id="obat_id" name="obat_id"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Obat</option>
                                @foreach($obats as $obat)
                                    <option value="{{ $obat->id }}" {{ $gudang->obat_id == $obat->id ? 'selected' : '' }}>
                                        {{ $obat->nama_obat }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('obat_id')" class="mt-2" />
                        </div>

                        <!-- Dropdown Nama Bahan Baku -->
                        <div class="mt-4">
                            <x-input-label for="bahanbaku_id" :value="__('Nama Bahan Baku')" />
                            <select id="bahanbaku_id" name="bahanbaku_id"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Bahan Baku</option>
                                @foreach($bahanbakus as $bahan)
                                    <option value="{{ $bahan->id }}" {{ $gudang->bahanbaku_id == $bahan->id ? 'selected' : '' }}>
                                        {{ $bahan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('bahanbaku_id')" class="mt-2" />
                        </div>

                        <!-- Jumlah -->
                        <div class="mt-4">
                            <x-input-label for="jumlah" :value="__('Jumlah')" />
                            <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah"
                                :value="old('jumlah', $gudang->jumlah)" required />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>

                        <!-- Tanggal Kadaluarsa -->
                        <div class="mt-4">
                            <x-input-label for="tanggal_kadaluarsa" :value="__('Tanggal Kadaluarsa')" />
                            <x-text-input id="tanggal_kadaluarsa" class="block mt-1 w-full" type="date" name="tanggal_kadaluarsa"
                                :value="old('tanggal_kadaluarsa', $gudang->tanggal_kadaluarsa)" required />
                            <x-input-error :messages="$errors->get('tanggal_kadaluarsa')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('gudang.index')">
                                {{ __('Back') }}
                            </x-danger-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
