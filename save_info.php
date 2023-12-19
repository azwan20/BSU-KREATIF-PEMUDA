<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $keterangan = $_POST["keterangan"];
    $gambar = $_POST["gambar"];
    $harga = $_POST["harga"];

    // Lakukan update data di database sesuai dengan ID
    $sql = "UPDATE dashboard SET sampah='$nama', keterangan='$keterangan', gambar='$gambar', harga='$harga' WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Data berhasil diupdate";
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
} else {
    echo "Invalid request";
}