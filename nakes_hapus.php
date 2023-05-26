<?php
    include("koneksi.php");

    // mendapatkan id nakes dari URL
    $id_nakes = $_GET['id'];

    // menghapus data nakes dari database
    $hapus_data = mysqli_query($koneksi, "DELETE FROM nakes WHERE id_nakes='$id_nakes'");

    // redirect ke halaman data nakes setelah selesai menghapus
    if ($hapus_data) {
        header("location: nakes.php");
    } else {
        echo "Gagal menghapus data nakes";
    }
?>