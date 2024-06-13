<?php
include "../backend/controller/Function.php"; 
loginCheck();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Pengaduan Masyarakat Kekiling</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo-utama.png" rel="icon">
  <link href="../assets/img/logo-utama.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">
      <br>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/logo2.png" alt="">
                </a>
              </div><!-- End Logo -->
              <h4 class="d-lg-block green-primary text-center">Layanan Pengaduan Masyarakat Desa Kekiling</h4>
              <div class="pb-2">
                <h5 class="card-title text-center pb-0 fs-4 green-secondary">Sign In</h5>
              </div>
              <div class="card mb-3 shadow-1 rounded-5" style="background-color: rgb(194,231,235);">

                <div class="card-body">

                  <form class="row g-3 mt-5 needs-validation" action="../backend/controller/Controller.php" method="post" novalidate>

                    <div class="col-12">
                      <!-- <label for="yourUsername" class="form-label">Username</label> -->
                      <div class="input-group has-validation">
                        <input type="text" name="nik_masyarakat" placeholder="Enter NIK" class="form-control rounded-5" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your NIK.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <!-- <label for="yourPassword" class="form-label">Password</label> -->
                      <input type="password" name="password_masyarakat" placeholder="Enter Password" class="form-control rounded-5" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label green-secondary" for="rememberMe">Ingatkan saya</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-teal w-100 rounded-5" name="login" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 green-secondary text-center">Tidak punya akun? <a href="register.php" class="green-primary">Register</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>