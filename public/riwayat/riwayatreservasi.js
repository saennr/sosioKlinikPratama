document.addEventListener("DOMContentLoaded", () => {
    // Ambil elemen tombol dan kategori
    const btnReservasiAktif = document.getElementById("btnReservasiAktif");
    const btnRiwayat = document.getElementById("btnRiwayat");
    const reservasiCategory = document.getElementById("reservasi");
    const riwayatCategory = document.getElementById("riwayatCategory");

    // Fungsi untuk menampilkan kategori
    function showCategory(category) {
        // Sembunyikan semua kategori
        reservasiCategory.style.display = "none";
        riwayatCategory.style.display = "none";

        // Tampilkan kategori yang diklik
        if (category === "reservasi") {
            reservasiCategory.style.display = "block";
        } else if (category === "riwayat") {
            riwayatCategory.style.display = "block";
        }
    }

    // Tambahkan event listener ke tombol
    btnReservasiAktif.addEventListener("click", () => showCategory("reservasi"));
    btnRiwayat.addEventListener("click", () => showCategory("riwayat"));

    // Sembunyikan kategori saat halaman pertama kali dimuat
    reservasiCategory.style.display = "none";
    riwayatCategory.style.display = "none";

    const checkButtons = document.querySelectorAll(".btn-success");
    
    // Add click event to each button
    checkButtons.forEach((button) => {
        button.addEventListener("click", () => {
         // Show the modal
        const reservasiModal = new bootstrap.Modal(document.getElementById("reservasiModal"));
            reservasiModal.show();
        });
    });  
});

// document.addEventListener('DOMContentLoaded', () => {
//     const modals = document.querySelectorAll('.modal');

//     modals.forEach(modal => {
//         modal.addEventListener('hidden.bs.modal', () => {
//             const backdrops = document.querySelectorAll('.modal-backdrop');
//             backdrops.forEach(backdrop => backdrop.parentNode.removeChild(backdrop));
//             document.body.classList.remove('modal-open');
//             document.body.style.paddingRight = '';
//         });
//     });
// });
