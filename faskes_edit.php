<?php
    include("koneksi.php");

    // mendapatkan id fasilitas kesehatan dari URL
    $id_faskes = $_GET['id'];

    // mendapatkan data fasilitas kesehatan yang akan diedit dari database
    $ambil_data = mysqli_query($koneksi, "SELECT * FROM faskes WHERE id_faskes='$id_faskes'");
    $faskes = mysqli_fetch_array($ambil_data);

    // jika tombol update diklik
    if (isset($_POST['update'])) {
        // mendapatkan data dari form
        $nama_faskes = $_POST['nama_faskes'];
        $alamat_faskes = $_POST['alamat_faskes'];
        $jumlah_kamar = $_POST['jumlah_kamar'];
        $waktu_op = $_POST['waktu_op'];
        $kontak_faskes = $_POST['kontak_faskes'];
        $ringkasan_faskes = $_POST['ringkasan_faskes'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];

        // update data fasilitas kesehatan ke database
        $update_data = mysqli_query($koneksi, "UPDATE faskes SET 
            nama_faskes='$nama_faskes',
            alamat_faskes='$alamat_faskes',
            jumlah_kamar='$jumlah_kamar',
            waktu_op='$waktu_op',
            kontak_faskes='$kontak_faskes',
            ringkasan_faskes='$ringkasan_faskes',
            longitude='$longitude',
            latitude='$latitude' WHERE id_faskes='$id_faskes'");

        // redirect ke halaman data fasilitas kesehatan setelah selesai mengupdate
        if ($update_data) {
            header("location: faskes.php");
        } else {
            echo "Gagal mengupdate data fasilitas kesehatan";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>FasKes Kota Bandar Lampung</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/logo.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Fasilitas Kesehatan</a></h1>
            
            <!--NAvbar-->
            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                <li><a class="nav-link scrollto" href="LeafletJS/index.html">Maps</a></li>
                <li><a class="nav-link scrollto" href="nakes.php">NaKes</a></li>
                <li><a class="nav-link scrollto active" href="logout.php">LogOut</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">

            <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Fasilitas Kesehatan</h1>
                <h2 style="text-align: justify;">Pemerintah Kota Bandar Lampung Menyediakan Fasilitas Kesehatan yang menjadi salah satu pilihan utama bagi masyarakat Kota Bandar Lampung dalam mencari perawatan kesehatan yang terpercaya.</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hospital" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/hospital.gif" class="img-fluid animated" alt="">
                </div>
            </div>
            </div>

        </section><!-- End Hero -->

        <!-- Form Edit FasKes -->
        <section class="main m-3">
            <h2 class="judul mb-4">Edit FasKes</h2>

            <form method="post" action="">
                <div class="form-group row">
                    <label for="nama_faskes" class="col-sm-2 col-form-label">Nama FasKes</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_faskes" name="nama_faskes" value="<?php echo $faskes['nama_faskes'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat_faskes" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_faskes" name="alamat_faskes" value="<?php echo $faskes['alamat_faskes'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_kamar" class="col-sm-2 col-form-label">Kamar Tersedia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar" value="<?php echo $faskes['jumlah_kamar'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu_op" class="col-sm-2 col-form-label">Jam Operasional</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="waktu_op" name="waktu_op" value="<?php echo $faskes['waktu_op'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kontak_faskes" class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kontak_faskes" name="kontak_faskes" value="<?php echo $faskes['kontak_faskes'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ringkasan_faskes" class="col-sm-2 col-form-label">Ringkasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ringkasan_faskes" name="ringkasan_faskes" value="<?php echo $faskes['ringkasan_faskes'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $faskes['longitude'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $faskes['latitude'] ?>">
                    </div>
                </div>
                <br>
                <br>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </section>

    </body>

</html>


