<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Gudang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    
                    {{-- Filter dan Tombol Tambah --}}
                    <div class="flex items-center justify-between py-5 mb-5">
                        <div class="md:mt-0 sm:flex-none w-72">
                            <form action="{{ route('gudang.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari..."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700" />
                            </form>
                        </div>
                        <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('gudang.create') }}"
                                class="inline-flex items-center px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700">
                                Add New
                            </a>
                        </div>
                    </div>

                    {{-- Tabel Gudang --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-white dark:bg-gray-800">
                                <tr class="border-t border-b dark:border-gray-700">
                                    <th class="px-6 py-3 text-center">No</th>
                                    <th class="px-6 py-3 text-center">Nama Obat</th>
                                    <th class="px-6 py-3 text-center">Nama Bahan Baku</th>
                                    <th class="px-6 py-3 text-center">Jumlah</th>
                                    <th class="px-6 py-3 text-center">Tanggal Kadaluarsa</th>
                                    <th class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($gudang->currentPage() - 1) * $gudang->perPage() + 1;
                                @endphp

                                @forelse ($gudang as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">{{ $i++ }}</td>
                                        <td class="px-6 py-2 text-center">{{ $item->obat->nama_obat ?? '-' }}</td>
                                        <td class="px-6 py-2 text-center">{{ $item->bahanBaku->nama ?? '-' }}</td>
                                        <td class="px-6 py-2 text-center">{{ $item->jumlah }}</td>
                                        <td class="px-6 py-2 text-center">{{ $item->tanggal_kadaluarsa }}</td>
                                        <td class="px-6 py-2 text-center">
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('gudang.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('gudang.edit', $item->id) }}"
                                                    class="text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                    class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2">Hapus</button>
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

                        {{-- Pagination --}}
                        <div class="p-3">
                            {{ $gudang->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(gudangId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + gudangId).submit();
                }
            });
        }
    </script>
</x-app-layout>
