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
 
// Event handler for the date picker
document.getElementById('filterDate').addEventListener('change', function () {
    const selectedDate = this.value;
    filterByDate(selectedDate);
  });
  
  function filterByDate(date) {
    // Replace with your query logic
    console.log('Filtering by date:', date);
    // Example: Perform an AJAX request or filter the table directly.
  }
  
  function filterByOption(option) {
    // Replace with your query logic
    console.log('Filtering by option:', option);
    // Example: Perform an AJAX request or filter the table directly.
  }


// Toggle dropdown
const dropdownButton = document.getElementById('dropdownButton');
const dropdownContainer = document.querySelector('.dropdown-filter');

dropdownButton.addEventListener('click', () => {
  dropdownContainer.classList.toggle('open');
});

// Pilih opsi
function selectOption(option) {
  dropdownButton.textContent = option; // Ubah teks tombol menjadi opsi yang dipilih
  dropdownContainer.classList.remove('open'); // Tutup dropdown
  console.log('Opsi yang dipilih:', option); // Debug log (opsional)
}



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