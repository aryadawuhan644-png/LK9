@extends('layouts.app')

@section('title', 'Edit Buku - WARR\'S BOOK')

@section('content')
<div class="max-w-2xl mx-auto bg-[#0f0f0f] p-8 rounded-2xl border border-[#222] shadow-2xl relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500/5 rounded-full blur-3xl -mr-20 -mt-20"></div>

    <h2 class="text-2xl font-black tracking-tight text-white mb-6 border-b border-[#222] pb-4">Edit Book Details</h2>
    
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 relative z-10">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Judul Buku</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="bg-[#1a1a1a] w-full p-3 rounded-lg text-white">
    
        @error('title')
        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Penulis</label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#333] rounded-xl focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
                @error('author') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#333] rounded-xl focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
                @error('publisher') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Tahun Terbit</label>
                <input type="number" name="year" value="{{ old('year', $book->year) }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#333] rounded-xl focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
                @error('year') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $book->category) }}" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#333] rounded-xl focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
                @error('category') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full p-3 bg-[#1a1a1a] text-white border border-[#333] rounded-xl focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">{{ old('description', $book->description) }}</textarea>
            @error('description') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-400 text-xs font-bold mb-2 uppercase tracking-wide">Cover Buku Saat Ini</label>
            @if($book->cover)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $book->cover) }}" alt="Current Cover" class="w-20 h-28 object-cover rounded-lg border border-[#333]">
                </div>
            @endif
            <input type="file" name="cover" class="w-full p-2 bg-[#1a1a1a] text-gray-400 border border-[#333] rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#222] file:text-white hover:file:bg-[#333] transition-all cursor-pointer">
            <p class="text-[10px] text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengganti cover.</p>
            @error('cover') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-[#222]">
            <a href="{{ route('books.index') }}" class="bg-[#1a1a1a] hover:bg-[#222] border border-[#333] text-white font-semibold py-2.5 px-6 rounded-full text-sm transition-all">Cancel</a>
            <button type="submit" class="bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-500 hover:to-red-500 text-white font-bold py-2.5 px-6 rounded-full text-sm shadow-[0_0_15px_rgba(234,88,12,0.3)] transition-all">Update Book</button>
        </div>
    </form>
</div>
@endsection