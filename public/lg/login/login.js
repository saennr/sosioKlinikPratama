// Prevent the form from submitting and redirect to the main page
function redirectToMain(event) {
  event.preventDefault(); // Mencegah form dari submit secara default
  window.location.href = "../../halamanutama/halamanutama.html"; // Sesuaikan path
}

// Add event listener for the "Daftar disini!" link
document.querySelector(".toggle").addEventListener("click", function(event) {
  event.preventDefault();
  window.location.href = "../daftar/daftar.html"; // Redirect to sign-up page (adjust path)
});

// Optional: Sign in with Google function placeholder
function signInWithGoogle() {
  alert("Fungsi Sign in with Google belum tersedia.");
}
