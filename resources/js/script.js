const fileInput = document.getElementById('gambar');
const imagePreview = document.getElementById('imagePreview');

fileInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
    };

    reader.readAsDataURL(file);
});
