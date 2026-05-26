@extends('layouts.app')

@section('title', 'My Profile - WARR\'S BOOK')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-[#121212] border border-[#333] rounded-3xl overflow-hidden relative mb-8">
        <div class="h-32 bg-gradient-to-r from-purple-900 to-black"></div>

        <div class="px-8 pb-8 relative">
            <div class="absolute -top-12 left-8 w-24 h-24 bg-gradient-to-tr from-purple-500 to-orange-500 rounded-full p-1">
                <div class="w-full h-full bg-[#0a0a0a] rounded-full flex items-center justify-center text-3xl font-black text-white">
                    AA
                </div>
            </div>

            <div class="pt-16 flex justify-between items-end">
                <div>
                    <h1 class="text-2xl font-black text-white tracking-tight">Arya Anugrah Saputra</h1>
                    <p class="text-purple-400 text-sm font-medium mt-1">Admin</p>
                </div>
                <div class="bg-[#1a1a1a] border border-[#444] px-3 py-1.5 rounded-lg text-xs font-bold text-gray-400">
                    ID: 2010MWP0203
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#121212] border border-[#333] p-6 rounded-2xl">
        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Informasi Praktikum</h3>
        <div class="space-y-4">
            <div class="flex justify-between border-b border-[#222] pb-2">
                <span class="text-gray-400 text-sm">Mata Kuliah</span>
                <span class="text-white text-sm font-semibold">Pemrograman Web</span>
            </div>
            <div class="flex justify-between border-b border-[#222] pb-2">
                <span class="text-gray-400 text-sm">Tugas Modul</span>
                <span class="text-white text-sm font-semibold">LK09 - CRUD</span>
            </div>
            <div class="flex justify-between pb-2">
                <span class="text-gray-400 text-sm">Stack</span>
                <span class="text-white text-sm font-semibold">WARR19</span>
            </div>
        </div>
    </div>
</div>
@endsection