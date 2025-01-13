document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll('.dropdown-item[data-edit]');
    const modal = document.getElementById("userFormModal");
    const modalOverlay = document.querySelector(".modal-overlay");
    const btnDokter = document.querySelector(".btn-dokter");
    const closeBtn = document.querySelector(".close-btn");
    const dropdownEditItem = document.querySelector(".dropdown-item");
    const userForm = document.getElementById('userForm');

    //Edit button click handler
    editButtons.forEach(button => {
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
        });
    });

    // Close modal functionality
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
                password: document.getElementById('password').value
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

$(document).ready(function () {
    // Menangani input di search bar
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
