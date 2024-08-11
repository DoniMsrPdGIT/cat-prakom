
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Testimonial Alumni CAT-Prakom yang Lulus</title>
<style>
    body {
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        background-color: #f4f4f4;
    }
    .container {
        padding: 5px;
    }
    .container img {
        width: 100%; /* Menyesuaikan lebar gambar dengan lebar container */
        height: auto; /* Untuk menjaga aspek rasio gambar */
        margin-bottom: 10px;
    }
    @media (min-width: 600px) {
        .container {
            width: calc(50% - 10px);
        }
    }
    @media (min-width: 900px) {
        .container {
            width: calc(33.333% - 10px);
        }
    }
</style>
</head>
<body>

<!-- Looping untuk menampilkan gambar -->
<!-- Ganti 'path/to/your/images/' dengan lokasi aktual dari gambar Anda -->
<?php for ($i = 1; $i <= 66; $i++): ?>
    <div class="container">
        <img src="../uploads/testimonial/CAT_Prakom_<?php echo $i; ?>.jpg" alt="CAT_Prakom_<?php echo $i; ?>">
    </div>
<?php endfor; ?>

</body>
</html>

