<?php
    include("koneksi.php");
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

        <!--Form Tambah Buku-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 mt-2" style="min-height: 500px;">
                    <div class="card">
                        <div class="card-header">
                        <h5>Tambah Data Tenaga Kesehatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="nakes_simpan.php" method="post">
                                            <div class="form-group">
                                            <label for="">ID NaKes</label>
                                            <input type="text" class="form-control mt-2" placeholder="ID NaKes" name="id_nakes">
                                            <label for="">Jenis NaKes</label>
                                            <input type="text" class="form-control mt-2" placeholder="Jenis NaKes" name="jenis_nakes">
                                            <label for="">Jumlah NaKes</label>
                                            <input type="text" class="form-control mt-2" placeholder="Jumlah NaKes" name="jumlah_nakes">
                                            <label for="">Nama FasKes</label>
                                            <input type="text" class="form-control mt-2" placeholder="Nama FasKes" name="nama_faskes">
                                            </div>
                                            <br>
                                            <br>
                                            <input type="submit" class="btn btn-primary mt-3" value="Simpan">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>


<?php
    include("footer.html");
?>



