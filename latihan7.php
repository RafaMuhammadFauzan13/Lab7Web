<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 7 - Pengolahan Data Sederhana</title>
</head>
<body>
    <h1>Latihan 7 - Pengolahan Data Sederhana</h1>

    <?php
    $error = null;
    $subtotal = null;

    // Mengubah angka menjadi format Rupiah
    function rupiah($angka) {
        return "Rp" . number_format($angka, 2, ",", ".");
    }

    // Proses data hanya jika form dikirim dengan metode POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $barang = trim($_POST["barang"] ?? "");
        $hargaInput = $_POST["harga"] ?? "";
        $jumlahInput = $_POST["jumlah"] ?? "";

        // Validasi di sisi server
        if ($barang === "" || !is_numeric($hargaInput) ||
            !ctype_digit((string)$jumlahInput) ||
            (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
            $error = "Periksa kembali nama barang, harga, dan jumlah.";
        } else {
            $harga = (float)$hargaInput;
            $jumlah = (int)$jumlahInput;
            $subtotal = $harga * $jumlah; // subtotal = harga x jumlah
        }
    }
    ?>

    <form method="POST">
        <label>Nama barang <input name="barang" value="<?= htmlspecialchars($_POST["barang"] ?? "", ENT_QUOTES, "UTF-8") ?>" required></label>
        <label>Harga <input name="harga" type="number" min="0" step="0.01" value="<?= htmlspecialchars($_POST["harga"] ?? "", ENT_QUOTES, "UTF-8") ?>" required></label>
        <label>Jumlah <input name="jumlah" type="number" min="1" step="1" value="<?= htmlspecialchars($_POST["jumlah"] ?? "", ENT_QUOTES, "UTF-8") ?>" required></label>
        <button type="submit">Hitung</button>
    </form>

    <?php if ($error !== null): ?>
        <p><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>
    <?php elseif ($subtotal !== null): ?>
        <h3>Hasil Perhitungan</h3>
        <p>Barang: <?= htmlspecialchars($barang) ?></p>
        <p>Harga satuan: <?= rupiah($harga) ?></p>
        <p>Jumlah: <?= $jumlah ?></p>
        <p>Subtotal (harga x jumlah): <strong><?= rupiah($subtotal) ?></strong></p>
    <?php endif; ?>

    <br>
    <a href="index.php">Kembali ke Daftar Latihan</a>
</body>
</html>