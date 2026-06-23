<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    // 1. Tampil Semua Buku
    public function index(): View
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    // 2. Tampil Form Tambah
    public function create(): View
    {
        return view('books.create');
    }

    // 3. Proses Simpan Buku Baru
    public function store(Request $request): RedirectResponse
    {
        // Menggunakan method private untuk validasi dan upload
        $validated = $this->validatedData($request);
        $validated['cover'] = $this->handleImageUpload($request);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku baru berhasil ditambahkan!');
    }

    // 4. Tampil Detail Buku
    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    // 5. Tampil Form Edit
    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    // 6. Proses Perbarui Buku
    public function update(Request $request, Book $book): RedirectResponse
    {
        // Menggunakan method private (parameter true menandakan ini proses update)
        $validated = $this->validatedData($request, true);
        $validated['cover'] = $this->handleImageUpload($request, $book->cover);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    // 7. Proses Hapus Buku
    public function destroy(Book $book): RedirectResponse
    {
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }


    // =====================================================================
    // PRIVATE METHODS (HASIL REFACTORING)
    // =====================================================================

    /**
     * Ekstraksi logika validasi agar tidak terjadi duplikasi kode
     */
    private function validatedData(Request $request, bool $isUpdate = false): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            // Jika update, cover boleh kosong. Jika buat baru, cover wajib diisi.
            'cover' => $isUpdate 
                ? 'nullable|image|mimes:jpeg,png,jpg|max:2048' 
                : 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        return $request->validate($rules);
    }

    /**
     * Ekstraksi logika upload gambar dan penghapusan gambar lama
     */
    private function handleImageUpload(Request $request, ?string $oldImagePath = null): ?string
    {
        if ($request->hasFile('cover')) {
            // Jika ada gambar lama yang tersimpan, hapus terlebih dahulu
            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
            
            // Simpan gambar baru ke folder public/covers
            return $request->file('cover')->store('covers', 'public');
        }

        // Jika tidak ada upload gambar baru, kembalikan path gambar lama
        return $oldImagePath;
    }
}