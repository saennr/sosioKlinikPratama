function redirectToMain(event) {
  event.preventDefault(); 
  window.location.href = '{{ route("halamanutama") }}';
}

document.querySelector(".toggle").addEventListener("click", function(event) {
  event.preventDefault();
  window.location.href = '{{ route("daftar") }}';
});

function signInWithGoogle() {
  alert("Fungsi Sign in with Google belum tersedia.");
}
