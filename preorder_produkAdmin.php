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

<?php include 'headerAdmin.php' ?>

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
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <?php
                if ($result->num_rows > 0) {
                    $counter = 1;
                    $totalJumlah = 0;
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
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
                                <td>
                                <button onclick="deleteRow(<?php echo $id; ?>)" style="background: transparent; border: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                            <path d="M21.0938 10.1562V10.9375H28.9062V10.1562C28.9062 9.12025 28.4947 8.12668 27.7621 7.39411C27.0296 6.66155 26.036 6.25 25 6.25C23.964 6.25 22.9704 6.66155 22.2379 7.39411C21.5053 8.12668 21.0938 9.12025 21.0938 10.1562ZM17.9688 10.9375V10.1562C17.9688 8.29145 18.7095 6.50302 20.0282 5.18441C21.3468 3.86579 23.1352 3.125 25 3.125C26.8648 3.125 28.6532 3.86579 29.9718 5.18441C31.2905 6.50302 32.0312 8.29145 32.0312 10.1562V10.9375H43.75C44.1644 10.9375 44.5618 11.1021 44.8549 11.3951C45.1479 11.6882 45.3125 12.0856 45.3125 12.5C45.3125 12.9144 45.1479 13.3118 44.8549 13.6049C44.5618 13.8979 44.1644 14.0625 43.75 14.0625H41.3938L38.4375 39.95C38.2195 41.8565 37.3074 43.6162 35.8752 44.8933C34.443 46.1705 32.5908 46.8759 30.6719 46.875H19.3281C17.4092 46.8759 15.557 46.1705 14.1248 44.8933C12.6926 43.6162 11.7805 41.8565 11.5625 39.95L8.60625 14.0625H6.25C5.8356 14.0625 5.43817 13.8979 5.14515 13.6049C4.85212 13.3118 4.6875 12.9144 4.6875 12.5C4.6875 12.0856 4.85212 11.6882 5.14515 11.3951C5.43817 11.1021 5.8356 10.9375 6.25 10.9375H17.9688ZM21.875 21.0938C21.875 20.6793 21.7104 20.2819 21.4174 19.9889C21.1243 19.6959 20.7269 19.5312 20.3125 19.5312C19.8981 19.5312 19.5007 19.6959 19.2076 19.9889C18.9146 20.2819 18.75 20.6793 18.75 21.0938V36.7188C18.75 37.1332 18.9146 37.5306 19.2076 37.8236C19.5007 38.1166 19.8981 38.2812 20.3125 38.2812C20.7269 38.2812 21.1243 38.1166 21.4174 37.8236C21.7104 37.5306 21.875 37.1332 21.875 36.7188V21.0938ZM29.6875 19.5312C29.2731 19.5312 28.8757 19.6959 28.5826 19.9889C28.2896 20.2819 28.125 20.6793 28.125 21.0938V36.7188C28.125 37.1332 28.2896 37.5306 28.5826 37.8236C28.8757 38.1166 29.2731 38.2812 29.6875 38.2812C30.1019 38.2812 30.4993 38.1166 30.7924 37.8236C31.0854 37.5306 31.25 37.1332 31.25 36.7188V21.0938C31.25 20.6793 31.0854 20.2819 30.7924 19.9889C30.4993 19.6959 30.1019 19.5312 29.6875 19.5312Z" fill="#273E9F" />
                                        </svg>
                                    </button>
                                </td>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function deleteRow(id) {
        var confirmation = confirm("Anda yakin ingin menghapus baris ini?");
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deleteProduk.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("id=" + id);
        }
    }
</script>

<?php include 'footer.php' ?>