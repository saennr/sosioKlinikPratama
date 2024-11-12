// script.js

// Placeholder untuk fungsionalitas Log Out
document.getElementById('logoutBtn').addEventListener('click', function() {
    window.location.href = '{{ route("login") }}';
});

// Placeholder untuk fungsionalitas Rekam Medis
document.querySelector('.medical-record').addEventListener('click', function() {
    alert('Opening Medical Record...');
});
