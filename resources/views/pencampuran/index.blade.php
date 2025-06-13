<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pencampuran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    
                    {{-- Tombol dan pencarian --}}
                    <div class="flex items-center justify-between py-5 mb-5">
                        <div class="md:mt-0 sm:flex-none w-72">
                            <form action="{{ route('pencampuran.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari..."
                                    class="w-full relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300" />
                            </form>
                        </div>
                        <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('pencampuran.create') }}"
                                class="relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                                Add New
                            </a>
                        </div>
                    </div>

                    {{-- Tabel --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-white dark:bg-gray-800">
                                <tr class="bg-white border-y dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-6 py-3 text-center">No</th>
                                    <th class="px-6 py-3 text-center">Obat</th>
                                    <th class="px-6 py-3 text-center">Bahan Baku</th>
                                    <th class="px-6 py-3 text-center">Jumlah Bahan Baku</th>
                                    <th class="px-6 py-3 text-center">Tanggal Pencampuran</th>
                                    <th class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($pencampuran->currentPage() - 1) * $pencampuran->perPage() + 1;
                                @endphp
                                @forelse($pencampuran as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                            {{ $i++ }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $item->obat->nama_obat ?? '-' }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $item->bahanbaku->nama_bahan ?? '-' }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $item->jumlah_bahanbaku }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $item->tanggal_pencampuran }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('pencampuran.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('pencampuran.edit', $item->id) }}"
                                                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                    class="bg-red-700 hover:bg-red-800 text-white font-medium rounded-lg text-xs px-5 py-2.5 mb-2">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Data Belum Tersedia!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3">
                            {{ $pencampuran->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Script konfirmasi hapus --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</x-app-layout>
