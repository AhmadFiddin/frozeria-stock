@extends('layouts.app')

@section('title', 'Dashboard Produk')

@section('content')

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-5">

        <div class="bg-white border p-4">
            <p class="text-gray-500 text-sm mb-2">
                Total barang
            </p>

            <h2 class="text-4xl font-bold">
                {{ $totalProducts }}
            </h2>
        </div>

        <div class="bg-white border p-4">
            <p class="text-gray-500 text-sm mb-2">
                Total kategori
            </p>

            <h2 class="text-4xl font-bold">
                {{ $totalCategories }}
            </h2>
        </div>

        <div class="bg-white border p-4">
            <p class="text-gray-500 text-sm mb-2">
                Stok menipis
            </p>

            <h2 class="text-4xl font-bold text-yellow-600">
                {{ $lowStock }}
            </h2>
        </div>

        <div class="bg-white border p-4">
            <p class="text-gray-500 text-sm mb-2">
                Stok habis
            </p>

            <h2 class="text-4xl font-bold text-red-600">
                {{ $outStock }}
            </h2>
        </div>

    </div>

    <!-- Search & Filter -->
    <div class="bg-white border p-4 mb-4">

        <form method="GET" action="{{ route('products.index') }}">

            <div class="flex flex-col md:flex-row gap-3">

                <!-- Search -->
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..."
                        class="w-full border px-4 py-2 focus:outline-none">
                </div>

                <!-- Filter -->
                <div class="w-full md:w-64">
                    <select name="category" onchange="this.form.submit()"
                        class="w-full border px-4 py-2 focus:outline-none">
                        <option value="">
                            Semua kategori
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Button -->
                <div>
                    <button type="submit" class="bg-slate-800 text-white px-5 py-2 hover:bg-slate-700">
                        Cari
                    </button>
                </div>

            </div>

        </form>

    </div>

    <!-- Table -->
    <div class="bg-white border overflow-x-auto">

        <table class="w-full border-collapse">

            <thead class="bg-gray-100">
                <tr>

                    <th class="border px-4 py-3 text-left">
                        Nama barang
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Kategori
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Stok
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Satuan
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Harga jual
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Aksi
                    </th>

                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">

                        <!-- Nama -->
                        <td class="border px-4 py-3">
                            {{ $product->name }}
                        </td>

                        <!-- Kategori -->
                        <td class="border px-4 py-3">
                            <span class="border bg-gray-100 px-2 py-1 text-xs">
                                {{ $product->category->name ?? '-' }}
                            </span>
                        </td>

                        <!-- Stok -->
                        <td class="border px-4 py-3">

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

                        </td>

                        <!-- Satuan -->
                        <td class="border px-4 py-3">
                            {{ $product->unit }}
                        </td>

                        <!-- Harga -->
                        <td class="border px-4 py-3">
                            Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                        </td>

                        <!-- Aksi -->
                        <td class="border px-4 py-3">

                            <div class="flex items-center gap-2">

                                <!-- Detail -->
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="border px-3 py-1 text-sm hover:bg-gray-100">
                                    Detail
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="border border-blue-400 text-blue-600 px-3 py-1 text-sm hover:bg-blue-50">
                                    Edit
                                </a>

                                <!-- Hapus -->
                                <form id="delete-form-{{ $product->id }}"
                                    action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" onclick="confirmDelete({{ $product->id }})"
                                        class="border border-red-400 text-red-600 px-3 py-1 text-sm hover:bg-red-50">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="6" class="border px-4 py-5 text-center text-gray-500">
                            Data barang tidak ditemukan
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <!-- Footer Table -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-4 gap-3">

        <!-- Info -->
        <div class="text-sm text-gray-500">
            Menampilkan
            {{ $products->firstItem() ?? 0 }}
            –
            {{ $products->lastItem() ?? 0 }}
            dari
            {{ $products->total() }}
            barang
        </div>

        <!-- Pagination -->
        <div>
            {{ $products->links() }}
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
