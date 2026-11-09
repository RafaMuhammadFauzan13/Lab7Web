<?php
// Eksperimen 1: Perhitungan nilai rata-rata dari tiga komponen nilai
$error = [];
$rataRata = null;

function hitungRataRata($a, $b, $c) {
    return ($a + $b + $c) / 3;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nilai = [];
    foreach (["tugas" => "Tugas", "uts" => "UTS", "uas" => "UAS"] as $k => $label) {
        $input = $_POST[$k] ?? "";
        if (!is_numeric($input) || (float)$input < 0 || (float)$input > 100) {
            $error[] = "Nilai $label harus berupa angka 0–100.";
        } else {
            $nilai[$k] = (float)$input;
        }
    }
    if (!$error) {
        $rataRata = hitungRataRata($nilai["tugas"], $nilai["uts"], $nilai["uas"]);
        $predikat = $rataRata >= 85 ? "A" : ($rataRata >= 75 ? "B" : ($rataRata >= 60 ? "C" : "D"));
    }
}
function nilaiLama($k) { return htmlspecialchars($_POST[$k] ?? "", ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 1 - Nilai Rata-rata</title>
</head>
<body>
    <h1>Eksperimen 1 - Nilai Rata-rata</h1>

    <form method="POST">
        <label>Tugas <input name="tugas" type="number" min="0" max="100" step="0.01" value="<?= nilaiLama("tugas") ?>" required></label>
        <label>UTS <input name="uts" type="number" min="0" max="100" step="0.01" value="<?= nilaiLama("uts") ?>" required></label>
        <label>UAS <input name="uas" type="number" min="0" max="100" step="0.01" value="<?= nilaiLama("uas") ?>" required></label>
        <button type="submit">Hitung</button>
    </form>

    <?php if ($error): ?>
        <p><strong>Error:</strong></p>
        <ul><?php foreach ($error as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?></ul>
    <?php elseif ($rataRata !== null): ?>
        <h3>Hasil Perhitungan</h3>
        <p>Tugas: <?= number_format($nilai["tugas"], 2) ?></p>
        <p>UTS: <?= number_format($nilai["uts"], 2) ?></p>
        <p>UAS: <?= number_format($nilai["uas"], 2) ?></p>
        <p>Rata-rata: <strong><?= number_format($rataRata, 2) ?></strong></p>
        <p>Predikat: <strong><?= $predikat ?></strong></p>
    <?php endif; ?>

    <br>
    <a href="../index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
