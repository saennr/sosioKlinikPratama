// Select elements
const buatJanji = document.getElementById("buat-janji");
const cekLab = document.getElementById("cek-lab");
const konsultasiOnline = document.getElementById("konsultasi-online");
const cekRadiologi = document.getElementById("cek-radiologi");
const jadwalDokter = document.getElementById("jadwal-dokter");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("close-popup");

function showPopup() {
    popup.style.display = "flex";
    popup.style.opacity = 0;
    setTimeout(() => {
      popup.style.opacity = 1;
    }, 10); // Smooth fade-in
  
    setTimeout(() => {
      popup.style.opacity = 0;
      setTimeout(() => {
        popup.style.display = "none";
      }, 500); // Smooth fade-out
    }, 3000); // Pop-up disappears after 3 seconds
}
  

// Add event listeners
buatJanji.addEventListener("click", () => {
  window.location.href = '{{ route("buatjanji") }}';
});

cekLab.addEventListener("click", showPopup);
cekRadiologi.addEventListener("click", showPopup);

jadwalDokter.addEventListener("click", () => {
  window.location.href = '{{ route("jadwaldok") }}';
});

// Close pop-up when clicking on the close button
closePopup.addEventListener("click", () => {
  popup.style.display = "none";
});


