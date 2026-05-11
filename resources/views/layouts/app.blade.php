<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Frozeria Stock')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f5f5] text-sm text-gray-800">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-[#1e1e1e] border-b border-gray-700">
        <div class="max-w-[1200px] mx-auto px-4">

            <div class="flex items-center justify-between h-12">

                <!-- Left Menu -->
                <div class="flex items-center">

                    <!-- Logo -->
                    <div class="text-white font-bold mr-8">
                        <span class="text-white">Frozeria</span>
                        <span class="text-gray-300 font-normal">Stock</span>
                    </div>

                    <!-- Menu -->
                    <div class="flex items-center space-x-1">

                        <a href="{{ url('/') }}"
                            class="px-4 py-2 border text-sm
                           {{ request()->is('/')
                               ? 'bg-[#3a3a3a] border-gray-500 text-white'
                               : 'border-transparent text-gray-300 hover:bg-[#2d2d2d]' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('categories.index') }}"
                            class="px-4 py-2 border text-sm
                           {{ request()->is('categories*')
                               ? 'bg-[#3a3a3a] border-gray-500 text-white'
                               : 'border-transparent text-gray-300 hover:bg-[#2d2d2d]' }}">
                            Kategori
                        </a>

                        <a href="{{ url('/help') }}"
                            class="px-4 py-2 border text-sm
                           {{ request()->is('help')
                               ? 'bg-[#3a3a3a] border-gray-500 text-white'
                               : 'border-transparent text-gray-300 hover:bg-[#2d2d2d]' }}">
                            Bantuan
                        </a>

                    </div>
                </div>

                <!-- Right Button -->
                <div>

                    @if (request()->is('categories*'))
                        <a href="{{ route('categories.create') }}"
                            class="bg-[#2f2f2f] hover:bg-[#3a3a3a]
                  border border-gray-600
                  text-white
                  px-4 py-2
                  text-sm
                  font-medium">
                            + Tambah Kategori
                        </a>
                    @elseif(request()->is('help'))
                        <!-- Tidak tampil tombol di halaman bantuan -->
                    @else
                        <a href="{{ route('products.create') }}"
                            class="bg-[#2f2f2f] hover:bg-[#3a3a3a]
                  border border-gray-600
                  text-white
                  px-4 py-2
                  text-sm
                  font-medium">
                            + Tambah Barang
                        </a>
                    @endif

                </div>

            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="max-w-[1200px] mx-auto p-4">

        <!-- Alert Success -->
        @if (session('success'))
            <div class="mb-4 border border-green-300 bg-green-100 text-green-700 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Alert Error -->
        @if ($errors->any())
            <div class="mb-4 border border-red-300 bg-red-100 text-red-700 px-4 py-3">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

</body>

</html>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
