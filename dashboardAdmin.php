<?php

include 'koneksi.php';

$sql = "SELECT * FROM dashboard";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: loginAdmin.php");
    exit;
}

?>

<?php include 'headerAdmin.php' ?>

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
                    <div class="infoItem d-flex">
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
                        <section>
                            <div style="margin: 20px 0 30px; color: #fff;">
                                <button class="editBtn" onclick="editCard(this)" style="color: #fff; background-color: #FF8A30;">
                                    <svg style="margin-right: 10px" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 121 121" fill="none">
                                        <path d="M105.875 60.5001C104.538 60.5001 103.256 61.0313 102.31 61.9768C101.365 62.9223 100.833 64.2046 100.833 65.5418V95.7918C100.833 97.1289 100.302 98.4113 99.3567 99.3568C98.4112 100.302 97.1288 100.833 95.7917 100.833H25.2084C23.8712 100.833 22.5889 100.302 21.6434 99.3568C20.6979 98.4113 20.1667 97.1289 20.1667 95.7918V25.2084C20.1667 23.8713 20.6979 22.5889 21.6434 21.6434C22.5889 20.6979 23.8712 20.1668 25.2084 20.1668H55.4584C56.7955 20.1668 58.0779 19.6356 59.0234 18.6901C59.9689 17.7446 60.5 16.4622 60.5 15.1251C60.5 13.788 59.9689 12.5056 59.0234 11.5601C58.0779 10.6146 56.7955 10.0834 55.4584 10.0834H25.2084C21.197 10.0834 17.3499 11.677 14.5134 14.5134C11.6769 17.3499 10.0834 21.197 10.0834 25.2084V95.7918C10.0834 99.8032 11.6769 103.65 14.5134 106.487C17.3499 109.323 21.197 110.917 25.2084 110.917H95.7917C99.8031 110.917 103.65 109.323 106.487 106.487C109.323 103.65 110.917 99.8032 110.917 95.7918V65.5418C110.917 64.2046 110.386 62.9223 109.44 61.9768C108.495 61.0313 107.212 60.5001 105.875 60.5001ZM30.25 64.3318V85.7084C30.25 87.0456 30.7812 88.3279 31.7267 89.2734C32.6722 90.2189 33.9546 90.7501 35.2917 90.7501H56.6684C57.3319 90.7539 57.9896 90.6268 58.6039 90.3759C59.2182 90.125 59.7769 89.7553 60.248 89.288L95.1363 54.3493L109.455 40.3334C109.927 39.8647 110.302 39.3071 110.558 38.6928C110.814 38.0784 110.946 37.4194 110.946 36.7538C110.946 36.0883 110.814 35.4293 110.558 34.8149C110.302 34.2006 109.927 33.643 109.455 33.1743L88.078 11.5455C87.6093 11.073 87.0517 10.6979 86.4373 10.4419C85.8229 10.186 85.1639 10.0542 84.4984 10.0542C83.8328 10.0542 83.1738 10.186 82.5595 10.4419C81.9451 10.6979 81.3875 11.073 80.9188 11.5455L66.7013 25.8134L31.7121 60.7522C31.2449 61.2233 30.8752 61.782 30.6243 62.3962C30.3734 63.0105 30.2462 63.6682 30.25 64.3318ZM84.4984 22.2338L98.7663 36.5018L91.6071 43.6609L77.3392 29.393L84.4984 22.2338ZM40.3334 66.3988L70.2305 36.5018L84.4984 50.7697L54.6013 80.6668H40.3334V66.3988Z" fill="#F8F8F8" />
                                    </svg>Edit</button>
                                <button class="saveBtn" onclick="saveCard(this)" style="display: none; color: #fff;">Save</button>
                                <button class="cancelBtn" onclick="cancelCard(this)" style="display: none; color: #fff;">Cancel</button>
                            </div>
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
<script>
    function editCard(button) {
        var card = button.closest('.infoItem');
        var namaElement = card.querySelector('.nama');
        var keteranganElement = card.querySelector('.keterangan');
        var gambarElement = card.querySelector('.gambar');
        var hargaElement = card.querySelector('.harga');

        var namaValue = namaElement.dataset.value;
        var keteranganValue = keteranganElement.dataset.value;
        var gambarValue = gambarElement.dataset.value;
        var hargaValue = hargaElement.dataset.value;

        namaElement.innerHTML = '<input type="text" class="namaInput" placeholder="nama" value="' +
            namaValue + '">';
        keteranganElement.innerHTML = '<input type="text" class="keteranganInput" value="' +
            keteranganValue + '">';
        gambarElement.innerHTML = '<input type="text" class="gambarInput" value="' + gambarValue +
            '">';
        hargaElement.innerHTML = '<input type="text" class="hargaInput" value="' + hargaValue +
            '">';

        card.querySelector('.saveBtn').style.display = "inline";
        card.querySelector('.cancelBtn').style.display = "inline";
        button.style.display = "none";
    }

    function saveCard(button) {
        var card = button.closest('.infoItem');
        var newNama = card.querySelector('.namaInput').value;
        var newKeterangan = card.querySelector('.keteranganInput').value;
        var newGambar = card.querySelector('.gambarInput').value;
        var newHarga = card.querySelector('.hargaInput').value;
        var id = card.querySelector('.idInput').value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                card.querySelector('.nama').innerHTML = newNama;
                card.querySelector('.keterangan').innerHTML = newKeterangan;
                card.querySelector('img').src = newGambar;
                card.querySelector('.harga').innerHTML = newHarga;

                card.querySelector('.saveBtn').style.display = "none";
                card.querySelector('.cancelBtn').style.display = "none";
                card.querySelector('.editBtn').style.display = "inline";
            }
        };

        xhr.open("POST", "save_info.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&nama=" + newNama + "&keterangan=" + newKeterangan + "&gambar=" + newGambar + "&harga=" + newHarga);
        location.reload();
        location.reload();
    }


    function cancelCard(button) {
        var card = button.closest('.infoItem');
        card.querySelector('.nama').innerHTML = card.querySelector('.namaInput').value;
        card.querySelector('.keterangan').innerHTML = card.querySelector('.keteranganInput').value;
        card.querySelector('.gambar').innerHTML = '<img src="' + card.querySelector('img').src + '" alt="' + card.querySelector('.nama').innerText + '" style="width: 100%;">';
        card.querySelector('.harga').innerHTML = card.querySelector('.hargaInput').value;

        card.querySelector('.saveBtn').style.display = "none";
        card.querySelector('.cancelBtn').style.display = "none";
        card.querySelector('.editBtn').style.display = "inline";

        location.reload();
    }
</script>

<?php include 'footer.php' ?>