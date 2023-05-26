<?php
    // memeriksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // menyimpan data yang diinputkan ke dalam variabel
        $id_nakes = $_POST['id_nakes'];
        $jenis_nakes = $_POST['jenis_nakes'];
        $jumlah_nakes = $_POST['jumlah_nakes'];
        $nama_faskes = $_POST['nama_faskes'];

        // memeriksa apakah data yang diinputkan sudah lengkap
        if (!empty($id_nakes) && !empty($jenis_nakes) && !empty($jumlah_nakes) && !empty($nama_faskes)) {
            // melakukan koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "fasilitas_kes");

            // mengecek apakah koneksi berhasil
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            } else {
                // melakukan query untuk menyimpan data ke dalam tabel nakes
                $query = "INSERT INTO nakes (id_nakes, jenis_nakes, jumlah_nakes, nama_faskes) VALUES ('$id_nakes', '$jenis_nakes', '$jumlah_nakes', '$nama_faskes')";

                // mengecek apakah query berhasil dijalankan
                if (mysqli_query($koneksi, $query)) {
                    header('location: nakes.php');
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
