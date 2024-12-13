<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Koleksi Produk Affiliator</title>
</head>

<body class="bg-gray-100">

    <!-- Hero Section -->
    <section class="bg-blue-500 text-white sm:h-80 h-auto flex items-center justify-center py-12">
        <div class="text-center px-4 sm:px-8">
            <h1 class="text-3xl sm:text-5xl font-bold">{{ $content->judul }}</h1>
            <p class="mt-4 text-lg sm:text-xl">{{ $content->keterangan }}</p>
            <a href="#produk"
                class="mt-6 inline-block bg-white text-blue-500 px-6 py-3 rounded-full font-semibold transition duration-300 hover:bg-blue-100 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                {{ $content->textButton }}
            </a>
        </div>
    </section>

    <!-- Sosial Media Section -->
    <section class="py-10">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">{{ $socialMedia->judul }}</h2>
            <div
                class="flex justify-center space-x-4 shadow-lg p-4 rounded-lg bg-white hover:scale-105 transition duration-300 transform">
                @foreach ($sosmed as $s)
                    <a href="{{ $s->tujuan }}" class="text-blue-600 hover:underline"
                        style="color: {{ $s->warnaText }}">{{ $s->nama }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="bg-yellow-300 py-10 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">{{ $promo->judul }}</h2>
            <p class="text-lg mb-7">{{ $promo->keterangan }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($promoCard as $pc)
                    <!-- Card 1 -->
                    <div
                        class="relative bg-white p-4 rounded-lg shadow hover:shadow-lg hover:scale-105 transition duration-300 transform hover:bg-gray-50">
                        <img src="{{ Storage::url($pc->image) }}" alt="{{ $pc->judul }}"
                            class="w-full h-48 object-cover rounded-t-lg">
                        <h3 class="text-xl font-semibold mt-2 mb-4">{{ $pc->judul }}</h3>
                        <span
                            class="line-through text-xs text-gray-500"><b>{{ number_format($pc->hargaCoret, 0, ',', '.') }}</b></span>
                        <span
                            class="block text-lg text-red-500 font-bold">{{ number_format($pc->harga, 0, ',', '.') }}</span>
                        <span class="text-xs text-gray-500"><b>{{ $pc->slot }} Tersisa</b></span><br>
                        <a href="{{ $pc->link }}" target="_blank"
                            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Beli Sekarang
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Produk Section -->
    <section id="produk" class="py-10 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6">{{ $produk->judul }}</h2>
            <div class="mb-4">
                <form method="GET" action="{{ route('index') }}#produk" class="mb-4">
                    <input type="text" name="search" placeholder="Cari produk berdasarkan nama dan n    omor"
                        value="{{ request()->input('search') }}"
                        class="w-full md:w-1/3 mx-auto p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded">Cari</button>
                </form>
            </div>
            <div id="produk" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @if ($search && $produkCard->isEmpty())
                    <!-- Pesan ketika tidak ada produk ditemukan -->
                    <p class="text-red-500">Produk dengan nama atau nomor "{{ $search }}" tidak ditemukan.</p>
                @elseif ($produkCard->isNotEmpty())
                    @foreach ($produkCard as $produk)
                        <!-- Card 1 -->
                        <div
                            class="relative bg-white p-4 rounded-lg shadow hover:shadow-lg hover:scale-105 transition duration-300 transform hover:bg-gray-50">
                            <span
                                class="absolute top-2 right-2 bg-blue-500 text-white text-sm px-2 py-1 rounded">{{ $produk->nomor }}</span>
                            <img src="img/camera.png" alt="Produk 1" class="w-full h-48 object-cover rounded-t-lg">
                            <h3 class="text-xl font-semibold mt-4 mb-2">{{ $produk->judul }}</h3>
                            <span
                                class="line-through text-xs text-gray-500"><b>{{ number_format($produk->hargaCoret, 0, ',', '.') }}</b></span>
                            <span
                                class="block text-red-500 font-bold">{{ number_format($produk->harga, 0, ',', '.') }}</span>
                            <span class="text-xs text-gray-500"><b>{{ $produk->terjual }} Terjual</b></span><br>
                            <a href="{{ $produk->link }}"
                                class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Cek Sekarang
                            </a>
                        </div>
                    @endforeach
                @else
                    <!-- Pesan default saat halaman pertama kali diakses -->
                    <p>Silakan cari produk menggunakan kolom pencarian di atas.</p>
                @endif
            </div>
        </div>
    </section>

    <footer class="p-6">
        <p class="text-center text-gray-500"><a href="#">Created with Love By @manzz</a></p>
    </footer>

</body>

</html>
