<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Obat') }}
        </h2>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Obat</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="harga" id="harga"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div class="mb-4">
                    <label for="pabrik" class="block text-sm font-medium text-gray-700">Pabrik</label>
                    <input type="text" name="pabrik" id="pabrik"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>

                <div class="mb-4">
                    <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Obat</label>
                    <select name="jenis" id="jenis"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        <option value="">-- Pilih Jenis --</option>
                        @foreach ($jenis_obat as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="gambar" id="gambar"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
