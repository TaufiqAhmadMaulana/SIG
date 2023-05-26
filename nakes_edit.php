<?php
// koneksi ke database

include("koneksi.php");

// mendapatkan id nakes dari URL
$id_nakes = $_GET['id'];

// mendapatkan data nakes yang akan diedit dari database
$ambil_data = mysqli_query($koneksi, "SELECT * FROM nakes WHERE id_nakes='$id_nakes'");
$nakes = mysqli_fetch_array($ambil_data);

// jika tombol update diklik
if (isset($_POST['update'])) {
    // mendapatkan data dari form
    $id_nakes = $_POST['id_nakes'];
    $jenis_nakes = $_POST['jenis_nakes'];
    $jumlah_nakes = $_POST['jumlah_nakes'];
    $nama_faskes = $_POST['nama_faskes'];

    // update data nakes ke database
    $update_data = mysqli_query($koneksi, "UPDATE nakes SET jenis_nakes='$jenis_nakes', jumlah_nakes='$jumlah_nakes', nama_faskes='$nama_faskes' WHERE id_nakes='$id_nakes'");

    // redirect ke halaman data nakes setelah selesai mengupdate
    if ($update_data) {
        header("location: nakes.php");
    } else {
        echo "Gagal mengupdate data nakes";
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
                <li><a class="nav-link scrollto active" href="faskes.php">FasKes</a></li>
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
                <h1>Tenaga Kesehatan</h1>
                <h2 style="text-align: justify;">Tenaga kesehatan di Kota Bandar Lampung memiliki peran penting dalam memberikan perawatan kesehatan yang berkualitas kepada masyarakat setempat.</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 nakes" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/nakes.gif" class="img-fluid animated" alt="">
                </div>
            </div>
            </div>

        </section><!-- End Hero -->

        <!-- Form edit data nakes -->
        <section class="main m-3">
            <h2 class="judul mb-4">Edit Data NaKes</h2>
            <form method="post">
                <div class="form-group">
                    <label for="id_nakes">ID NaKes:</label>
                    <input type="text" class="form-control" id="id_nakes" name="id_nakes" value="<?php echo $nakes['id_nakes']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jenis_nakes">Jenis NaKes:</label>
                    <input type="text" class="form-control" id="jenis_nakes" name="jenis_nakes" value="<?php echo $nakes['jenis_nakes']; ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_nakes">Jumlah NaKes:</label>
                    <input type="text" class="form-control" id="jumlah_nakes" name="jumlah_nakes" value="<?php echo $nakes['jumlah_nakes']; ?>">
                </div>
                <div class="form-group">
                    <label for="nama_faskes">Nama FasKes:</label>
                    <input type="text" class="form-control" id="nama_faskes" name="nama_faskes" value="<?php echo $nakes['nama_faskes']; ?>">
                </div>
                <br>
                <br>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </section>
    </body>

</html>




<?php
include("footer.html");
?>
