<?php
// Eksperimen 2: Pencarian nama dari array data sederhana dengan metode GET
$dataMahasiswa = [
    "Alya Putri", "Bima Saputra", "Citra Lestari", "Doni Pratama",
    "Eka Wijaya", "Fajar Nugraha", "Gita Ayu", "Hana Citra", "Indra Maulana"
];

$kata = null;
$hasil = [];

if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    if ($kata !== "") {
        foreach ($dataMahasiswa as $nama) {
            if (stripos($nama, $kata) !== false) { // tidak membedakan huruf besar/kecil
                $hasil[] = $nama;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 2 - Pencarian Nama (GET)</title>
</head>
<body>
    <h1>Eksperimen 2 - Pencarian Nama (GET)</h1>

    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text" value="<?= htmlspecialchars($kata ?? "", ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Cari</button>
    </form>

    <?php if ($kata !== null): ?>
        <?php if ($kata === ""): ?>
            <p><strong>Error:</strong> Kata kunci tidak boleh kosong.</p>
        <?php elseif ($hasil): ?>
            <h3>Ditemukan <?= count($hasil) ?> nama untuk "<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>"</h3>
            <ol><?php foreach ($hasil as $n): ?><li><?= htmlspecialchars($n) ?></li><?php endforeach; ?></ol>
        <?php else: ?>
            <p>Tidak ada nama yang cocok dengan "<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>".</p>
        <?php endif; ?>
    <?php endif; ?>

    <p><em>Perhatikan URL di address bar setelah menekan Cari: kata kunci muncul sebagai parameter ?kata=...</em></p>

    <a href="../index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
