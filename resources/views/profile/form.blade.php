@extends('layouts.app')

@section('title', isset($profile) ? 'Edit Profil - LiteraDigital' : 'Buat Profil - LiteraDigital')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    @if(session('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-8 shadow-xl shadow-slate-200/30">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-slate-400">{{ isset($profile) ? 'Edit Profil Saya' : 'Buat Profil Baru' }}</p>
                <h1 class="mt-3 text-3xl font-black text-slate-900">{{ isset($profile) ? 'Perbarui Data Profil' : 'Isi Informasi Profil' }}</h1>
            </div>
            @if(isset($profile))
                <div class="rounded-3xl bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">Profil Aktif</div>
            @endif
        </div>

        <form action="{{ isset($profile) ? route('profile.update') : route('profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
            @csrf
            @if(isset($profile))
                @method('PUT')
            @endif

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 @error('name') border-red-300 bg-red-50/70 @enderror" placeholder="Masukkan nama lengkap">
                    @error('name') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 @error('email') border-red-300 bg-red-50/70 @enderror" placeholder="email@contoh.com">
                    @error('email') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Bio Singkat</label>
                <textarea name="bio" rows="4" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 @error('bio') border-red-300 bg-red-50/70 @enderror" placeholder="Jelaskan tentang diri Anda...">{{ old('bio', $profile->bio ?? '') }}</textarea>
                @error('bio') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Foto Profil</label>
                <input type="file" name="profile_photo" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-900 shadow-sm file:mr-4 file:rounded-full file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-indigo-700 @error('profile_photo') border-red-300 bg-red-50/70 @enderror">
                @error('profile_photo') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                @if(isset($profile) && $profile->profile_photo)
                    <p class="mt-3 text-sm text-slate-500">Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="Foto Profil" class="mt-3 h-28 w-28 rounded-3xl object-cover shadow-sm">
                @endif
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('profile.index') }}" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-slate-100 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">Kembali</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-3xl bg-gradient-to-r from-indigo-600 to-fuchsia-600 px-6 py-3 text-sm font-semibold text-white shadow-xl shadow-fuchsia-500/20 transition hover:opacity-95">{{ isset($profile) ? 'Simpan Perubahan' : 'Simpan Profil' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
