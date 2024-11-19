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


