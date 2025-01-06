function confirmLogout() {
    Swal.fire({
        title: "Konfirmasi Logout",
        text: "Apakah Anda yakin ingin logout?",
        icon: "warning", // Ganti 'type' dengan 'icon'
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Logout!",
        cancelButtonText: "Batal",
        reverseButtons: true // Jika Anda ingin membalikkan urutan tombol
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengkonfirmasi, kirim form logout
            document.getElementById('logout-form').submit();
        }
    });
}