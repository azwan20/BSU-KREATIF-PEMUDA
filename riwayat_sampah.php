<?php include 'headerAdmin.php' ?>
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<div class="kategory">
    <div class="kategoryCard">
        <button><a href="riwayat_plastik.php">PLASTIK</a></button>
        <button style="margin-left: 60px;"><a href="riwayat_logam.php">LOGAM</a></button>
        <button style="margin-left: 120px;"><a href="riwayat_besi.php">BESI</a></button>
        <button style="margin-left: 160px;"><a href="riwayat_kaca.php">KACA</a></button>
    </div>
</div>

<?php include 'footer.php' ?>