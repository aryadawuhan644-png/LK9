@extends('layouts.app')

@section('title', 'Library - WARR\'S BOOK')

@section('content')
<div class="w-full max-w-[1400px] mx-auto p-4 sm:p-6 lg:p-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-10">
        <div>
            <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tight">Koleksi Digital</h1>
            <p class="text-gray-400 text-lg mt-2 font-medium">Jelajahi dan posting buku kamu disini guyss</p>
        </div>
        <a href="{{ route('books.create') }}" class="bg-white text-black hover:bg-gray-200 font-bold py-3.5 px-8 rounded-full text-base transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)] flex items-center gap-2">
            <span>+</span> Tambah Buku
        </a>
    </div>

    @if(session('success'))
        <div class="bg-purple-900/20 border-l-4 border-purple-500 text-purple-200 p-4 mb-8 rounded-r-lg font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#0f0f0f] border border-[#222] rounded-3xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-base text-gray-300">
                <thead class="bg-[#0a0a0a] text-xs uppercase text-gray-1000 tracking-widest border-b border-[#222]">
                    <tr>
                        <th class="px-8 py-6">Cover & Judul</th>
                        <th class="px-8 py-6 hidden sm:table-cell">Kategori</th>
                        <th class="px-8 py-6">Tahun</th>
                        <th class="px-8 py-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#222]">
                    @forelse($books as $book)
                        <tr class="hover:bg-[#151515] transition-colors group">
                            <td class="px-8 py-6 flex items-center gap-6">
                                <img src="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}" 
                                     class="w-16 h-20 object-cover rounded-lg border border-[#333] shadow-lg" 
                                     onerror="this.style.display='none'">
                                <div>
                                    <div class="text-xl font-bold text-white group-hover:text-purple-400">{{ $book->title }}</div>
                                    <div class="text-sm text-gray-500 mt-1 uppercase tracking-wide">{{ $book->author }}</div>
                                </div>
                            </td>
                            <td class="px-8 py-6 hidden sm:table-cell">
                                <span class="bg-[#1a1a1a] px-4 py-1.5 rounded-lg border border-[#333] text-sm font-bold uppercase">{{ $book->category }}</span>
                            </td>
                            <td class="px-8 py-6 font-semibold text-lg">{{ $book->year }}</td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('books.show', $book->id) }}" class="text-sm bg-indigo-900/20 text-indigo-400 hover:bg-indigo-600 hover:text-white px-5 py-2 rounded-full border border-indigo-900/50 transition-all font-bold">Detail</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="text-sm bg-[#222] hover:bg-white hover:text-black px-5 py-2 rounded-full transition-all font-bold">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus buku ini?');" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-sm bg-red-900/20 text-red-400 hover:bg-red-600 hover:text-white px-5 py-2 rounded-full border border-red-900/50 transition-all font-bold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-8 py-20 text-center text-gray-500 text-lg">Belum ada buku di workspace ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection