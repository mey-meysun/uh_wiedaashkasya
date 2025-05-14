<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Obat') }}
        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-800  py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5 class="flex items-center">
                            <div class="inline-block w-4 h-4 mr-2 bg-blue-700 rounded-full"></div>
                            <span class="text-gray-500">Semua Obat:</span>
                            <span class="ml-1 dark:text-white">{{ $obat->total() }}</span>
                        </h5>
                    </div>

                    <div
                        class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <a href="{{ route('obat.create') }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah obat baru
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Gambar</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Jenis</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Pabrik</th>
                                <th scope="col" class="px-4 py-3 w-1/5">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obat as $item)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="w-13 px-1 py-3">
                                        <img src="{{ asset('/storage/' . $item->gambar) }}" style="width: 150px">
                                    </td>

                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->nama }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            {{ $item->jenisObat->nama_jenis ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5 mr-2 text-gray-400"
                                                aria-hidden="true">
                                                <path
                                                    d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                            </svg>
                                            {{ $item->harga }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->pabrik }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('obat.edit', $item->id) }}"
                                            class="inline-block bg-blue-500 text-white px-3 mx-auto py-1 mb-3 rounded text-sm hover:bg-blue-600">Edit</a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('obat.destroy', $item->id) }}" method="POST"
                                            class="inline mx-auto px-3 d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                            <button onclick="confirmDelete({{ $item->id }})"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                                    </td>

                                </tr>
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="8" class="py-4 px-4 text-center text-red-500">Data Obat belum tersedia.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                    aria-label="Table navigation">

                    {{-- Showing X to Y of Z --}}
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $obat->firstItem() }}</span>
                        to
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $obat->lastItem() }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $obat->total() }}</span>
                    </span>

                    {{-- Pagination links --}}
                    <div>
                        {{ $obat->links('vendor.pagination.tailwind') }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-app-layout>
