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
 
$(document).ready(function() {    
    $('#searchInput').on('keyup', function() {    
        var query = $(this).val();    
        var url = "{{ route('cariReservasi') }}"; // Menggunakan route baru  

        $.ajax({    
            url: url,    
            method: "GET",    
            data: { query: query },    
            success: function(data) {    
                $('#reservasiTable').html(data);    
            },    
            error: function(xhr) {  
                console.error(xhr.responseText); // Log error ke konsol untuk debugging  
            }  
        });    
    });    
});
