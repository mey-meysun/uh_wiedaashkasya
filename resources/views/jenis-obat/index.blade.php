<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jenis Obat') }}
        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-800 py-3 sm:py-5">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5 class="flex items-center">
                            <div class="inline-block w-4 h-4 mr-2 bg-green-700 rounded-full"></div>
                            <span class="text-gray-500">Semua Jenis Obat:</span>
                            <span class="ml-1 dark:text-white">{{ $jenis_obats->total() }}</span>
                        </h5>
                    </div>

                    <div
                        class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <a href="{{ route('jenis-obat.create') }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah jenis obat baru
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama Jenis</th>
                                <th scope="col" class="px-4 py-3">Keterangan</th>
                                <th scope="col" class="px-4 py-3 w-1/5">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jenis_obats as $jenis)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="w-4 px-4 py-3">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $jenis->nama_jenis }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $jenis->keterangan }}
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('jenis-obat.edit', $jenis->id) }}"
                                            class="inline-block bg-blue-500 text-white px-5 py-1 mb-3 rounded text-sm hover:bg-blue-600">Edit</a>
                                        <form id="delete-form-{{ $jenis->id }}"
                                            action="{{ route('jenis-obat.destroy', $jenis->id) }}" method="POST"
                                            class="inline mx-auto px-3 d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                            <button onclick="confirmDelete({{ $jenis->id }})"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                                    </td>

                                </tr>
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="8" class="py-4 px-4 text-center text-red-500">Data Jenis Obat belum
                                tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                    aria-label="Table navigation">

                    {{-- Showing X to Y of Z --}}
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $jenis_obats->firstItem() }}</span>
                        to
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $jenis_obats->lastItem() }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $jenis_obats->total() }}</span>
                    </span>

                    {{-- Pagination links --}}
                    <div>
                        {{ $jenis_obats->links('vendor.pagination.tailwind') }}
                    </div>
                </nav>
            </div>
        </div>
    </section>
</x-app-layout>
