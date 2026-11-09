<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 3 - Perulangan dan Array</title>
</head>
<body>
    <h1>Latihan 3 - Perulangan dan Array</h1>
    
    <?php
    // Tiga nama baru (Eka, Fajar, Gita) ditambahkan sesuai instruksi modul
    $mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];
    echo "<h3>Daftar Mahasiswa</h3><ol>";
    foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
    }
    echo "</ol>";
    ?>

    <br>
    <a href="index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
