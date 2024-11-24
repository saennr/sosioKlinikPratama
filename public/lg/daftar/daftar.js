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


