<?php
include 'koneksi.php';

$sql = "SELECT * FROM formproduk";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$conn->close();
?>

<?php include 'header.php' ?>

<div class="riwayat d-flex fill">
    <div class="riwayatSampah">
        <span class="d-flex" style="justify-content: center;">
            <h1>PRE-ORDER PRODUK DAUR ULANG </h1>
        </span>
        <div class="riwayatCard">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">HARI/TANGGAL</th>
                        <th scope="col">NAMA PEMBELI</th>
                        <th scope="col">NAMA PRODUK</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">NOMOR HANDPHONE</th>
                        <th scope="col">JUMLAH</th>
                    </tr>
                </thead>
                <?php
                if ($result->num_rows > 0) {
                    $counter = 1;
                    $totalJumlah = 0;
                    while ($row = $result->fetch_assoc()) {
                        $totalJumlah += $row["jumlah"];
                ?>
                        <tbody>
                            <tr>
                                <th><?php echo $counter; ?></th>
                                <td><?php echo $row["date"]; ?></td>
                                <td><?php echo $row["nama"]; ?></td>
                                <td><?php echo $row["produk"]; ?></td>
                                <td><?php echo $row["alamat"]; ?></td>
                                <td><?php echo $row["nomor_hp"]; ?></td>
                                <td><?php echo $row["jumlah"]; ?></td>
                            </tr>
                        </tbody>
                <?php
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='12'>No data available</td></tr>";
                }
                ?>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo $totalJumlah; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>