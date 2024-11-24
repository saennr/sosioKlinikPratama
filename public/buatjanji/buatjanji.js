function loadDokter(idSpesialis) {
    console.log("Fetching dokter for spesialis ID:", idSpesialis);
    fetch(`/getDokterBySpesialis/${idSpesialis}`)
        .then(response => response.json())
        .then(data => {
            console.log("Dokter data:", data);
            let dokterDropdown = document.getElementById("dokter");
            dokterDropdown.innerHTML = '<option value="default">Pilih Dokter</option>';
            data.forEach(dokter => {
                dokterDropdown.innerHTML += `<option value="${dokter.id_dokter}">${dokter.nama_dokter} ${dokter.hari}</option>`;
            });
        })
        .catch(error => {
            Swal.fire({
                title: "Error",
                text: "Terjadi kesalahan saat mengambil data dokter. Silakan coba lagi.",
                icon: "error",
                customClass: {
                    confirmButton: 'custom-ok-button'
                }
            });
            console.error("Fetch error in loadDokter:", error);
        });
}

function loadJadwal(idDokter) {
    fetch(`/getJadwalByDokter/${idDokter}`)
        .then(response => response.json())
        .then(data => {
            let jadwalDropdown = document.getElementById("jadwal");
            jadwalDropdown.innerHTML = '<option value="default">Pilih Jadwal Dokter</option>';
            data.forEach(jadwal => {
                jadwalDropdown.innerHTML += `<option value="${jadwal.id_jadwal_dokter}" data-hari="${jadwal.hari}">${jadwal.formatted_jadwal}</option>`;
            });

            jadwalDropdown.addEventListener("change", function () {
                const selectedOption = jadwalDropdown.options[jadwalDropdown.selectedIndex];
                const selectedDay = selectedOption.getAttribute("data-hari");
                if (selectedDay) {
                    filterTanggal(selectedDay);
                }
            });
        })
        .catch(error => {
            Swal.fire({
                title: "Error",
                text: "Terjadi kesalahan saat mengambil data jadwal. Silakan coba lagi.",
                icon: "error",
                customClass: {
                    confirmButton: 'custom-ok-button'
                }
            });
            console.error("Fetch error in loadJadwal:", error);
        });
}

let currentFilterTanggalListener = null;

function filterTanggal(hari) {
    const tanggalInput = document.getElementById("tanggal");

    const validateTanggal = () => {
        const selectedDate = new Date(tanggalInput.value);
        const dayOfWeek = selectedDate.toLocaleDateString("en-US", { weekday: 'long' });

        if (dayOfWeek !== hari) {
            Swal.fire({
                title: "Peringatan",
                text: `Harap pilih tanggal yang jatuh pada hari ${hari}.`,
                icon: "error",
                customClass: {
                    confirmButton: 'custom-ok-button'
                }
            });
            tanggalInput.value = "";
        }
    };

    if (currentFilterTanggalListener) {
        tanggalInput.removeEventListener("input", currentFilterTanggalListener);
    }

    currentFilterTanggalListener = validateTanggal;
    tanggalInput.addEventListener("input", currentFilterTanggalListener);
}

document.getElementById("btn-submit").addEventListener("click", function (event) {
    const spesialisDropdown = document.getElementById("spesialis");
    const dokterDropdown = document.getElementById("dokter");
    const jadwalDropdown = document.getElementById("jadwal");
    const tanggalInput = document.getElementById("tanggal");
    const keluhanInput = document.getElementById("keluhan");

    if (spesialisDropdown.value === "default") {
        Swal.fire({
            title: "Peringatan",
            text: "Harap pilih spesialis dokter.",
            icon: "warning",
            customClass: {
                confirmButton: 'custom-ok-button'
            }
        });
        spesialisDropdown.focus();
        event.preventDefault();
        return;
    }

    if (dokterDropdown.value === "default") {
        Swal.fire({
            title: "Peringatan",
            text: "Harap pilih dokter.",
            icon: "warning",
            customClass: {
                confirmButton: 'custom-ok-button'
            }
        });
        dokterDropdown.focus();
        event.preventDefault();
        return;
    }

    if (jadwalDropdown.value === "default") {
        Swal.fire({
            title: "Peringatan",
            text: "Harap pilih jadwal dokter.",
            icon: "warning",
            customClass: {
                confirmButton: 'custom-ok-button'
            }
        });
        jadwalDropdown.focus();
        event.preventDefault();
        return;
    }

    if (!tanggalInput.value) {
        Swal.fire({
            title: "Peringatan",
            text: "Harap pilih tanggal.",
            icon: "warning",
            customClass: {
                confirmButton: 'custom-ok-button'
            }
        });
        tanggalInput.focus();
        event.preventDefault();
        return;
    }

    if (!keluhanInput.value.trim()) {
        Swal.fire({
            title: "Peringatan",
            text: "Harap isi keluhan atau sakit yang dirasakan.",
            icon: "warning",
            customClass: {
                confirmButton: 'custom-ok-button'
            }
        });
        keluhanInput.focus();
        event.preventDefault();
        return;
    }
});

document.getElementById("buatJanjiForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Reservasi Berhasil!",
                    text: "Detail reservasi bisa dicek di Profile > Riwayat.",
                    icon: "success",
                    customClass: {
                        confirmButton: 'custom-ok-button'
                    }
                }).then(() => {
                    window.location.href = "/beranda";
                });
            } else {
                Swal.fire({
                    title: "Gagal",
                    text: data.message || "Terjadi kesalahan. Silakan coba lagi.",
                    icon: "error",
                    customClass: {
                        confirmButton: 'custom-ok-button'
                    }
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: "Error",
                text: "Terjadi kesalahan saat mengirim data. Silakan coba lagi.",
                icon: "error",
                customClass: {
                    confirmButton: 'custom-ok-button'
                }
            });
            console.error("Error:", error);
        });
});
