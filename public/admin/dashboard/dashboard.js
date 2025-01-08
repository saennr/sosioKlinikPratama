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

// Pilih semua menu item
const menuItems = document.querySelectorAll('.menu-item');

// Ambil URL halaman saat ini
const currentPage = window.location.pathname.split("/").pop();

// Set tombol aktif berdasarkan halaman aktif
menuItems.forEach(link => {
    if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
    }
});

// Set tombol aktif berdasarkan klik
menuItems.forEach(item => {
    item.addEventListener('click', function () {
        menuItems.forEach(link => link.classList.remove('active'));
        this.classList.add('active');
    });
});
