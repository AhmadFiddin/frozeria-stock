@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')

<div class="bg-white border p-5">

    <!-- Title -->
    <h1 class="text-xl font-bold text-gray-800 mb-4">
        Panduan Penggunaan Sistem
    </h1>

    <!-- Cara Menambah Barang -->
    <div class="border p-4 mb-4">

        <h2 class="font-bold text-gray-800 mb-3">
            Cara menambah barang baru
        </h2>

        <div class="space-y-2 text-sm text-gray-700">

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    1
                </div>

                <p>
                    Buka halaman
                    <strong>Dashboard</strong>,
                    klik tombol
                    <strong>+ Tambah Barang</strong>
                    di kanan atas.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    2
                </div>

                <p>
                    Unggah foto barang (opsional),
                    lalu isi formulir nama,
                    kategori, satuan, jumlah stok,
                    harga, dan lainnya.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    3
                </div>

                <p>
                    Klik
                    <strong>Simpan Barang</strong>.
                    Barang akan muncul di daftar dashboard.
                </p>
            </div>

        </div>

    </div>

    <!-- Cara Update -->
    <div class="border p-4 mb-4">

        <h2 class="font-bold text-gray-800 mb-3">
            Cara update stok barang masuk
        </h2>

        <div class="space-y-2 text-sm text-gray-700">

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    1
                </div>

                <p>
                    Temukan barang di dashboard menggunakan
                    kolom pencarian atau filter kategori.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    2
                </div>

                <p>
                    Klik tombol
                    <strong>Edit</strong>
                    pada baris barang tersebut.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    3
                </div>

                <p>
                    Ubah nilai
                    <strong>Jumlah stok</strong>
                    sesuai kondisi saat ini,
                    lalu klik
                    <strong>Simpan Barang</strong>.
                </p>
            </div>

        </div>

    </div>

    <!-- Cara Kelola Kategori -->
    <div class="border p-4 mb-4">

        <h2 class="font-bold text-gray-800 mb-3">
            Cara mengelola kategori
        </h2>

        <div class="space-y-2 text-sm text-gray-700">

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    1
                </div>

                <p>
                    Buka halaman
                    <strong>Kategori</strong>
                    dari navigasi atas.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    2
                </div>

                <p>
                    Tambah, edit, atau hapus kategori
                    sesuai kebutuhan toko.
                </p>
            </div>

            <div class="flex items-start gap-2">
                <div class="border px-2 py-0.5 text-xs font-bold bg-gray-100">
                    3
                </div>

                <p>
                    Menghapus kategori tidak akan
                    menghapus barang —
                    barang akan menjadi tidak berkategori.
                </p>
            </div>

        </div>

    </div>

    <!-- Informasi -->
    <div class="border bg-gray-50 p-4 text-sm text-gray-700">

        <div class="flex items-start gap-3">

            <div class="text-gray-500 text-lg">
                ⓘ
            </div>

            <p>
                Satuan barang diisi bebas sesuai kebutuhan —
                misalnya:
                <strong>pcs</strong>,
                <strong>pack</strong>,
                <strong>box</strong>,
                <strong>kg</strong>,
                <strong>liter</strong>,
                dan lain-lain.
            </p>

        </div>

    </div>

    <!-- Biodata -->
    <div class="border mt-5 p-4">

        <h2 class="font-bold text-gray-800 mb-3">
            Informasi Pengembang
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">

            <div>
                <span class="font-semibold">Nama:</span>
                Ahmad Mimna'i Fiddin
            </div>

            <div>
                <span class="font-semibold">NIM:</span>
                2241760136
            </div>

            <div>
                <span class="font-semibold">Kelas:</span>
                SIB-4A
            </div>

            <div>
                <span class="font-semibold">Alamat:</span>
                Malang, Jawa Timur
            </div>

            <div>
                <span class="font-semibold">No. Telepon:</span>
                +62 896-7325-9761
            </div>

            <div>
                <span class="font-semibold">Email:</span>
                ahmadfiddin687@gmail.com
            </div>

        </div>

    </div>

</div>

@endsection