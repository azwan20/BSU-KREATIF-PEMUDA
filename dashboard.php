<?php

include 'koneksi.php';

$sql = "SELECT * FROM dashboard";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<?php include 'header.php' ?>

<style>
    .dashCard a {
        text-decoration: none !important;
        color: #fff;
    }
</style>
<div class="dashboards">
    <div class="d-flex board">
        <div class="d-flex dash" style="margin-bottom: 20px;">
            <?php
            if ($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $namaSampah = $row["sampah"];
                    $keterangan = $row["keterangan"];
                    $gambar = $row["gambar"];
                    $harga = $row["harga"];
            ?>
                        <div class="dashCard">
                            <section class="header">
                                <div class="nama" data-value="<?php echo $namaSampah; ?>"></div>
                                <h4><?php echo $namaSampah; ?></h4>
                            </section>
                            <section class="d-flex">
                                <span>
                                    <div class="keterangan" data-value="<?php echo $keterangan; ?>"></div>
                                    <p><?php echo $keterangan; ?></p>
                                    <input type="hidden" class="idInput" value="<?php echo $id; ?>">
                                </span>
                                <span>
                                    <div class="gambar" data-value="<?php echo $gambar; ?>"></div>
                                    <img width="120px" height="120px" src="<?php echo $gambar; ?>" alt="">
                                </span>
                                </span>
                            </section>
                            <section>
                                <div class="harga" data-value="<?php echo $harga; ?>"></div>
                                <button>Rp <?php echo $harga; ?></button>
                                <button><a href="form_produk.php">Lihat Produk Daur Ulang</a></button>
                            </section>
                        </div>
                <?php
                    $count++;
                    if ($count == 2) {
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

<?php include 'footer.php' ?>