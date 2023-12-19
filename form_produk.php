<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST["nama"];
    $produk = $_POST["produk"];
    $alamat = $_POST["alamat"];
    $nomorHP = $_POST["nomorHP"];
    $jumlahProduk = $_POST["jumlahProduk"];
    $tanggal = $_POST["date"];

    $insertSql = "INSERT INTO formproduk (nama, produk, alamat, nomor_hp, jumlah, date)
                  VALUES ('$nama', '$produk', '$alamat', '$nomorHP', '$jumlahProduk', '$tanggal')";

    if ($conn->query($insertSql) === TRUE) {
        echo "<script>window.location.href = 'preorder_produk.php';</script>";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<?php include 'header.php' ?>

<style>
    /* Your custom styles */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .popup {
        display: none;
        position: fixed;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 600px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .close-btn {
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<div class="riwayat produk d-flex fill">
    <div class="riwayatSampah second" style="background: rgba(93, 208, 209, 0.80);">
        <span class="d-flex buttons" style="justify-content: right;">
            <span class="d-flex" style="justify-content: space-between; width: 100%">
                <h3 style="color:#273E9F">PRODUK HASIL DAUR ULANG SAMPAH</h3>
                <button type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                    TERTARIK DENGAN PRODUK? PREORDER DI SINI
                </button>
            </span>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Pembelian Produk Daur Ulang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="formPembelian">
                                <form action="" method="post">
                                    <section>
                                        <span>
                                            <p>Nama Nasabah</p>
                                            <input type="text" name="nama" id="">
                                        </span>
                                        <span>
                                            <p>Nama produk</p>
                                            <select name="produk" id="">
                                                <option value="keranjang plastik daur ulang handmade by UMKS IRT">Keranjang Plastik</option>
                                                <option value="POT Botol Plastik handmade">POT Botol Plastik handmade</option>
                                                <option value="Bunga Rangkai dari Logam Bekas">Bunga Rangkai dari Logam Bekas</option>
                                                <option value="Lampu Berbentuk Kupu-Kupu dari Logam Bekas">Lampu Berbentuk Kupu-Kupu </option>
                                                <option value="Keramik dari Beling">Keramik dari Beling</option>
                                                <option value="Keranjang dari Gelas Plastik Minuman">Keranjang dari Gelas Plastik</option>
                                            </select>
                                        </span>
                                    </section>
                                    <section>
                                        <span>
                                            <p>Alamat pengiriman</p>
                                            <textarea type="text" name="alamat" id=""></textarea>
                                        </span>
                                        <span>
                                            <div>
                                                <p>Nomor HP :</p>
                                                <input type="text" name="nomorHP" id="">
                                            </div>
                                            <div>
                                                <p>Jumlah produk :</p>
                                                <input type="text" name="jumlahProduk" id="">
                                            </div>
                                            <div>
                                                <p>Tanggal pembelian :</p>
                                                <input type="date" name="date" id="">
                                            </div>
                                        </span>
                                    </section>
                                    <div class="d-flex" style="justify-content: center;">
                                        <button type="button">BATAL</button>
                                        <button type="submit">KIRIM</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <div class="d-flex dash" style="margin-bottom: 20px;">
            <?php
            if ($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $gambar = $row["gambar"];
                    $nama = $row["nama"];
                    $harga = $row["harga"];
            ?>
                    <div class="dashCard cards">
                        <section class="d-flex" style="justify-content: center; border-radius: 20px;">
                            <span>
                                <img width="100%" height="170px" style="margin: auto; border-radius: 20px 20px 0 0;" src="<?php echo $gambar ?>" alt="">
                            </span>
                        </section>
                        <section class="header" style="border-radius: 0;">
                            <h5 style="text-align: center; color: #fff;"><?php echo $nama; ?></h5>
                        </section>
                        <section class="d-flex" style="justify-content: right;">
                            <h4 style="margin-right: 10px; color: #273E9F;">Rp <?php echo $harga; ?></h4>
                        </section>
                    </div>
                <?php
                    $count++;
                    if ($count == 3) {
                        echo '</div><div class="d-flex dash" style="margin-bottom: 20px;">';
                        $count = 0;
                    }
                }
            } else {
                ?>
                <div class="infoItem">
                    <div class="infoIsi">
                        <img src="path_to_default_image.jpg" alt="Default Image" style="width: 100%;">
                    </div>
                    <p style="text-align: center;">Default Title</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script>
    // Your custom JS for handling custom pop-up
    function openPopup() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
    }
</script>

<?php include 'footer.php' ?>