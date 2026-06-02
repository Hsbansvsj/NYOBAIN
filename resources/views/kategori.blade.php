<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori: {{ $category->name }} | NyobainBlog</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="bg-gray-50">

    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">NyobainBlog</h1>
            <nav>
                <a href="{{ route('blog') }}" class="px-3">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 bg-black text-white py-2 rounded">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-3">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-10">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Kategori: {{ $category->name }}</h2>
            <p class="text-gray-500">Menampilkan {{ $posts->total() }} artikel dalam kategori ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 overflow-hidden">
                    <div class="p-6">
                        <span class="text-xs font-bold text-orange-600 uppercase">{{ $post->category->name }}</span>
                        <h3 class="text-xl font-bold mt-2 text-gray-900">{{ $post->title }}</h3>
                        <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                            {{ Str::limit($post->content, 120) }}
                        </p>
                        <a href="{{ route('artikel.show', $post->id) }}" class="inline-block mt-4 text-orange-700 font-semibold hover:underline">
                            Baca Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20">
                    <p class="text-gray-500 text-lg">Belum ada artikel untuk kategori ini.</p>
                    <a href="{{ route('blog') }}" class="text-blue-500 hover:underline">Kembali ke Home</a>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </main>

</body>
</html>