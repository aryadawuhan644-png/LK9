🛠️ Update Log (LK-11)
Bug Fixes
Input Preservation: Memperbaiki masalah hilangnya data input saat validasi form gagal dengan mengimplementasikan fungsi old().

Dynamic Error Handling: Menambahkan directive Blade @error untuk menampilkan pesan kesalahan spesifik di bawah setiap field form.

Pagination Implementation: Mengganti metode get() menjadi paginate(10) untuk mengoptimalkan beban memori pada sistem saat menangani data dalam jumlah besar.

Refactoring
Prinsip DRY (Don't Repeat Yourself): Melakukan refactoring pada BookController.php dengan mengekstrak logika validasi dan upload gambar ke dalam Private Method (validatedData dan handleImageUpload). Hal ini membuat kode lebih bersih, mudah dibaca, dan lebih mudah dipelihara.
