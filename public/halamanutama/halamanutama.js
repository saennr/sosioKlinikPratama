// JavaScript untuk smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.getElementById("btn-kirim").addEventListener("click", function (event) {
    event.preventDefault();

    // Ambil data dari form
    const nama = document.querySelector("input[placeholder='Masukan Nama']").value;
    const email = document.querySelector("input[placeholder='Masukan Email']").value;
    const subjek = document.querySelector("input[placeholder='Subjek']").value;
    const pesan = document.querySelector("textarea[placeholder='Pesan']").value;

    // Validasi sederhana sebelum pengiriman
    if (!nama || !email || !subjek || !pesan) {
        Swal.fire({
            title: "Gagal!",
            text: "Semua kolom wajib diisi.",
            icon: "error",
        });
        return;
    }

    // Kirim data ke Google Apps Script
    fetch("https://script.google.com/macros/s/AKfycbwTidqW_0gN4OtvWBl95C0Wg7PyCx3UuSNFCK78_r948TO755aX_v9mp7FZTwYn_q1Z6w/exec", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ nama, email, subjek, pesan }).toString(),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.result === "success") {
                Swal.fire({
                    title: "Terima Kasih!",
                    text: "Pesan Anda telah berhasil dikirim ke klinik.",
                    icon: "success",
                });

                // Reset form setelah berhasil
                document.querySelector("input[placeholder='Masukan Nama']").value = "";
                document.querySelector("input[placeholder='Masukan Email']").value = "";
                document.querySelector("input[placeholder='Subjek']").value = "";
                document.querySelector("textarea[placeholder='Pesan']").value = "";
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: "Pesan gagal dikirim. Silakan coba lagi.",
                    icon: "error",
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
                title: "Error!",
                text: "Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.",
                icon: "error",
            });
        });
});