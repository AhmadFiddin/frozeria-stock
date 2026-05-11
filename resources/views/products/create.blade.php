@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')

    <!-- Header -->
    <div class="flex items-center gap-3 mb-5">

        <!-- Tombol Kembali -->
        <a href="{{ route('products.index') }}" class="border px-4 py-2 hover:bg-gray-100 text-sm">
            ← Kembali
        </a>

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Tambah Barang Baru
            </h1>
        </div>

    </div>

    <!-- Form -->
    <div class="bg-white border p-6">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- Upload Foto -->
            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Foto barang
                </label>

                <div class="border border-dashed border-gray-300 p-10 text-center">

                    <!-- Preview -->
                    <img id="preview-image" class="hidden mx-auto mb-4 h-32 object-cover">

                    <!-- Icon -->
                    <div id="upload-placeholder">

                        <div class="flex justify-center mb-3">

                            <div class="w-10 h-10 border flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                        </div>

                        <p class="text-gray-500 text-sm mb-2">
                            Klik untuk memilih foto, atau seret file ke sini
                        </p>

                        <p class="text-gray-400 text-xs mb-4">
                            Format: JPG, PNG — Maks. 2 MB
                        </p>

                    </div>

                    <!-- Input -->
                    <label class="inline-block border px-4 py-2 text-sm cursor-pointer hover:bg-gray-100">
                        Pilih Foto

                        <input type="file" name="photo" id="photo-input" class="hidden" accept="image/*">
                    </label>

                </div>

            </div>

            <!-- Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Nama Barang -->
                <div>

                    <label class="block mb-2 font-medium">
                        Nama barang *
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Kategori -->
                <div>

                    <label class="block mb-2 font-medium">
                        Kategori *
                    </label>

                    <select name="category_id" class="w-full border px-4 py-2 focus:outline-none" required>

                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <!-- Satuan -->
                <div>

                    <label class="block mb-2 font-medium">
                        Satuan *
                    </label>

                    <input type="text" name="unit" value="{{ old('unit') }}" placeholder="pcs / box / pack / kg / liter & sejenisnya"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Jumlah Stok -->
                <div>

                    <label class="block mb-2 font-medium">
                        Jumlah stok *
                    </label>

                    <input type="number" name="stock" value="{{ old('stock') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Minimum Stock -->
                <div>

                    <label class="block mb-2 font-medium">
                        Stok minimum *
                    </label>

                    <input type="number" name="minimum_stock" value="{{ old('minimum_stock') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Harga Jual -->
                <div>

                    <label class="block mb-2 font-medium">
                        Harga jual (Rp)
                    </label>

                    <input type="number" name="selling_price" value="{{ old('selling_price') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Harga Beli -->
                <div>

                    <label class="block mb-2 font-medium">
                        Harga beli (Rp)
                    </label>

                    <input type="number" name="purchase_price" value="{{ old('purchase_price') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Berat -->
                <div>

                    <label class="block mb-2 font-medium">
                        Berat / ukuran
                    </label>

                    <input type="text" name="weight" value="{{ old('weight') }}" placeholder="500 gram"
                        class="w-full border px-4 py-2 focus:outline-none">

                </div>

                <!-- Lokasi -->
                <div class="md:col-span-2">

                    <label class="block mb-2 font-medium">
                        Lokasi simpan
                    </label>

                    <input type="text" name="storage_location" value="{{ old('storage_location') }}"
                        placeholder="Rak A-3" class="w-full border px-4 py-2 focus:outline-none">

                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">

                    <label class="block mb-2 font-medium">
                        Deskripsi
                    </label>

                    <textarea name="description" rows="5" class="w-full border px-4 py-2 focus:outline-none">{{ old('description') }}</textarea>

                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end items-center gap-3 mt-8">

                <!-- Batal -->
                <a href="{{ route('products.index') }}" class="border px-5 py-2 hover:bg-gray-100">
                    Batal
                </a>

                <!-- Simpan -->
                <button type="submit" class="bg-lime-600 hover:bg-lime-700 text-white px-5 py-2">
                    Simpan Barang
                </button>

            </div>

        </form>

    </div>

    <!-- Preview Script -->
    <script>
        const photoInput = document.getElementById('photo-input');
        const previewImage = document.getElementById('preview-image');
        const placeholder = document.getElementById('upload-placeholder');

        photoInput.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function(event) {

                    previewImage.src = event.target.result;

                    previewImage.classList.remove('hidden');

                    placeholder.classList.add('hidden');
                };

                reader.readAsDataURL(file);
            }

        });
    </script>

@endsection
