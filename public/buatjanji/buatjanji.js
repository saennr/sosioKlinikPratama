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
        .catch(error => console.error("Fetch error in loadDokter:", error));
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

            // Tambahkan event listener untuk memfilter tanggal saat jadwal dipilih
            jadwalDropdown.addEventListener("change", function () {
                const selectedOption = jadwalDropdown.options[jadwalDropdown.selectedIndex];
                const selectedDay = selectedOption.getAttribute("data-hari");
                if (selectedDay) {
                    filterTanggal(selectedDay); // Panggil fungsi filter dengan hari terpilih
                }
            });
        })
        .catch(error => console.error("Fetch error in loadJadwal:", error));
}


let currentFilterTanggalListener = null;

function filterTanggal(hari) {
    const tanggalInput = document.getElementById("tanggal");

    // Fungsi validasi tanggal
    const validateTanggal = () => {
        const selectedDate = new Date(tanggalInput.value);
        const dayOfWeek = selectedDate.toLocaleDateString("en-US", { weekday: 'long' });

        if (dayOfWeek !== hari) {
            alert(`Harap pilih tanggal yang jatuh pada hari ${hari}`);
            tanggalInput.value = ""; // Kosongkan input jika tanggal salah
        }
    };

    // Hapus listener lama jika ada
    if (currentFilterTanggalListener) {
        tanggalInput.removeEventListener("input", currentFilterTanggalListener);
    }

    // Tambahkan listener baru
    currentFilterTanggalListener = validateTanggal;
    tanggalInput.addEventListener("input", currentFilterTanggalListener);
}




document.getElementById("btn-submit").addEventListener("click", function (event) {
    const spesialisDropdown = document.getElementById("spesialis");
    const dokterDropdown = document.getElementById("dokter");
    const jadwalDropdown = document.getElementById("jadwal");
    const tanggalInput = document.getElementById("tanggal");
    const keluhanInput = document.getElementById("keluhan");

    // Validasi input sebelum pengiriman
    if (spesialisDropdown.value === "default") {
        alert("Harap pilih spesialis dokter.");
        spesialisDropdown.focus();
        event.preventDefault();
        return;
    }

    if (dokterDropdown.value === "default") {
        alert("Harap pilih dokter.");
        dokterDropdown.focus();
        event.preventDefault();
        return;
    }

    if (jadwalDropdown.value === "default") {
        alert("Harap pilih jadwal dokter.");
        jadwalDropdown.focus();
        event.preventDefault();
        return;
    }

    if (!tanggalInput.value) {
        alert("Harap pilih tanggal.");
        tanggalInput.focus();
        event.preventDefault();
        return;
    }

    if (!keluhanInput.value.trim()) {
        alert("Harap isi keluhan atau sakit yang dirasakan.");
        keluhanInput.focus();
        event.preventDefault();
        return;
    }
});

document.getElementById("buatJanjiForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Mencegah pengiriman form default

    const form = event.target;
    const formData = new FormData(form);

    // Kirim data ke server menggunakan AJAX
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
                // Tampilkan SweetAlert dan alihkan ke halaman utama
                Swal.fire({
                    title: "Reservasi Berhasil!",
                    text: "Detail Reservasi telah dikirim ke email anda",
                    icon: "success",
                }).then(() => {
                    window.location.href = "/beranda"; // Ubah ke route halaman utama Anda
                });
            } else {
                alert(data.message || "Terjadi kesalahan. Silakan coba lagi.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan. Silakan coba lagi.");
        });
});

