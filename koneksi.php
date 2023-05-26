<?php
    $koneksi = mysqli_connect("localhost", "root", "", "fasilitas_kes");
    if(!$koneksi){
        echo "koneksi sukses";
    }
?>