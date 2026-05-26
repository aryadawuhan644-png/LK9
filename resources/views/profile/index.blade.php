@extends('layouts.app')

@section('title', 'Profil Saya - LiteraDigital')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    @if(session('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-indigo-600 via-fuchsia-600 to-cyan-500 text-white shadow-2xl shadow-cyan-500/20">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.22),_transparent_32%)]"></div>
        <div class="absolute -right-16 top-1/2 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
        <div class="relative px-6 py-10 sm:px-10 sm:py-14">
            <div class="flex flex-col lg:flex-row gap-6 items-center lg:items-end justify-between">
                <div class="flex items-center gap-5">
                    <div class="relative h-28 w-28 rounded-3xl border-4 border-white/60 bg-white/10 shadow-xl shadow-white/20 overflow-hidden">
                        @if($profile?->profile_photo)
                            <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="Foto Profil" class="h-full w-full object-cover" />
                        @else
                            <div class="flex h-full w-full items-center justify-center text-4xl font-black uppercase text-white/90">
                                {{ optional($profile)->name ? substr($profile->name, 0, 2) : 'P' }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.3em] text-white/70">Profil Pengguna</p>
                        <h1 class="mt-2 text-4xl font-black tracking-tight">{{ $profile?->name ?? 'Profil Kosong' }}</h1>
                        <p class="mt-2 max-w-2xl text-sm leading-7 text-white/80">Kelola informasi profil Anda dengan cepat. Unggah foto, perbarui data, dan lihat detail profil dalam tampilan modern berwarna retina.</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    @if($profile)
                        <a href="{{ route('profile.edit') }}" class="rounded-full bg-white/15 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/25">Edit Profil</a>
                        <form action="{{ route('profile.destroy') }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/20" onclick="return confirm('Hapus profil ini? Semua data akan dihapus.')">Hapus Profil</button>
                        </form>
                    @else
                        <a href="{{ route('profile.create') }}" class="rounded-full bg-white/15 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/25">Buat Profil</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($profile)
        <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
            <section class="space-y-6 rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-xl shadow-slate-200/30 backdrop-blur-sm">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Ringkasan Profil</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">Detail Pribadi</h2>
                    </div>
                    <span class="rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-slate-600">Akun Aktif</span>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Nama Lengkap</p>
                        <p class="mt-2 text-lg font-semibold text-slate-900">{{ $profile->name }}</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <p class="text-sm text-slate-500">Email</p>
                        <p class="mt-2 text-lg font-semibold text-slate-900">{{ $profile->email }}</p>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Tentang Saya</p>
                    <p class="mt-3 text-sm leading-7 text-slate-700">{{ $profile->bio ?? 'Tidak ada deskripsi. Silakan perbarui profil Anda.' }}</p>
                </div>
            </section>

            <aside class="space-y-6 rounded-[2rem] border border-slate-200 bg-white/95 p-6 shadow-xl shadow-slate-200/30 backdrop-blur-sm">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">Statistik</p>
                    <div class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl bg-gradient-to-br from-cyan-500 to-indigo-600 px-5 py-6 text-white shadow-lg shadow-cyan-500/20">
                            <p class="text-sm uppercase tracking-[0.24em] text-cyan-100/85">Akses Cepat</p>
                            <p class="mt-3 text-3xl font-black">1</p>
                            <p class="mt-2 text-sm text-cyan-100/80">Profil pengguna tersimpan</p>
                        </div>
                        <div class="rounded-3xl bg-gradient-to-br from-fuchsia-500 to-pink-600 px-5 py-6 text-white shadow-lg shadow-fuchsia-500/20">
                            <p class="text-sm uppercase tracking-[0.24em] text-fuchsia-100/85">Foto Profil</p>
                            <p class="mt-3 text-3xl font-black">{{ $profile->profile_photo ? 'Tersedia' : 'Belum' }}</p>
                            <p class="mt-2 text-sm text-fuchsia-100/80">Unggah foto untuk tampilan yang lebih personal</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white/95 shadow-xl shadow-slate-200/30 backdrop-blur-sm">
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">
                <h3 class="text-lg font-bold text-slate-900">Ringkasan Data Profil</h3>
            </div>
            <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                <tbody class="bg-white divide-y divide-slate-200">
                    <tr class="transition duration-200 hover:bg-slate-50">
                        <td class="px-6 py-5 font-semibold text-slate-600">Nama</td>
                        <td class="px-6 py-5">{{ $profile->name }}</td>
                    </tr>
                    <tr class="transition duration-200 hover:bg-slate-50">
                        <td class="px-6 py-5 font-semibold text-slate-600">Email</td>
                        <td class="px-6 py-5">{{ $profile->email }}</td>
                    </tr>
                    <tr class="transition duration-200 hover:bg-slate-50">
                        <td class="px-6 py-5 font-semibold text-slate-600">Bio</td>
                        <td class="px-6 py-5">{{ $profile->bio ?? '-' }}</td>
                    </tr>
                    <tr class="transition duration-200 hover:bg-slate-50">
                        <td class="px-6 py-5 font-semibold text-slate-600">Foto Profil</td>
                        <td class="px-6 py-5">{{ $profile->profile_photo ? 'Sudah terpasang' : 'Belum ada foto' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="rounded-[2rem] border border-slate-200 bg-white/95 p-8 text-center shadow-xl shadow-slate-200/30">
            <h2 class="text-2xl font-bold text-slate-900">Profil belum dibuat</h2>
            <p class="mt-3 text-slate-600">Silakan buat profil Anda agar data dapat ditampilkan dengan desain lebih menarik dan foto profil terlihat pada halaman utama.</p>
            <a href="{{ route('profile.create') }}" class="mt-6 inline-flex rounded-full bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:bg-indigo-700">Buat Profil Sekarang</a>
        </div>
    @endif
</div>
@endsection
