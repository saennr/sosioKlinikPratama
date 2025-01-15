document.addEventListener("DOMContentLoaded", function () {  
    const modal = document.getElementById("userFormModal");  
    const modalOverlay = document.querySelector(".modal-overlay");  
    const userForm = document.getElementById('userForm');  
  
    // Edit button click handler  
    document.querySelectorAll('.dropdown-item[data-edit]').forEach(button => {  
        button.addEventListener('click', function(event) {  
            event.preventDefault();  
  
            // Find the parent row  
            const row = this.closest('.row');  
              
            // Extract user data  
            const fullName = row.querySelector('.cell:nth-child(1)').textContent.trim();  
            const [firstName, lastName] = fullName.split(' ');  
  
            // Populate form fields  
            document.getElementById('firstName').value = firstName;  
            document.getElementById('lasttName').value = lastName || '';  
            document.getElementById('tgl-lahir').value = row.querySelector('.cell:nth-child(3)').textContent.trim();  
            document.getElementById('no_hp').value = row.querySelector('.cell:nth-child(4)').textContent.trim();  
            document.getElementById('jk').value = row.querySelector('.cell:nth-child(5)').textContent.trim();  
            document.getElementById('alamat').value = row.querySelector('.cell:nth-child(6)').textContent.trim();  
              
            // Set user ID on form  
            userForm.setAttribute('data-user-id', row.getAttribute('data-user-id'));  
              
            // Show modal  
            modal.classList.remove('modal-hidden');  
            modalOverlay.classList.remove('modal-hidden');  
  
            // Close the dropdown menu when edit is clicked // EDIT  
            const dropdownMenu = this.closest('.dropdown-menu'); // Find the closest dropdown menu    
            if (dropdownMenu) {    
                dropdownMenu.classList.remove('show'); // Hide the dropdown menu // EDIT    
            }  
        });  
    });  
  
    // Close modal functionality  
    const closeBtn = document.querySelector(".close-btn"); // EDIT: Moved inside the DOMContentLoaded  
    if (closeBtn) {  
        closeBtn.addEventListener('click', () => {  
            modal.classList.add('modal-hidden');  
            modalOverlay.classList.add('modal-hidden');  
        });  
    }  
  
    // Form submission handler  
    if (userForm) {  
        userForm.addEventListener('submit', function(event) {  
            event.preventDefault();  
              
            // Get user ID  
            const userId = this.getAttribute('data-user-id');  
              
            // Prepare form data  
            const formData = {  
                firstName: document.getElementById('firstName').value,  
                lastName: document.getElementById('lasttName').value,  
                tgl_lahir: document.getElementById('tgl-lahir').value,  
                no_hp: document.getElementById('no_hp').value,  
                jk: document.getElementById('jk').value,  
                alamat: document.getElementById('alamat').value,  
                pw: document.getElementById('pw').value  
            };  
              
            // Send AJAX request  
            fetch(`/users/${userId}`, {  
                method: 'PUT',  
                headers: {  
                    'Content-Type': 'application/json',  
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')  
                },  
                body: JSON.stringify(formData)  
            })  
            .then(response => response.json())  
            .then(data => {  
                if (data.success) {  
                    Swal.fire({  
                        icon: 'success',  
                        title: 'Berhasil!',  
                        text: 'Data user berhasil diupdate'  
                    }).then(() => {  
                        // Reload the page to reflect changes  
                        location.reload();  
                    });  
                } else {  
                    Swal.fire({  
                        icon: 'error',  
                        title: 'Oops...',  
                        text: data.message || 'Gagal update data'  
                    });  
                }  
            })  
            .catch(error => {  
                console.error('Error:', error);  
                Swal.fire({  
                    icon: 'error',  
                    title: 'Oops...',  
                    text: 'Terjadi kesalahan saat update data'  
                });  
            });  
        });  
    };  
  
    // Dropdown functionality  
    document.querySelectorAll('.dropdown-btn').forEach(button => {  
        button.addEventListener('click', function (e) {  
            e.stopPropagation(); // Mencegah event klik dari memengaruhi elemen lain  
            const dropdownMenu = this.nextElementSibling; // Ambil menu dropdown  
  
            // Tutup dropdown lain yang terbuka // EDIT  
            document.querySelectorAll('.dropdown-menu').forEach(menu => {    
                if (menu !== dropdownMenu) {    
                    menu.classList.remove('show'); // Hapus kelas 'show' dari dropdown lain   
                }    
            });  
  
            dropdownMenu.classList.toggle('show'); // Tambah/hapus kelas 'show'  
        });  
    });  
  
    // Close dropdown when clicking outside  
    document.addEventListener('click', function (e) {    
        const dropdowns = document.querySelectorAll('.dropdown-menu');    
        dropdowns.forEach(dropdown => {    
            if (dropdown.classList.contains('show')) {    
                dropdown.classList.remove('show'); // Hapus kelas 'show' jika dropdown terbuka    
            }    
        });    
    });   
});  
  
// Menangani input di search bar  
$(document).ready(function () {  
    $("#searchInput").on("input", function () {  
        let query = $(this).val(); // Ambil input dari kolom pencarian  
  
        $.ajax({  
            url: "/datauser/cari",  // Pastikan ini sesuai dengan route yang didefinisikan  
            method: "GET",  
            data: { query: query },  // Kirimkan query pencarian  
            success: function (response) {  
                // Perbarui tabel dengan data yang diterima  
                $("#userTable").html(response);  
            },  
            error: function () {  
                console.log("Pencarian gagal. Coba lagi.");  
            }  
        });  
          
        // Jika query kosong, reset hasil pencarian  
        if (query === '') {  
            $("#userTable").html('');  
        }  
    });  
});  
  
// Fungsi untuk menghapus user  
function deleteUser(id_user) {  
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
                url: '/admin/user/' + id_user, // Sesuaikan dengan route penghapusan user  
                type: 'DELETE',  
                headers: {  
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
                },  
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
                        'Gagal menghapus user.',  
                        'error'  
                    );  
                }  
            });  
        }  
    });  
}  
