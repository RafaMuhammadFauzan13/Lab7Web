<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 5 - Form GET</title>
</head>
<body>
    <h1>Latihan 5 - Form GET</h1>

    <!-- cari.php -->
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>
    <?php
    if (isset($_GET["kata"])) {
        $kata = trim($_GET["kata"]);
        echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
    }
    ?>

    <br><br>
    <a href="index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
