<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nama = trim($_POST["nama"] ?? "");
 $nim = trim($_POST["nim"] ?? "");
 $prodi = trim($_POST["prodi"] ?? "");
 $semesterInput = $_POST["semester"] ?? "";
 $email = trim($_POST["email"] ?? "");

 if ($nama === "") $error[] = "Nama wajib diisi.";
 if ($nim === "") $error[] = "NIM wajib diisi.";
 if ($prodi === "") $error[] = "Program studi wajib diisi.";

 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error[] = "Format email tidak valid.";
 }

 if (!ctype_digit((string)$semesterInput) ||
 (int)$semesterInput < 1 || (int)$semesterInput > 14) {
 $error[] = "Semester harus berupa angka 1–14.";
 }

 if (!$error) {
 $data = compact("nama", "nim", "prodi", "email");
 $data["semester"] = (int)$semesterInput;
 }
}

function e($teks) {
 return htmlspecialchars((string)$teks, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Mini Project - Formulir Data Mahasiswa</title>
</head>
<body>
 <h1>Formulir Data Mahasiswa</h1>

 <form method="POST" action="">
 <p>
 <label for="nama">Nama:</label><br>
 <input id="nama" name="nama" type="text" value="<?= e($_POST["nama"] ?? "") ?>" required>
 </p>
 <p>
 <label for="nim">NIM:</label><br>
 <input id="nim" name="nim" type="text" value="<?= e($_POST["nim"] ?? "") ?>" required>
 </p>
 <p>
 <label for="prodi">Program Studi:</label><br>
 <input id="prodi" name="prodi" type="text" value="<?= e($_POST["prodi"] ?? "") ?>" required>
 </p>
 <p>
 <label for="semester">Semester:</label><br>
 <input id="semester" name="semester" type="number" min="1" max="14" value="<?= e($_POST["semester"] ?? "") ?>" required>
 </p>
 <p>
 <label for="email">Email:</label><br>
 <input id="email" name="email" type="email" value="<?= e($_POST["email"] ?? "") ?>" required>
 </p>
 <button type="submit">Kirim</button>
 <button type="reset">Reset</button>
 </form>

 <?php if ($error): ?>
 <div>
 <strong>Terdapat kesalahan:</strong>
 <ul>
 <?php foreach ($error as $pesan): ?>
 <li><?= e($pesan) ?></li>
 <?php endforeach; ?>
 </ul>
 </div>
 <?php endif; ?>

 <?php if ($data): ?>
 <h3>Data Mahasiswa Diterima</h3>
 <table border="1" cellpadding="6">
 <tr><th>Nama</th><td><?= e($data["nama"]) ?></td></tr>
 <tr><th>NIM</th><td><?= e($data["nim"]) ?></td></tr>
 <tr><th>Program Studi</th><td><?= e($data["prodi"]) ?></td></tr>
 <tr><th>Semester</th><td><?= e($data["semester"]) ?></td></tr>
 <tr><th>Email</th><td><?= e($data["email"]) ?></td></tr>
 </table>
 <?php endif; ?>

 <br>
 <a href="index.php">Kembali ke Daftar Latihan</a>
</body>
</html>