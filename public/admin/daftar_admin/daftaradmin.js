document.addEventListener("DOMContentLoaded", function () {
  const modal = document.querySelector("#reservasiFormModal");
  const modalOverlay = document.querySelector(".modal-overlay");
  const btnDokter = document.querySelector(".btn-dokter");
  const closeBtn = document.querySelector(".close-btn");
  const dropdownEditItem = document.querySelector(".dropdown-item");

  // Pastikan elemen-elemen ada sebelum menambahkan event listener
  if (modal && modalOverlay && btnDokter && closeBtn && dropdownEditItem) {
      // Klik tombol untuk membuka modal
      btnDokter.addEventListener("click", () => {
          modal.classList.remove("modal-hidden");
          modalOverlay.classList.remove("modal-hidden");
      });

      // Klik tombol close untuk menutup modal
      closeBtn.addEventListener("click", () => {
          modal.classList.add("modal-hidden");
          modalOverlay.classList.add("modal-hidden");
      });

      // Klik overlay untuk menutup modal
      modalOverlay.addEventListener("click", () => {
          modal.classList.add("modal-hidden");
          modalOverlay.classList.add("modal-hidden");
      });

      dropdownEditItem.addEventListener("click", (event) => {
          console.log("Edit button clicked!"); // Harus muncul di konsol
          modal.classList.remove("modal-hidden");
          modalOverlay.classList.remove("modal-hidden");
      });

  } else {
      console.error("Salah satu elemen tidak ditemukan:", {
          modal,
          modalOverlay,
          btnDokter,
          closeBtn,
          dropdownEditItem,
      });
  }
});

// Ambil semua tombol dropdown
document.querySelectorAll('.dropdown-btn').forEach(button => {
  button.addEventListener('click', function (e) {
      e.stopPropagation(); // Mencegah event klik dari memengaruhi elemen lain
      const dropdownMenu = this.nextElementSibling; // Ambil menu dropdown
      dropdownMenu.classList.toggle('show'); // Tambah/hapus kelas 'show'
  });
});

// Event handler for the date picker  
document.getElementById('filterDate').addEventListener('change', function () {  
  const selectedDate = this.value;  
  filterByDate(selectedDate);  
});  

// **Perubahan: Memastikan dropdown tetap berfungsi setelah filter**  
function initializeDropdown() {  
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
}  

// **Perubahan: Memanggil initializeDropdown setelah filter diterapkan**  
function filterByDate(selectedDate) {  
  $.ajax({  
      url: '/daftaradmin/filter',  
      method: 'GET',  
      data: { date: selectedDate },  
      success: function (response) {  
          $('#reservasiTable').html(response); // Ganti isi tabel dengan data baru  
          initializeDropdown(); // **Inisialisasi kembali dropdown setelah memperbarui tabel**  
      },  
      error: function (xhr) {  
          console.error('Terjadi kesalahan:', xhr.responseText);  
      }  
  });  
}  

// Toggle dropdown  
const dropdownButton = document.getElementById('dropdownButton');  
const dropdownContainer = document.querySelector('.dropdown-filter');  

dropdownButton.addEventListener('click', () => {  
  dropdownContainer.classList.toggle('open');  
});  

function selectOption(option) {  
  dropdownButton.textContent = option; // Ubah teks tombol menjadi opsi yang dipilih  
  dropdownContainer.classList.remove('open'); // Tutup dropdown  
  console.log('Opsi yang dipilih:', option); // Debug log (opsional)  

  // Mengirim permintaan AJAX untuk memfilter reservasi  
  $.ajax({  
      url: '/daftaradmin/filter', // Sesuaikan dengan route filter Anda  
      method: 'GET',  
      data: { option: option }, // Kirimkan opsi yang dipilih  
      success: function (response) {  
          console.log('Respons dari server:', response); // Tambahkan log untuk melihat respons  
          $('#reservasiTable').html(response); // Perbarui tabel dengan data yang diterima  
          initializeDropdown(); // Inisialisasi kembali dropdown setelah memperbarui tabel  
      },  
      error: function () {  
          console.log("Filter gagal. Coba lagi.");  
      }  
  });  
} 

$(document).ready(function () {  
  $("#searchInput").on("input", function () {  
      let query = $(this).val(); // Ambil input dari kolom pencarian  

      $.ajax({  
          url: "/daftaradmin/cari", // Sesuaikan dengan route pencarian  
          method: "GET",  
          data: { query: query }, // Kirimkan query pencarian  
          success: function (response) {  
              // Perbarui tabel dengan data yang diterima  
              $("#reservasiTable").html(response);  
              initializeDropdown(); // **Inisialisasi kembali dropdown setelah pencarian**  
          },  
          error: function () {  
              console.log("Pencarian gagal. Coba lagi.");  
          }  
      });  
  });  
});  

// CSRF Token Setup  
$.ajaxSetup({  
  headers: {  
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
  }  
});  

// Fungsi untuk menghapus reservasi  
function deleteReservasi(id_reservasi) {    
  // Menggunakan SweetAlert2 untuk konfirmasi penghapusan    
  Swal.fire({    
      title: 'Apakah Anda yakin?',    
      text: "Anda tidak dapat mengembalikan ini!",    
      icon: 'warning',    
      showCancelButton: true,    
      confirmButtonColor: '#3085d6',    
      cancelButtonColor: '#d33',    
      confirmButtonText: 'Ya, hapus!',
      customClass: {
        confirmButton: 'custom-ok-button'
      }
  }).then((result) => {    
      if (result.isConfirmed) {    
          // Jika pengguna mengonfirmasi, lakukan penghapusan    
          $.ajax({    
              url: '/admin/reservasi/' + id_reservasi, // Sesuaikan dengan route penghapusan    
              type: 'DELETE',    
              success: function (response) {    
                  // Tampilkan pesan sukses setelah penghapusan  
                  Swal.fire({    
                      title: 'Dihapus!',    
                      text: response.success,    
                      icon: 'success',    
                      confirmButtonText: 'OK',
                      customClass: {
                        confirmButton: 'custom-ok-button'
                      } 
                  }).then((result) => {  
                      if (result.isConfirmed) {  
                          location.reload(); // Muat ulang halaman setelah mengklik OK  
                      }  
                  });  
              },    
              error: function (xhr) {    
                  Swal.fire(    
                      'Terjadi kesalahan!',    
                      'Gagal menghapus reservasi.',    
                      'error'    
                  );    
              }    
          });    
      }    
  });    
}  
