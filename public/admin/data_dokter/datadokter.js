document.addEventListener("DOMContentLoaded", function () {
    const modal = document.querySelector("#doctorFormModal");
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

document.addEventListener("DOMContentLoaded", function () {
    const doctorForm = document.querySelector("#doctorForm");
    const dataTable = document.querySelector(".data-table");

    if (doctorForm && dataTable) {
        doctorForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Ambil nilai input dari form
            const doctorName = document.querySelector("#doctorName").value.trim();
            const specialist = document.querySelector("#specialist").value.trim();
            const phone = document.querySelector("#phone").value.trim();

            // Validasi input
            if (!doctorName || !specialist || !phone) {
                alert("Semua field harus diisi!");
                return;
            }

            // Tambahkan baris baru ke data-table
            const newRow = document.createElement("div");
            newRow.classList.add("row");
            newRow.innerHTML = `
                <div class="cell">${doctorName}</div>
                <div class="cell">Poli ${specialist}</div>
                <div class="cell">
                    <button class="btn-jadwal">Jadwal Dokter</button>
                </div>
                <div class="cell">${phone}</div>
                <div class="cell">
                    <button class="dropdown-btn">⋮</button>
                    <div class="dropdown-menu hidden">
                        <a href="#" class="dropdown-item">Edit</a>
                        <a href="#" class="dropdown-item">Hapus</a>
                    </div>
                </div>
            `;

            dataTable.appendChild(newRow);

            // Tambahkan event listener ke elemen baru
            attachEventListeners(newRow);

             // Reset form setelah menambahkan data
             doctorForm.reset();
            });
        }
    
        // Fungsi untuk menambahkan event listener ke elemen baru
        function attachEventListeners(row) {
            // Tombol jadwal
            const btnJadwal = row.querySelector(".btn-jadwal");
            if (btnJadwal) {
                btnJadwal.addEventListener("click", function () {
                    toggleSchedule(btnJadwal);
                });
            }
    
            // Tombol dropdown
            const dropdownBtn = row.querySelector(".dropdown-btn");
            const dropdownMenu = row.querySelector(".dropdown-menu");
            if (dropdownBtn && dropdownMenu) {
                dropdownBtn.addEventListener("click", function (e) {
                    e.stopPropagation(); // Mencegah event bubbling
                    dropdownMenu.classList.toggle("show");
                });
            }
        }
    
        // Menutup dropdown jika klik di luar
        window.addEventListener("click", function () {
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                menu.classList.remove("show");
            });
        });
    });

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

$(document).ready(function () {  
    $("#searchInput").on("input", function () {  
        let query = $(this).val(); // Ambil input dari kolom pencarian  
  
        $.ajax({  
            url: "/cari-dokter", // Sesuaikan dengan route pencarian  
            method: "GET",  
            data: { query: query }, // Kirimkan query pencarian  
            success: function (response) {  
                // Perbarui tabel dengan data yang diterima  
                $("#dokterTableContainer").html(response);  
            },  
            error: function () {  
                console.log("Pencarian gagal. Coba lagi.");  
            }  
        });  
    });  
});


function deleteDoctor(id_dokter) {
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
                url: '/admin/dokter/' + id_dokter, // Sesuaikan dengan route penghapusan dokter
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Pastikan ini ada
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
                        'Gagal menghapus dokter.',
                        'error'
                    );
                }
            });
        }
    });
}