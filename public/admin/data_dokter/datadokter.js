function toggleSchedule(button) {
    console.log('Button clicked'); 
    const scheduleContainer = button.parentElement.parentElement.nextElementSibling;
    console.log(scheduleContainer); 

    if (scheduleContainer && scheduleContainer.classList.contains('hidden')) {
        scheduleContainer.classList.remove('hidden');
        scheduleContainer.classList.add('visible'); 
        button.textContent = 'Jadwal Dokter';
    } else if (scheduleContainer) {
        scheduleContainer.classList.remove('visible'); 
        scheduleContainer.classList.add('hidden');
        button.textContent = 'Jadwal Dokter';
    }
}

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