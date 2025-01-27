document.addEventListener("DOMContentLoaded", function () {
    // Modal Handling
    const modal = document.getElementById("doctorFormModal");  
    const modalOverlay = document.querySelector(".modal-overlay");
    const btnDokter = document.querySelector(".btn-dokter");
    const closeBtn = document.querySelector(".close-btn");
    const doctorForm = document.querySelector("#doctorForm");
    // Tambah Jadwal Modal Handling
    const btnTambahJadwal = document.querySelectorAll('#btn-tambahJadwal');
    const jadwalForm = document.querySelector("#jadwalForm");


    // edit funcitions
        // Event listener untuk tombol Edit
        document.querySelectorAll('.dropdown-item[data-edit]').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
        
                // Temukan baris yang relevan
                const row = this.closest('.row');
                const doctorId = row.getAttribute('data-doctor-id');
        
                // Menampilkan input dan menyembunyikan span
                const doctorNameSpan = row.querySelector('.doctor-name-text');
                const doctorNameInput = row.querySelector('.doctor-name-input');
                const doctorSpecialtySpan = row.querySelector('.doctor-specialty-text');
                const doctorSpecialtyInput = row.querySelector('#id_spesialis'); // Menggunakan ID dropdown
                const doctorDaySpan = row.querySelector('.doctor-day-text');
                const doctorDayInput = row.querySelector('.doctor-day-input');
                const doctorPhoneSpan = row.querySelector('.doctor-phone-text');
                const doctorPhoneInput = row.querySelector('.doctor-phone-input');
        
                // Mengganti span dengan input
                doctorNameSpan.style.display = 'none';
                doctorNameInput.style.display = 'block';
        
                doctorSpecialtySpan.style.display = 'none';
                doctorSpecialtyInput.style.display = 'block';
        
                doctorDaySpan.style.display = 'none';
                doctorDayInput.style.display = 'block';
        
                doctorPhoneSpan.style.display = 'none';
                doctorPhoneInput.style.display = 'block';
        
                // Menampilkan tombol Save dan Cancel di bawah baris
                const rowButtons = row.nextElementSibling;  // Menampilkan tombol di bawah row
                rowButtons.style.display = 'block';
        
                // Event listener untuk tombol Save
                const saveBtn = rowButtons.querySelector('.save-btn');
        
                let isSaveListenerAdded = false;
                saveBtn.addEventListener('click', function () {
                    if (!isSaveListenerAdded) {
                        isSaveListenerAdded = true;
                        const updatedDoctorName = doctorNameInput.value;
                        const updatedDoctorSpecialty = doctorSpecialtyInput.value; // Ambil value dari dropdown
                        const updatedDoctorDay = doctorDayInput.value;
                        const updatedDoctorPhone = doctorPhoneInput.value;
        
                        // Lakukan AJAX request untuk menyimpan perubahan
                        saveDoctorData(doctorId, updatedDoctorName, updatedDoctorSpecialty, updatedDoctorDay, updatedDoctorPhone);
                    }
                });
        
                // Event listener untuk tombol Cancel
                const cancelBtn = rowButtons.querySelector('.cancel-btn');
                cancelBtn.addEventListener('click', function () {
                    // Menyembunyikan input dan mengembalikan span
                    doctorNameSpan.style.display = 'block';
                    doctorNameInput.style.display = 'none';
        
                    doctorSpecialtySpan.style.display = 'block';
                    doctorSpecialtyInput.style.display = 'none';
        
                    doctorDaySpan.style.display = 'block';
                    doctorDayInput.style.display = 'none';
        
                    doctorPhoneSpan.style.display = 'block';
                    doctorPhoneInput.style.display = 'none';
        
                    // Mengembalikan tombol Edit
                    rowButtons.style.display = 'none';
                });
            });
        });

        // Fungsi untuk menyimpan data dokter
        function saveDoctorData(doctorId, updatedDoctorName, updatedDoctorSpecialty, updatedDoctorDay, updatedDoctorPhone) {
            fetch(`/update-dokter/${doctorId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    nama_dokter: updatedDoctorName,
                    id_spesialis: updatedDoctorSpecialty,
                    hari: updatedDoctorDay,
                    no_telepon: updatedDoctorPhone
                })
            })
            .then(response => response.json())
            .then(data => {
                // Menampilkan pesan sukses
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diperbarui',
                    text: data.message || 'Dokter berhasil diupdate'
                });
    
                // Update tampilan
                const row = document.querySelector(`.row[data-doctor-id="${doctorId}"]`);
                row.querySelector('.doctor-name-text').textContent = updatedDoctorName;

                let specialtyText;
                const specialtyId = Number(updatedDoctorSpecialty);
                if (specialtyId === 1) {
                    specialtyText = 'Poli Umum'; // ID 1 corresponds to Poli Umum
                } else if (specialtyId === 2) {
                    specialtyText = 'Poli Gigi'; // ID 2 corresponds to Poli Gigi
                } else {
                    specialtyText = 'Tidak Diketahui';
                }
                row.querySelector('.doctor-specialty-text').textContent = specialtyText;
                row.querySelector('.doctor-day-text').textContent = updatedDoctorDay;
                row.querySelector('.doctor-phone-text').textContent = updatedDoctorPhone;
    
                // Reset input dan tampilkan lagi span
                row.querySelector('.doctor-name-input').style.display = 'none';
                row.querySelector('.doctor-specialty-input').style.display = 'none';
                row.querySelector('.doctor-day-input').style.display = 'none';
                row.querySelector('.doctor-phone-input').style.display = 'none';
    
                row.querySelector('.doctor-name-text').style.display = 'block';
                row.querySelector('.doctor-specialty-text').style.display = 'block';
                row.querySelector('.doctor-day-text').style.display = 'block';
                row.querySelector('.doctor-phone-text').style.display = 'block';
    
                // Reset tombol
                row.nextElementSibling.style.display = 'none';  // Menyembunyikan tombol setelah selesai
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.response) {  
                    console.error('Response:', error.response);  
                    console.error('Status:', error.response.status);  
                    console.error('Data:', error.response.data);  
                } else {  
                    console.error('Error Message:', error.message);  
                } 
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan data.'
                });
            });
        }
    // end inline edit
    
    // Modal Open/Close Functions
    function openModal() {
        if (modal && modalOverlay) {
            modal.classList.remove("modal-hidden");
            modalOverlay.classList.remove("modal-hidden");
        }
    }

    function closeModal() {
        if (modal && modalOverlay) {
            modal.classList.add("modal-hidden");
            modalOverlay.classList.add("modal-hidden");
        }
    }
    
      // Function to open Jadwal Modal
      function openJadwalModal() {
        if (jadwalForm.closest('.modal-hidden')) {
            jadwalForm.closest('#doctorFormModal').classList.remove("modal-hidden");
            document.querySelector(".modal-overlay").classList.remove("modal-hidden");
        }
    }
    
    // Function to close Jadwal Modal
    function closeJadwalModal() {
        if (jadwalForm) {
            jadwalForm.closest('#doctorFormModal').classList.add("modal-hidden");
            document.querySelector(".modal-overlay").classList.add("modal-hidden");
        }
    }
    // Add click event to all "Tambah Jadwal" buttons
    btnTambahJadwal.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Change modal title and form
            document.querySelector("#doctorFormModal h3").textContent = "Tambah Jadwal";
            doctorForm.style.display = 'none';
            jadwalForm.style.display = 'block';
            
            // Open modal
            openJadwalModal();

            // Optional: Get the associated doctor's ID if needed
            const doctorRow = this.closest('.row');
            const doctorId = doctorRow ? doctorRow.dataset.doctorId : null;
            
            // If you want to set a hidden input with doctor ID
            const hiddenIdInput = jadwalForm.querySelector('input[name="id_dokter"]');
            if (hiddenIdInput && doctorId) {
                hiddenIdInput.value = doctorId;
            }
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

    // Close button for Jadwal Modal
    const closeJadwalBtn = jadwalForm.querySelector('.close-btn');
    if (closeJadwalBtn) {
        closeJadwalBtn.addEventListener('click', function() {
            // Reset modal to original state
            document.querySelector("#doctorFormModal h3").textContent = "Tambah Dokter";
            doctorForm.style.display = 'block';
            jadwalForm.style.display = 'none';
            closeJadwalModal();
        });
    }


    // Event Listeners for Modal
    if (btnDokter) {
        btnDokter.addEventListener("click", openModal);
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", closeModal);
    }

    // Tambah Dokter Form Submission
    if (doctorForm) {
        doctorForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Collect form data
            const formData = new FormData(doctorForm);

            // Validate form data
            const nama_dokter = formData.get('nama_dokter');
            const id_spesialis = formData.get('id_spesialis');
            const hari = formData.get('hari');
            const no_telepon = formData.get('no_telepon');

            // Basic client-side validation
            if (!nama_dokter || !id_spesialis || !hari || !no_telepon) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validasi Gagal',
                    text: 'Mohon isi semua field yang diperlukan'
                });
                return;
            }

            // AJAX Submission
            $.ajax({
                url: "/tambah-dokter",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Success Handling
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || 'Dokter berhasil ditambahkan',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reset form and close modal
                            doctorForm.reset();
                            closeModal();
                            
                            // Reload or update table
                            location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    // Error Handling
                    console.error("Error Response:", xhr);
                    
                    let errorMessage = 'Terjadi kesalahan saat menambahkan dokter';
                    
                    // Check for specific error messages
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.errors) {
                            // Validation errors
                            errorMessage = Object.values(xhr.responseJSON.errors)
                                .flat()
                                .join('\n');
                        } else if (xhr.responseJSON.message) {
                            // Server-specific error message
                            errorMessage = xhr.responseJSON.message;
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errorMessage
                    });
                }
            });
        });
    }
    
    // Dropdown and Schedule Handling
    function setupDropdownListeners() {
        // Dropdown toggle
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });
        });

        // Close dropdowns when clicking outside
        window.addEventListener('click', function () {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        });
    }

    // Jadwal Dokter Functionality
    function toggleSchedule(button) {
        console.log('Button clicked');
        
        // Find the next sibling element (assuming the schedule is the next element)
        const scheduleContainer = button.closest('.row').nextElementSibling;
        
        if (!scheduleContainer) {
            console.error('Schedule container not found');
            return;
        }
    
        // Check if the schedule is currently hidden
        const isHidden = scheduleContainer.classList.contains('hidden');
    
        if (isHidden) {
            // Prepare for animation
            scheduleContainer.style.display = 'block';
            scheduleContainer.style.overflow = 'hidden';
            scheduleContainer.style.maxHeight = '0px';
            scheduleContainer.style.opacity = '0';
            
            // Trigger reflow
            scheduleContainer.offsetHeight;
            
            // Slide down animation
            scheduleContainer.style.transition = 'max-height 0.3s ease, opacity 0.3s ease';
            
            // Calculate and set exact height
            const exactHeight = scheduleContainer.scrollHeight;
            scheduleContainer.style.maxHeight = `${exactHeight}px`;
            scheduleContainer.style.opacity = '1';
            
            // Remove hidden class
            scheduleContainer.classList.remove('hidden');
            scheduleContainer.classList.add('visible');
            
        } else {
            // Slide up animation
            scheduleContainer.style.maxHeight = '0px';
            scheduleContainer.style.opacity = '0';
            
            // Wait for animation to complete
            setTimeout(() => {
                scheduleContainer.classList.remove('visible');
                scheduleContainer.classList.add('hidden');
                
                // Reset inline styles
                scheduleContainer.style.display = '';
                scheduleContainer.style.overflow = '';
                scheduleContainer.style.maxHeight = '';
                scheduleContainer.style.opacity = '';
                scheduleContainer.style.transition = '';
            }, 300);
            
            button.textContent = 'Jadwal Dokter';
        }
    }

    // Tambah Jadwal Dokter Form Submission
if (jadwalForm) {
    jadwalForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Collect form data
        const formData = new FormData(jadwalForm);

        // Validate form data
        const id_dokter = formData.get('id_dokter');
        const nama_jadwal = formData.get('nama_jadwal');
        const hari = formData.get('hari');
        const jam_mulai = formData.get('jam_mulai');
        const durasi_tindakan = formData.get('durasi_tindakan');

        // Basic client-side validation
        if (!id_dokter || !nama_jadwal || !hari || !jam_mulai || !durasi_tindakan) {
            Swal.fire({
                icon: 'warning',
                title: 'Validasi Gagal',
                text: 'Mohon isi semua field yang diperlukan'
            });
            return;
        }

         // Debugging: log data yang akan dikirim
         console.log('Data yang dikirim:', {
            id_dokter,
            nama_jadwal,
            hari,
            jam_mulai,
            durasi_tindakan
        });

        // AJAX Submission
        $.ajax({
            url: "/tambah-jadwal",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Success Handling
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message || 'Jadwal dokter berhasil ditambahkan',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reset form and close modal
                        jadwalForm.reset();
                        closeJadwalModal(); // Pastikan Anda memiliki fungsi ini
                        
                        // Reload or update table
                        location.reload();
                    }
                });
            },
            error: function (xhr) {
                // Error Handling
                console.error("Error Response:", xhr);
                
                let errorMessage = 'Terjadi kesalahan saat menambahkan jadwal dokter';
                
                // Check for specific error messages
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        // Validation errors
                        errorMessage = Object.values(xhr.responseJSON.errors)
                            .flat()
                            .join('\n');
                    } else if (xhr.responseJSON.message) {
                        // Server-specific error message
                        errorMessage = xhr.responseJSON.message;
                    }
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMessage
                });
            }
        });
    });
}

// Fungsi untuk menutup modal jadwal (pastikan sudah didefinisikan)
function closeJadwalModal() {
    const modal = document.querySelector("#doctorFormModal");
    const modalOverlay = document.querySelector(".modal-overlay");
    
    if (modal && modalOverlay) {
        modal.classList.add("modal-hidden");
        modalOverlay.classList.add("modal-hidden");
    }
}
    
    // Optional: Add some CSS to support the animation
    document.addEventListener('DOMContentLoaded', () => {
        const style = document.createElement('style');
        style.textContent = `
            .schedule-row {
                transition: max-height 0.3s ease, opacity 0.3s ease;
            }
        `;
        document.head.appendChild(style);
    });
    
    // Add this to your existing CSS or in a <style> tag
    document.addEventListener('DOMContentLoaded', () => {
        const style = document.createElement('style');
        style.textContent = `
            .schedule-row {
                overflow: hidden;
                max-height: 0;
                opacity: 0;
                transition: max-height 0.3s ease, opacity 0.3s ease;
            }
            
            .schedule-row.visible {
                max-height: 500px; /* Adjust based on your content */
                opacity: 1;
            }
        `;
        document.head.appendChild(style);
    });

    // Attach event listeners to existing and dynamically added buttons
    function attachScheduleListeners() {
        document.querySelectorAll('.btn-jadwal').forEach(button => {
            button.addEventListener('click', function() {
                toggleSchedule(this);
            });
        });
    }

    // Search Functionality
    function setupSearchListener() {
        $("#searchInput").on("input", function () {
            let query = $(this).val();

            $.ajax({
                url: "/cari-dokter",
                method: "GET",
                data: { query: query },
                success: function (response) {
                    $("#dokterTableContainer").html(response);
                    // Reattach listeners after table update
                    attachScheduleListeners();
                },
                error: function () {
                    console.log("Pencarian gagal. Coba lagi.");
                }
            });
        });
    }

    // Initialize listeners
    setupDropdownListeners();
    attachScheduleListeners();
    setupSearchListener();
});

// Delete Doctor Function
function deleteDoctor(id_dokter) {
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
            $.ajax({
                url: '/admin/dokter/' + id_dokter,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Dihapus!',
                        text: response.success || 'Dokter berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'custom-ok-button'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    Swal.fire(
                        'Terjadi kesalahan!',
                        xhr.responseJSON?.message || 'Gagal menghapus dokter',
                        'error'
                    );
                }
            });
        }
    });
}


function deleteJadwalDokter(id_jadwal_dokter) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat mengembalikan jadwal ini!",
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
            $.ajax({
                url: '/admin/jadwal-dokter/' + id_jadwal_dokter,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Dihapus!',
                        text: response.success || 'Jadwal dokter berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'custom-ok-button'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    Swal.fire(
                        'Terjadi kesalahan!',
                        xhr.responseJSON?.message || 'Gagal menghapus jadwal dokter',
                        'error'
                    );
                }
            });
        }
    });
}

// Event delegation untuk tombol hapus jadwal
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(e) {
        // Cari tombol hapus jadwal terdekat
        const hapusJadwalBtn = e.target.closest('.dropdown-item');
        
        if (hapusJadwalBtn && hapusJadwalBtn.textContent.trim().toLowerCase() === 'hapus') {
            e.preventDefault();
            
            // Temukan baris jadwal terdekat
            const scheduleRow = hapusJadwalBtn.closest('.schedule-row');
            
            // Dapatkan ID jadwal dari atribut data atau metode lain
            const id_jadwal_dokter = scheduleRow.dataset.jadwalId || 
                              scheduleRow.querySelector('[data-jadwal-id]')?.dataset.jadwalId;
            
            if (id_jadwal_dokter) {
                deleteJadwalDokter(id_jadwal_dokter);
            } else {
                console.error('ID Jadwal tidak ditemukan');
            }
        }
    });
});