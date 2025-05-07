<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jenis Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Tambah Jenis</h2>
    
                    <form action="{{ route('jenis-obat.store') }}" method="POST" class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_jenis" class="block text-sm font-medium text-gray-700">Nama Jenis</label>
                            <input type="text" name="nama_jenis" id="nama_jenis" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>
    
                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                        </div>
    
                        <button type="submit" class="inline-block bg-blue-500 text-black px-3 py-1 rounded text-sm hover:bg-blue-600">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
