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

document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            item.classList.toggle('active');

            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
        });
    });
});




