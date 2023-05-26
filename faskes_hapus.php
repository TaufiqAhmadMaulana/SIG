<?php
    include("koneksi.php");

    // ambil id faskes dari parameter URL
    $id_faskes = $_GET['id'];

    // hapus data faskes dari database
    $hapus_data = mysqli_query($koneksi, "DELETE FROM faskes WHERE id_faskes='$id_faskes'");

    // redirect ke halaman data faskes setelah selesai menghapus
    if ($hapus_data) {
        header("location: faskes.php");
    } else {
        echo "Gagal menghapus data faskes";
    }
?>
