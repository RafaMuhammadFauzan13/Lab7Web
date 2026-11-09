<?php
// Eksperimen 3: Function untuk mengubah format harga menjadi Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

$contoh = [
    "Pensil" => 2500,
    "Buku Tulis" => 12000,
    "Tas Ransel" => 175000,
    "Laptop" => 8750000,
];

$error = null;
$hasil = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["harga"] ?? "";
    if (!is_numeric($input) || (float)$input < 0) {
        $error = "Masukkan harga berupa angka dan tidak negatif.";
    } else {
        $hasil = formatRupiah((float)$input);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 3 - Format Rupiah</title>
</head>
<body>
    <h1>Eksperimen 3 - Format Rupiah</h1>

    <form method="POST">
        <label>Harga <input name="harga" type="number" min="0" step="0.01" value="<?= htmlspecialchars($_POST["harga"] ?? "", ENT_QUOTES, "UTF-8") ?>" required></label>
        <button type="submit">Ubah ke Rupiah</button>
    </form>

    <?php if ($error): ?>
        <p><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>
    <?php elseif ($hasil !== null): ?>
        <p>Hasil: <strong><?= htmlspecialchars($hasil) ?></strong></p>
    <?php endif; ?>

    <h3>Contoh Daftar Harga</h3>
    <ul>
        <?php foreach ($contoh as $nama => $harga): ?>
            <li><?= htmlspecialchars($nama) ?>: <?= formatRupiah($harga) ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="../index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
