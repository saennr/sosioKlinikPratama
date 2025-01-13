// Ambil semua tombol dropdown
document.querySelectorAll('.dropdown-btn').forEach(button => {
    button.addEventListener('click', function (e) {
        e.stopPropagation(); // Mencegah event klik dari memengaruhi elemen lain
        const dropdownMenu = this.nextElementSibling; // Ambil menu dropdown
        dropdownMenu.classList.toggle('show'); // Tambah/hapus kelas 'show'
    });
});

// Menutup dropdown jika klik di luar
window.addEventListener('click', function () {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.remove('show'); // Hapus kelas 'show' dari semua dropdown
    });
});


$(document).ready(function () {
    // Menangani input di search bar
    $("#searchInput").on("input", function () {
        let query = $(this).val(); // Ambil input dari kolom pencarian

        $.ajax({
            url: "/datauser/cari",  // Pastikan ini sesuai dengan route yang didefinisikan
            method: "GET",
            data: { query: query },  // Kirimkan query pencarian
            success: function (response) {
                // Perbarui tabel dengan data yang diterima
                $("#userTable").html(response);
            },
            error: function () {
                console.log("Pencarian gagal. Coba lagi.");
            }
        });
        

        // Jika query kosong, reset hasil pencarian
        if (query === '') {
            $("#userTable").html('');
        }
    });
});


// Fungsi untuk menghapus user
function deleteUser(id_user) {
    // Menggunakan SweetAlert2 untuk konfirmasi penghapusan
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        customClass: {
            confirmButton: 'custom-ok-button'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, lakukan penghapusan
            $.ajax({
                url: '/admin/user/' + id_user, // Sesuaikan dengan route penghapusan user
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Tampilkan pesan sukses setelah penghapusan
                    Swal.fire({
                        title: 'Dihapus!',
                        text: response.success,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'custom-ok-button'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Muat ulang halaman setelah mengklik OK
                        }
                    });
                },
                error: function (xhr) {
                    Swal.fire(
                        'Terjadi kesalahan!',
                        'Gagal menghapus user.',
                        'error'
                    );
                }
            });
        }
    });
}
