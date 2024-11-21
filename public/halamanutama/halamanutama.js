// JavaScript untuk smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const cekLabButton = document.getElementById("cek-lab-button");
    const cekRadiologiButton = document.getElementById("cek-radio-button");

    console.log("Page loaded, attaching event listeners");

    cekLabButton.addEventListener("click", function (event) {
        console.log("Cek Lab button clicked");
        Swal.fire({
            icon: 'error',
            title: 'Coming Soon',
            text: 'Mohon maaf, fasilitas ini belum tersedia.',
            confirmButtonText: 'OK'
        });
    });

    cekRadiologiButton.addEventListener("click", function (event) {
        console.log("Cek Lab button clicked");
        Swal.fire({
            icon: 'error',
            title: 'Coming Soon',
            text: 'Mohon maaf, fasilitas ini belum tersedia.',
            confirmButtonText: 'OK'
        });
    });
});

//button kirim
document.getElementById("btn-kirim").addEventListener("click", function(event) {
    event.preventDefault();

    // Ambil data dari form
    const nama = document.getElementById("nama").value;
const email = document.getElementById("email").value;
const subjek = document.getElementById("subjek").value;
const pesan = document.getElementById("pesan").value;


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
    fetch("https://script.google.com/macros/s/AKfycbxbRTArG_66v0TU08G8EEevBR5JJcQahfrk0MM4p0Z_YyS6ll9lMeUqzTr9JrytQRZ0/exec", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nama, email, subjek, pesan }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            Swal.fire({
                title: "Terima Kasih!",
                text: "Pesan Anda telah berhasil dikirim ke klinik.",
                icon: "success",
            });
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





