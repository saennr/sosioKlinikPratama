function showCategory(category) {
    // Hide both sections
    document.getElementById('spesialis').style.display = 'none';
    document.getElementById('umum').style.display = 'none';

    // Show the selected section
    if (category === 'spesialis') {
        document.getElementById('spesialis').style.display = 'block';
    } else if (category === 'umum') {
        document.getElementById('umum').style.display = 'block';
    }
}
