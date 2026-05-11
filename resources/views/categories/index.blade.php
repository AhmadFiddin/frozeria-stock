@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-3">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Daftar Kategori
            </h1>
        </div>

    </div>

    <!-- Search -->
    <div class="bg-white border p-4 mb-4">

        <form method="GET" action="{{ route('categories.index') }}">

            <div class="flex flex-col md:flex-row gap-3">

                <!-- Search -->
                <div class="flex-1">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kategori..."
                        class="w-full border px-4 py-2 focus:outline-none">

                </div>

                <!-- Button -->
                <div>

                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-5 py-2">
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
                        Nama kategori
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Jumlah barang
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Dibuat
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50">

                        <!-- Nama -->
                        <td class="border px-4 py-3">
                            {{ $category->name }}
                        </td>

                        <!-- Jumlah Barang -->
                        <td class="border px-4 py-3">
                            {{ $category->products_count }} barang
                        </td>

                        <!-- Created -->
                        <td class="border px-4 py-3">
                            {{ $category->created_at->format('d M Y') }}
                        </td>

                        <!-- Aksi -->
                        <td class="border px-4 py-3">

                            <div class="flex items-center gap-2">

                                <!-- Edit -->
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="border border-blue-400 text-blue-600 px-3 py-1 text-sm hover:bg-blue-50">
                                    Edit
                                </a>

                                <!-- Hapus -->
                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" onclick="confirmDelete({{ $category->id }})"
                                        class="border border-red-400 text-red-600 px-3 py-1 text-sm hover:bg-red-50">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="border px-4 py-5 text-center text-gray-500">

                            Data kategori tidak ditemukan

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <!-- Footer -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-4 gap-3">

        <!-- Info -->
        <div class="text-sm text-gray-500">

            Menampilkan
            {{ $categories->firstItem() ?? 0 }}
            –
            {{ $categories->lastItem() ?? 0 }}
            dari
            {{ $categories->total() }}
            kategori

        </div>

        <!-- Pagination -->
        <div>
            {{ $categories->links() }}
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
