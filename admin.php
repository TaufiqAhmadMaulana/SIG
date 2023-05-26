<?php
session_start();
include 'koneksi.php';

// Mengatur pesan kesalahan default
$error = '';

// Memeriksa apakah pengguna telah masuk dan mengarahkan ke halaman beranda jika sudah
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit;
}

// Memeriksa apakah pengguna telah mengirimkan formulir login
if (isset($_POST['login'])) {
  // Mengambil nilai input username dan password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Mencari admin dengan username yang cocok di database
  $query = "SELECT * FROM admin WHERE username = '$username'";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) == 1) {
    // Jika username cocok, memeriksa apakah password benar
    $row = mysqli_fetch_assoc($result);
    if ($password === $row['password']) {
      // Jika password benar, menyimpan username ke sesi dan mengarahkan ke halaman beranda
      $_SESSION['username'] = $username;
      header('Location: dashboard.php');
      exit;
    } else {
      $error = 'Password salah.';
    }
  } else {
    $error = 'Username tidak ditemukan.';
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
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
          <!--form-->
          <div class="container">
              <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                      <?php if ($error) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                      <?php endif; ?>
                      <form action="" method="POST">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                          <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section><!-- End Hero -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>

<?php
    include("footer.html");
?>