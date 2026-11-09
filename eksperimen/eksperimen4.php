<?php
// Eksperimen 4: Validasi NIM - hanya angka dan panjang tepat 9 digit
const PANJANG_NIM = 9; // ketentuan yang ditetapkan

$error = [];
$data = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $error[] = "NIM hanya boleh berisi angka.";
    } elseif (strlen($nim) !== PANJANG_NIM) {
        $error[] = "NIM harus tepat " . PANJANG_NIM . " digit (Anda memasukkan " . strlen($nim) . " digit).";
    }

    if (!$error) {
        $data = ["nama" => $nama, "nim" => $nim];
    }
}
function e($t) { return htmlspecialchars((string)$t, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 4 - Validasi NIM</title>
    <style>
        .error { color: #b91c1c; background: #fee2e2; border: 1px solid #ef4444; padding: 8px 12px; }
        .valid { color: #166534; background: #dcfce7; border: 1px solid #22c55e; padding: 8px 12px; }
        .error ul, .valid p { margin: 4px 0; }
    </style>
</head>
<body>
    <h1>Eksperimen 4 - Validasi NIM</h1>
    <p>Aturan: NIM hanya berisi angka dan tepat <?= PANJANG_NIM ?> digit.</p>

    <form method="POST">
        <label>Nama <input name="nama" value="<?= e($_POST["nama"] ?? "") ?>"></label>
        <label>NIM <input name="nim" value="<?= e($_POST["nim"] ?? "") ?>"></label>
        <button type="submit">Kirim</button>
    </form>
    <br>
    <?php if ($error): ?>
        <div class="error">
            <strong>ERROR:</strong>
            <ul><?php foreach ($error as $m): ?><li><?= e($m) ?></li><?php endforeach; ?></ul>
        </div>
    <?php elseif ($data): ?>
        <div class="valid">
            <strong>NIM VALID</strong>
            <p>Nama: <?= e($data["nama"]) ?></p>
            <p>NIM: <?= e($data["nim"]) ?></p>
        </div>
    <?php endif; ?>
    <br>

    <a href="../index.php">Kembali ke Daftar Latihan</a>
</body>
</html>