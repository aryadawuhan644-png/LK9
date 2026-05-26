@extends('layouts.app')

@section('title', $book->title . ' - WARR\'S BOOK')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('books.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white text-sm font-semibold mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Library
    </a>

    <div class="bg-[#0f0f0f] border border-[#222] rounded-3xl overflow-hidden shadow-2xl relative">
        <div class="absolute top-0 left-0 w-full h-48 bg-gradient-to-b from-purple-900/20 to-transparent"></div>
        
        <div class="p-8 md:p-12 relative z-10 flex flex-col md:flex-row gap-10">
            <div class="flex-shrink-0">
                @if($book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover" class="w-48 md:w-64 h-auto rounded-xl shadow-[0_10px_40px_rgba(147,51,234,0.3)] border border-[#333]">
                @else
                    <div class="w-48 md:w-64 h-72 bg-[#1a1a1a] rounded-xl border border-[#333] flex items-center justify-center">
                        <span class="text-gray-500 font-bold">No Cover Available</span>
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <div class="mb-2">
                    <span class="bg-[#1a1a1a] border border-[#333] text-purple-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $book->category }}</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight mb-2">{{ $book->title }}</h1>
                <p class="text-lg text-gray-400 font-medium mb-8">Ditulis oleh <span class="text-white">{{ $book->author }}</span></p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-1">Penerbit</p>
                        <p class="text-white font-semibold">{{ $book->publisher }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-1">Tahun Terbit</p>
                        <p class="text-white font-semibold">{{ $book->year }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-2">Deskripsi Sinopsis</p>
                    <div class="bg-[#1a1a1a] p-4 rounded-xl border border-[#222]">
                        <p class="text-gray-300 text-sm leading-relaxed">{{ $book->description }}</p>
                    </div>
                </div>
                
                <div class="mt-8 flex gap-3">
                    <a href="{{ route('books.edit', $book->id) }}" class="bg-white text-black hover:bg-gray-200 font-bold py-2.5 px-8 rounded-full text-sm transition-all shadow-lg">Edit Buku</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection