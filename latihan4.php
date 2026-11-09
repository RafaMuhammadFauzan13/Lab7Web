<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan 4 - Function</title>
</head>
<body>
    <h1>Latihan 4 - Function</h1>

    <?php
    function hitungDiskon($harga, $persen) {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }

    // Function tambahan sesuai instruksi modul
    function hitungLuasPersegiPanjang($panjang, $lebar) {
        return $panjang * $lebar;
    }

    function tentukanKelulusan($nilai) {
        return $nilai >= 60 ? "Lulus" : "Tidak Lulus";
    }

    $hargaAkhir = hitungDiskon(150000, 10);
    echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";
    echo "Luas persegi panjang (8 x 4): " . hitungLuasPersegiPanjang(8, 4) . "<br>";
    echo "Kelulusan (nilai 78): " . tentukanKelulusan(78);
    ?>

    <br>
    <a haref="index.php">Kembali ke Daftar Latihan</a>
</body>
</html>
