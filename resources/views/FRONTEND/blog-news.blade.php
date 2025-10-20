@extends('FRONTEND.layout.frontend')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden h-[300px] flex items-center justify-center" style="background-size: 1910px 300px;">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-30"></div>
    
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-wide mt-10">
            ARTIKEL & TIPS SEPUTAR OLAHRAGA
        </h1>
        <div class="mt-6 max-w-xl mx-auto shadow-lg">
            <form method="GET" action="{{ route('frontend.blog-news') }}">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari artikel..."
                        class="w-full rounded-lg py-3 px-4 text-gray-800 text-base focus:outline-none focus:ring-4 focus:ring-blue-400 transition"
                    />
                    <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 sm:px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10 max-w-7xl">
    
    <aside class="md:col-span-1 space-y-6">
        <h2 class="text-lg font-bold text-gray-900 uppercase border-b-2 border-blue-500 pb-2">
            🔥 Trending Post
        </h2>
        <ol class="space-y-4">
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Strategi Hidrasi: Tips Minum Air yang Tepat Sebelum dan Sesudah Latihan
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-green-600 font-medium">KESEHATAN</span> - April 14, 2024
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Teknik Dasar Dribbling Futsal yang Wajib Dikuasai Pemula
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-blue-600 font-medium">OLAHRAGA</span> - May 18, 2024
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Pentingnya Asuransi Cedera untuk Atlet Amatir: Apa yang Harus Anda Tahu
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-yellow-600 font-medium">EDUKASI</span> - March 28, 2025
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Perbedaan Kunci antara Lapangan Mini Soccer dan Lapangan Sepak Bola Standar
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-blue-600 font-medium">OLAHRAGA</span> - July 29, 2024
                </p>
            </li>
            <li>
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Mengapa Pemanasan Dinamis Lebih Baik dari Statis Sebelum Berolahraga?
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-green-600 font-medium">KESEHATAN</span> - July 29, 2024
                </p>
            </li>
        </ol>
    </aside>

    <main class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($beritas as $berita)
        <a href="{{ route('frontend.blog-news-detail', $berita->id) }}" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="{{ $berita->foto ? asset('fotoberita/' . $berita->foto) : asset('assets/tenis.jpg') }}"
                        alt="{{ $berita->title }}"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 {{ $berita->category ? 'bg-' . strtolower($berita->category->name) . '-600' : 'bg-blue-700' }} text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">{{ $berita->category ? $berita->category->name : 'OLAHRAGA' }}</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        {{ $berita->title }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        {{ $berita->excerpt ?? Str::limit(strip_tags($berita->content), 100) }}
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh {{ $berita->name }}</span>
                        <time datetime="{{ $berita->created_at->format('Y-m-d') }}">{{ $berita->created_at->format('d M Y') }}</time>
                    </div>
                </div>
            </article>
        </a>
        @empty
        <p class="col-span-full text-center text-gray-500">Tidak ada artikel ditemukan.</p>
        @endforelse
    </main>
</section>

<section class="pb-10 md:pb-16">
    {{ $beritas->links() }}
</section>

@endsection