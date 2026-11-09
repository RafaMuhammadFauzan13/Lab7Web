<?php
// Eksperimen 5: Tombol reset vs pemrosesan ulang di server
$diproses = false;
$nama = $email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $diproses = true;
}
function e($t) { return htmlspecialchars((string)$t, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 5 - Reset vs Proses Ulang</title>
</head>
<body>
    <h1>Eksperimen 5 - Reset vs Proses Ulang</h1>

    <form method="POST" action="">
        <label>Nama <input name="nama" value="<?= e($nama) ?>"></label>
        <label>Email <input name="email" type="email" value="<?= e($email) ?>"></label>
        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
        <a href="eksperimen5.php">Kosongkan</a>
    </form>

    <h3><?= $diproses ? "Data diterima server" : "Belum ada data dikirim" ?></h3>
    <p>Waktu server memproses halaman: <strong><?= date("H:i:s") ?></strong></p>
    <?php if ($diproses): ?>
        <p>Nama: <?= e($nama) ?></p>
        <p>Email: <?= e($email) ?></p>
    <?php endif; ?>

    <h3>Perbedaannya</h3>
    <p><strong>Reset</strong> hanya bekerja di browser (client-side): isian dikembalikan ke nilai awal atribut value, tanpa mengirim permintaan ke server. Waktu server tidak berubah. Setelah data dikirim, nilai awal form adalah data yang dikirim tadi, sehingga Reset mengembalikan isian ke data tersebut, bukan mengosongkannya.</p>
    <p><strong>Kirim / Kosongkan</strong> membuat permintaan baru ke server, PHP menjalankan ulang seluruh skrip, dan halaman dibuat ulang. Waktu server berubah. Kosongkan memuat ulang halaman tanpa data POST, sehingga form benar-benar kosong.</p>

    <a href="../index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
