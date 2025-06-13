<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Pencampuran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('pencampuran.store') }}">
                    @csrf

                    <!-- Obat -->
<div class="mb-4">
    <label for="obat_id" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Obat</label>
    <select name="obat_id" id="obat_id" required
        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        <option value="">-- Pilih Obat --</option>
        @foreach ($obat as $o)
            <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
        @endforeach
    </select>
</div>

<!-- Bahan Baku -->
<div class="mb-4">
    <label for="bahanbaku_id" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Bahan Baku</label>
    <select name="bahanbaku_id" id="bahanbaku_id" required
        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        <option value="">-- Pilih Bahan Baku --</option>
        @foreach ($bahanbaku as $b)
            <option value="{{ $b->id }}">{{ $b->nama }}</option>
        @endforeach
    </select>
</div>

                    {{-- Jumlah Bahan Baku --}}
                    <div class="mb-4">
                        <label for="jumlah_bahanbaku" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Bahan Baku</label>
                        <input type="number" name="jumlah_bahanbaku" id="jumlah_bahanbaku" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-4">
                        <label for="tanggal_pencampuran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Pencampuran</label>
                        <input type="date" name="tanggal_pencampuran" id="tanggal_pencampuran" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end">
                        <a href="{{ route('pencampuran.index') }}"
                            class="inline-flex items-center px-4 py-2 mr-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-md">Batal</a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
