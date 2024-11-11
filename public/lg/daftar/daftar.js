function redirectToLogin(event) {
    event.preventDefault(); 
    window.location.href = '{{ route("login") }}';
  }
  