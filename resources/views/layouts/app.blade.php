<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WARR\'S BOOK')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body { background-color: #000000; color: #ededed; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }
    </style>
</head>
<body class="flex h-screen overflow-hidden font-sans antialiased">

    <aside class="w-64 bg-[#0a0a0a] border-r border-[#222] flex-col hidden md:flex">
        <div class="p-6 mb-4 flex items-center gap-3">
            <div class="w-8 h-8 bg-gradient-to-tr from-purple-600 to-indigo-500 rounded-lg flex items-center justify-center shadow-[0_0_15px_rgba(147,51,234,0.5)]">
                <span class="text-white font-bold text-lg leading-none">19</span>
            </div>
            <a href="{{ route('books.index') }}" class="text-2xl font-black tracking-tighter text-white">
                WARR'S BOOK
            </a>
        </div>
        
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('books.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('books') || Request::is('/') ? 'bg-[#1f1f1f] text-white' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1a]' }} transition-all font-semibold text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Library
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-[#1a1a1a] transition-all font-semibold text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                Koleksi Saya
            </a>

            <a href="/profile" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ Request::is('profile') ? 'bg-[#1f1f1f] text-white' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1a]' }} transition-all font-semibold text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                My Profile
            </a>
        </nav>

        <div class="p-4 border-t border-[#222]">
            <div class="flex items-center gap-3 hover:bg-[#1a1a1a] p-2 rounded-lg cursor-pointer transition-colors">
                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-purple-600 to-orange-500 shadow-lg"></div>
                <div class="text-sm">
                    <p class="font-bold text-white leading-tight">Arya A.</p>
                    <p class="text-[10px] text-gray-1000 uppercase tracking-widest">Pengguna</p>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto bg-[#000000]">
<div class="p-4 sm:p-6 lg:p-10 flex-1 w-full max-w-[1600px] mx-auto">
    @yield('content')
</div>
        <footer class="py-6 text-center border-t border-[#222] bg-[#000000]">
            <p class="text-xs text-gray-2000 font-medium">&copy; {{ date('Y') }} WARR'S BOOK. Hak Cipta Dilindungi</p>
        </footer>
    </main>
</body>
</html>