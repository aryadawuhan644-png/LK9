@extends('layouts.app')

@section('title', 'Tambah Buku - WARR\'S BOOK')

@section('content')
<div class="max-w-2xl mx-auto bg-[#121212] p-8 rounded-2xl border border-[#333] shadow-2xl">
    <h2 class="text-2xl font-black text-white mb-6 border-b border-[#333] pb-4">Create New Book</h2>
    
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Judul Buku</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-all placeholder-gray-600" placeholder="Masukkan judul...">
            @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Penulis</label>
                <input type="text" name="author" value="{{ old('author') }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 transition-all">
                @error('author') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher') }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 transition-all">
                @error('publisher') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Tahun Terbit</label>
                <input type="number" name="year" value="{{ old('year') }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 transition-all">
                @error('year') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Kategori</label>
                <input type="text" name="category" value="{{ old('category') }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 transition-all">
                @error('category') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#444] rounded-xl focus:outline-none focus:border-purple-500 transition-all">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Upload Cover</label>
            <input type="file" name="cover" class="w-full p-2 bg-[#1a1a1a] text-gray-400 border border-[#444] rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#333] file:text-white hover:file:bg-[#444] transition-all cursor-pointer">
            @error('cover') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-[#333]">
            <a href="{{ route('books.index') }}" class="bg-[#222] hover:bg-[#333] border border-[#444] text-white font-semibold py-2.5 px-6 rounded-full text-sm transition-all">Cancel</a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-500 text-white font-bold py-2.5 px-6 rounded-full text-sm transition-all">Save Book</button>
        </div>
    </form>
</div>
@endsection