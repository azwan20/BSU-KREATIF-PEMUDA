<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $berat = $_POST["berat"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $harga = $_POST["harga"];

    $insertSql = "INSERT INTO form_penjualan (nama, jenis, berat, alamat, no_hp, harga)
                  VALUES ('$nama', '$jenis', '$berat', '$alamat', '$no_hp', '$harga')";

    if ($conn->query($insertSql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan');</script>";
        // echo "<script>window.alert.href = 'riwayat_sampah.php';</script>";
    } else {
        // Error in insertion
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<?php include 'header.php' ?>

<div class="riwayat d-flex fill">
    <div class="riwayatSampah">
        <span class="d-flex" style="justify-content: center;">
            <h1>FORMULIR PENJUALAN SAMPAH</h1>
        </span>
        <div class="penjualan">
            <form action="" method="post">
                <section class="d-flex head">
                    <span>
                        <p>Nama Nasabah</p>
                        <input type="text" name="nama" id="">
                    </span>
                    <span>
                        <p>Jenis Sampah</p>
                        <select name="jenis" id="" style="width : 150px">
                            <option value="palstik">PLASTIK</option>
                            <option value="logam">LOGAM</option>
                            <option value="besi">BESI</option>
                            <option value="kaca">KACA</option>
                        </select>
                    </span>
                    <span>
                        <p>Berat Sampah</p>
                        <input type="text" name="berat" id="">
                    </span>
                </section>
                <section class="d-flex">
                    <span>
                        <p>Alamat pengambilan</p>
                        <input type="text" name="alamat" id="" style="height: 170px;">
                    </span>
                    <div>
                        <div class="d-flex" style="margin-bottom: 80px;">
                            <span>
                                <p>Nomor Handphone</p>
                                <input type="text" name="no_hp" id="">
                            </span>
                            <span style="margin-left: 80px;">
                                <p>Harga</p>
                                <input type="text" name="harga" id="harga" readonly>
                            </span>
                        </div>
                        <span class="d-flex" style="justify-content: right;">
                            <button type="button">BATAL</button>
                            <button type="submit">KIRIM</button>
                        </span>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var jenisSampah = document.querySelector('select[name="jenis"]');
        var beratSampah = document.querySelector('input[name="berat"]');
        var hargaInput = document.querySelector('input[name="harga"]');

        jenisSampah.addEventListener('change', updateHarga);
        beratSampah.addEventListener('input', updateHarga);

        function updateHarga() {
            var hargaPerKg = 0;

            switch (jenisSampah.value) {
                case 'palstik':
                    hargaPerKg = 1300;
                    break;
                case 'besi':
                case 'logam':
                    hargaPerKg = 3000;
                    break;
                case 'kaca':
                    hargaPerKg = 2000;
                    break;
                default:
                    hargaPerKg = 0;
            }

            var berat = parseFloat(beratSampah.value) || 0;
            var totalHarga = berat * hargaPerKg;

            hargaInput.value = totalHarga;
        }
    });
</script>

<?php include 'footer.php' ?>