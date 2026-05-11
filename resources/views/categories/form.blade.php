@extends('layouts.app')

@section('title', isset($category) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')

    @php
        $isEdit = isset($category);
    @endphp

    <!-- Header -->
    <div class="flex items-center gap-3 mb-5">

        <!-- Tombol Kembali -->
        <a href="{{ route('categories.index') }}" class="border px-4 py-2 hover:bg-gray-100 text-sm">
            ← Kembali
        </a>

        <div>

            <h1 class="text-2xl font-bold text-gray-800">

                {{ $isEdit ? 'Edit Kategori' : 'Tambah Kategori' }}

            </h1>

        </div>

    </div>

    <!-- Form -->
    <div class="bg-white border p-6">

        <form
            action="{{ $isEdit ? route('categories.update', $category->id) : route('categories.store') }}"
            method="POST">

            @csrf

            @if ($isEdit)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-5">

                <!-- Nama -->
                <div>

                    <label class="block mb-2 font-medium">
                        Nama kategori *
                    </label>

                    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
                        class="w-full border px-4 py-2 focus:outline-none" required>

                </div>

                <!-- Deskripsi -->
                <div>

                    <label class="block mb-2 font-medium">
                        Deskripsi
                    </label>

                    <textarea name="description" rows="5" class="w-full border px-4 py-2 focus:outline-none">{{ old('description', $category->description ?? '') }}</textarea>

                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end items-center gap-3 mt-8">

                <!-- Batal -->
                <a href="{{ route('categories.index') }}" class="border px-5 py-2 hover:bg-gray-100">
                    Batal
                </a>

                <!-- Submit -->
                <button type="submit"
                    class="border border-green-500 text-green-600 px-5 py-2 hover:bg-green-100 transition">

                    {{ $isEdit ? 'Update Kategori' : 'Simpan Kategori' }}

                </button>

            </div>

        </form>

    </div>

@endsection
