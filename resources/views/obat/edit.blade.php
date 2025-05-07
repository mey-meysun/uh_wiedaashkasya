<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Obat</label>
                            <input type="text" name="nama" id="nama" value="{{ $obat->nama }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga" id="harga" value="{{ $obat->harga }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="pabrik" class="block text-sm font-medium text-gray-700">Pabrik</label>
                            <input type="number" name="pabrik" id="pabrik" value="{{ $obat->pabrik }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Obat</label>
                            <select name="jenis" id="jenis" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                                <option value="">-- Pilih Jenis --</option>
                                @foreach ($jenisObats as $jenis)
                                    <option value="{{ $jenis->id }}" {{ $obat->jenis == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->nama_jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                            @if($obat->gambar)
                                <p class="text-sm mt-2">Gambar sekarang: <img src="{{ asset('storage/' . $obat->gambar) }}" alt="" class="w-24 h-24 mt-1"></p>
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
