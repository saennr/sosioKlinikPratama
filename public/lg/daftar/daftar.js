function redirectToLogin(event) {
    event.preventDefault(); 
    window.location.href = '{{ route("login") }}';
}

document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.sign-up-form');
  const passwordInput = document.getElementById('password');

  form.addEventListener('submit', function(event) {
      // Check password length
      if (passwordInput.value.length < 8) {
          event.preventDefault(); // Prevent form submission

          // Show SweetAlert notification
          Swal.fire({
              icon: 'error',
              title: 'Password terlalu pendek',
              text: 'Password harus memiliki minimal 8 karakter.',
              confirmButtonText: 'OK',
              customClass: {
                confirmButton: 'custom-ok-button'
              }
          });

          passwordInput.focus(); // Focus on the password field
      }
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.sign-up-form');
  const noIdentitasInput = document.getElementById('no_identitas'); // Ambil input no_identitas
  const passwordInput = document.getElementById('password');

  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Cegah form untuk submit langsung

      const noIdentitas = noIdentitasInput.value;

      // Cek apakah no_identitas sudah terdaftar dengan AJAX request
      fetch('/check-no-identitas', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ no_identitas: noIdentitas })
      })
      .then(response => response.json())
      .then(data => {
          if (data.exists) {
              // Jika no_identitas sudah terdaftar, tampilkan SweetAlert
              Swal.fire({
                  icon: 'error',
                  title: 'Nomor Identitas Sudah Terdaftar',
                  text: 'Nomor identitas ini sudah digunakan. Silakan gunakan nomor identitas lain.',
                  confirmButtonText: 'OK',
                  customClass: {
                      confirmButton: 'custom-ok-button'
                  }
              });
          } else {
              // Jika no_identitas belum terdaftar, lanjutkan submit form
              form.submit();
          }
      })
      .catch(error => {
          console.error('Error:', error);
      });
  });
});


