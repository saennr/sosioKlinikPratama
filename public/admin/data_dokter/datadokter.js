document.addEventListener("DOMContentLoaded", function () {
    // Modal Handling
    const modal = document.querySelector("#doctorFormModal");   
    const modalOverlay = document.querySelector(".modal-overlay");
    const btnDokter = document.querySelector(".btn-dokter");
    const closeBtn = document.querySelector(".close-btn");
    const dropdownEditItem = document.querySelector(".dropdown-item");
    const editForm= document.querySelector("#editDokterForm");  
    const doctorForm = document.querySelector("#doctorForm");
    // Tambah Jadwal Modal Handling
    const btnTambahJadwal = document.querySelectorAll('#btn-tambahJadwal');
    const jadwalForm = document.querySelector("#jadwalForm");


    // dropdownEditItem.addEventListener("click", (event) => {
    //         console.log("Edit button clicked!"); // Harus muncul di konsol
    //         modal.classList.remove("modal-hidden");
    //         modalOverlay.classList.remove("modal-hidden");
    //     });
    
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

    // Function to open edit Modal
    function openEditModal() {
        if (editForm.closest('.modal-hidden')) {
            editForm.closest('#doctorFormModal').classList.remove("modal-hidden");
            document.querySelector(".modal-overlay").classList.remove("modal-hidden");
        }
    }
    
     // Function to close Edit Modal
     function closeEditModal() {
        if (editForm) {
            editForm.closest('#doctorFormModal').classList.add("modal-hidden");
            document.querySelector(".modal-overlay").classList.add("modal-hidden");
        }
    }
    
    // Event Listener for Dropdown Edit Item
    if (dropdownEditItem) {
        dropdownEditItem.addEventListener('click', function(e) {
            e.preventDefault();
            



            // Change modal title
            document.querySelector("#doctorFormModal h3").textContent = "Edit Dokter";
            
            // Hide other forms
            document.querySelector("#doctorForm").style.display = 'none';
            document.querySelector("#jadwalForm").style.display = 'none';
            
            // Show edit form
            editForm.style.display = 'block';
            
            // Open modal
            openEditModal();

            // Find the closest row to extract current data
            const row = this.closest('.row');
            const dokterData = {
                id: row.dataset.doctorId || row.querySelector('[name="id_dokter"]')?.value,
                nama: row.querySelector('.nama-dokter')?.textContent,
                spesialis: row.querySelector('.spesialis')?.textContent,
                noTelepon: row.querySelector('.no-telepon')?.textContent,
                hari: row.querySelector('.hari')?.textContent
            };

            // Fill edit form
            editForm.querySelector("#edit_id_dokter").value = dokterData.id;
            editForm.querySelector("#edit_nama_dokter").value = dokterData.nama;
            editForm.querySelector("#edit_id_spesialis").value = dokterData.spesialis;
            editForm.querySelector("#edit_no_telepon").value = dokterData.noTelepon;
            editForm.querySelector("#edit_hari").value = dokterData.hari;
        });
    }

    // Close button for Edit Modal
    const closeEditBtn = editForm.querySelector('.close-btn');
    if (closeEditBtn) {
        closeEditBtn.addEventListener('click', function() {
            // Reset modal to original state
            document.querySelector("#doctorFormModal h3").textContent = "Tambah Dokter";
            document.querySelector("#doctorForm").style.display = 'block';
            editForm.style.display = 'none';
            closeEditModal();
        });
    }

    // Edit Form Submission
    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Collect form data
            const formData = new FormData(editForm);

            // Validate form data
            const nama_dokter = formData.get('edit_nama_dokter');
            const id_spesialis = formData.get('edit_id_spesialis');
            const no_telepon = formData.get('edit_no_telepon');
            const hari = formData.get('edit_hari');

            // Basic client-side validation
            if (!nama_dokter || !id_spesialis || !no_telepon || !hari) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validasi Gagal',
                    text: 'Mohon isi semua field yang diperlukan'
                });
                return;
            }

            // AJAX Submission for Edit
            $.ajax({
                url: "/update-dokter", // Adjust to your update route
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message || 'Dokter berhasil diupdate',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            editForm.reset();
                            closeEditModal();
                            location.reload();
                        }
                    });
                },
                error: function (xhr) {
                    console.error("Error Response:", xhr);
                    
                    let errorMessage = 'Terjadi kesalahan saat mengupdate dokter';
                    
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors)
                                .flat()
                                .join('\n');
                        } else if (xhr.responseJSON.message) {
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
    if (editForm) {
        editForm.style.display = 'none';
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