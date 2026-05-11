@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')

    <!-- Header -->
    <div class="flex items-center gap-3 mb-5">

        <!-- Tombol Kembali -->
        <a href="{{ route('products.index') }}" class="border px-4 py-2 hover:bg-gray-100 text-sm">
            ← Kembali
        </a>

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Detail Barang
            </h1>
        </div>

    </div>

    <!-- Content -->
    <div class="bg-white border p-6">

        <!-- Foto -->
        <div class="mb-8">

            <label class="block mb-3 font-medium">
                Foto barang
            </label>

            <div class="border border-dashed border-gray-300 p-6">

                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                        class="h-64 object-cover mx-auto">
                @else
                    <div class="h-64 flex items-center justify-center text-gray-400">
                        Tidak ada foto
                    </div>
                @endif

            </div>

        </div>

        <!-- Detail Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Nama Barang -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Nama barang
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->name }}
                </div>

            </div>

            <!-- Kategori -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Kategori
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->category->name ?? '-' }}
                </div>

            </div>

            <!-- Satuan -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Satuan
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->unit }}
                </div>

            </div>

            <!-- Stok -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Jumlah stok
                </label>

                <div class="border px-4 py-2 bg-gray-50">

                    @if ($product->stock == 0)
                        <span class="text-red-600 font-semibold">
                            {{ $product->stock }}
                        </span>
                    @elseif($product->stock <= $product->minimum_stock)
                        <span class="text-yellow-600 font-semibold">
                            {{ $product->stock }}
                        </span>
                    @else
                        {{ $product->stock }}
                    @endif

                </div>

            </div>

            <!-- Minimum Stok -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Stok minimum
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->minimum_stock }}
                </div>

            </div>

            <!-- Harga Jual -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Harga jual
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                </div>

            </div>

            <!-- Harga Beli -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Harga beli
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    Rp {{ number_format($product->purchase_price, 0, ',', '.') }}
                </div>

            </div>

            <!-- Berat -->
            <div>

                <label class="block mb-2 font-medium text-gray-600">
                    Berat / ukuran
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->weight ?? '-' }}
                </div>

            </div>

            <!-- Lokasi -->
            <div class="md:col-span-2">

                <label class="block mb-2 font-medium text-gray-600">
                    Lokasi simpan
                </label>

                <div class="border px-4 py-2 bg-gray-50">
                    {{ $product->storage_location ?? '-' }}
                </div>

            </div>

            <!-- Deskripsi -->
            <div class="md:col-span-2">

                <label class="block mb-2 font-medium text-gray-600">
                    Deskripsi
                </label>

                <div class="border px-4 py-3 bg-gray-50 min-h-[120px]">
                    {{ $product->description ?? '-' }}
                </div>

            </div>

        </div>

        <!-- Footer -->
        <div class="flex justify-end items-center gap-3 mt-8">

            <!-- Hapus -->
            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button type="button" onclick="confirmDelete({{ $product->id }})"
                    class="border border-red-500 text-red-600 px-5 py-2 hover:bg-red-50">
                    Hapus
                </button>

            </form>

            <!-- Edit -->
            <button type="submit" class="border border-green-500 text-green-600 px-5 py-2 hover:bg-green-100 transition">
                Edit Barang
            </button>

        </div>

    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({

                title: 'Hapus Data?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',

                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',

                reverseButtons: true,

            }).then((result) => {

                if (result.isConfirmed) {

                    document
                        .getElementById('delete-form-' + id)
                        .submit();
                }

            });
        }
    </script>
@endsection
