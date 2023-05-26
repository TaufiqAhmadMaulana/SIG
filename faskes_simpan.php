<?php
    // memeriksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // menyimpan data yang diinputkan ke dalam variabel
        $id_faskes = $_POST['id_faskes'];
        $nama_faskes = $_POST['nama_faskes'];
        $alamat_faskes = $_POST['alamat_faskes'];
        $jumlah_kamar = $_POST['jumlah_kamar'];
        $waktu_op = $_POST['waktu_op'];
        $kontak_faskes = $_POST['kontak_faskes'];
        $ringkasan_faskes = $_POST['ringkasan_faskes'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];

        // memeriksa apakah data yang diinputkan sudah lengkap
        if (!empty($id_faskes) && !empty($nama_faskes) && !empty($alamat_faskes) && !empty($jumlah_kamar) && !empty($waktu_op) && !empty($kontak_faskes) && !empty($ringkasan_faskes) && !empty($longitude) && !empty($latitude)) {
            // melakukan koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "fasilitas_kes");

            // mengecek apakah koneksi berhasil
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            } else {
                // melakukan query untuk menyimpan data ke dalam tabel faskes
                $query = "INSERT INTO faskes (id_faskes, nama_faskes, alamat_faskes, jumlah_kamar, waktu_op, kontak_faskes, ringkasan_faskes, longitude, latitude) VALUES ('$id_faskes', '$nama_faskes', '$alamat_faskes', '$jumlah_kamar', '$waktu_op', '$kontak_faskes', '$ringkasan_faskes', '$longitude', '$latitude')";

                // mengecek apakah query berhasil dijalankan
                if (mysqli_query($koneksi, $query)) {
                    header('location: faskes.php');
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
                }

                // menutup koneksi
                mysqli_close($koneksi);
            }
        } else {
            echo "Mohon lengkapi semua data yang diperlukan.";
        }
    }
?>
