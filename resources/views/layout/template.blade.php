<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  </head>
  <style>
    body {
        font-family: "Poppins", sans-serif;
    }

    a {
      text-decoration: none;
    }
  </style>
  <body class="bg-body-secondary">
    <main>
        @yield('konten')
    </main>

    <script>
        function showFullText(button) {
         var container = button.parentNode;
         var shortText = container.querySelector('.judul-limited');
         var fullText = container.querySelector('.judul-full');
         var lihatSelengkapnyaButton = container.querySelector('.lihat-selengkapnya');
         var tutupButton = container.querySelector('.tutup');

         shortText.style.display = 'none';
         fullText.style.display = 'inline';
         lihatSelengkapnyaButton.style.display = 'none';
         tutupButton.style.display = 'inline';
     }

     function hideFullText(button) {
         var container = button.parentNode;
         var shortText = container.querySelector('.judul-limited');
         var fullText = container.querySelector('.judul-full');
         var lihatSelengkapnyaButton = container.querySelector('.lihat-selengkapnya');
         var tutupButton = container.querySelector('.tutup');

         shortText.style.display = 'inline';
         fullText.style.display = 'none';
         lihatSelengkapnyaButton.style.display = 'inline';
         tutupButton.style.display = 'none';
     }

     var passwordField = document.getElementById('passwordField');
    var togglePassword = document.getElementById('togglePassword');
    var toggleIcon = document.getElementById('icon')

    togglePassword.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        }
    });

    var passwordFields = document.getElementById('password_confirmation');
    var togglePasswords = document.getElementById('togglePasswords');
    var toggleIcons = document.getElementById('icons')

    togglePasswords.addEventListener('click', function() {
        if (passwordFields.type === 'password') {
            passwordFields.type = 'text';
            toggleIcons.classList.remove('bi-eye-slash');
            toggleIcons.classList.add('bi-eye');
        } else {
            passwordFields.type = 'password';
            toggleIcons.classList.remove('bi-eye');
            toggleIcons.classList.add('bi-eye-slash');
        }
    });

    var passwordField1 = document.getElementById('password');
    var togglePassword1 = document.getElementById('togglePassword');
    var toggleIcon1 = document.getElementById('icon')

    togglePassword1.addEventListener('click', function() {
        if (passwordField1.type === 'password') {
            passwordField1.type = 'text';
            toggleIcon1.classList.remove('bi-eye-slash');
            toggleIcon1.classList.add('bi-eye');
        } else {
            passwordField1.type = 'password';
            toggleIcon1.classList.remove('bi-eye');
            toggleIcon1.classList.add('bi-eye-slash');
        }
    });

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


     </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
