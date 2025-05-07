<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jenis Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('jenis-obat.create') }}" class="inline-block bg-green-500 text-black px-4 py-2 rounded mb-4 hover:bg-green-600">Tambah Jenis Obat</a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="py-2 px-4 border-b">No</th>
                                    <th class="py-2 px-4 border-b">Nama Jenis</th>
                                    <th class="py-2 px-4 border-b">Keterangan</th>
                                    <th class="py-2 px-4 border-b w-1/5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jenis_obats as $jenis)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4">{{ $jenis->nama_jenis }}</td>
                                        <td class="py-2 px-4">{{ $jenis->keterangan }}</td>
                                        <td class="py-2 px-4 space-x-2">
                                            <a href="{{ route('jenis-obat.show', $jenis->id) }}" class="inline-block bg-gray-700 text-black px-3 py-1 rounded text-sm hover:bg-gray-800">Detail</a>
                                            <a href="{{ route('jenis-obat.edit', $jenis->id) }}" class="inline-block bg-blue-500 text-black px-3 py-1 rounded text-sm hover:bg-blue-600">Edit</a>
                                            <form action="{{ route('jenis-obat.destroy', $jenis->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Apakah Anda Yakin?');" class="bg-red-500 text-black px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-red-500">Data Jenis Obat belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
