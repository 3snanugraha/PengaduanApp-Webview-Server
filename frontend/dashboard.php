<?php 
include "../backend/controller/Function.php"; 
sessionCheck();
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

</head>

<body>

  <main>
    <div class="container">
        <br>
        <a href="index.php" class="green-secondary"><i class="bi bi-arrow-left-circle green-secondary"></i>&nbsp;&nbsp; <span> Dashboard</span> </a>
      <section class="section register mt-5 d-flex flex-column align-items-center justify-content-center py-2">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-2">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/logo2.png" alt="">
                </a>
              </div><!-- End Logo -->
              <h4 class="d-lg-block green-primary text-center">Layanan Pengaduan Masyarakat Desa Kekiling</h4>
              <div class="row mt-5">
                <p class="d-flex justify-content-center green-secondary"> Hai, <?= $_SESSION['namalengkap_masyarakat'];?>.</p>
                
                <div class="row align-items-center justify-content-center" style="margin-right: 0px!important;margin-left: 0px!important;">
                    <div class="col-6">
                        <a href="pengaduan.php">
                        <div class="card shadow-1 rounded-5 text-center">
                            <div class="card-title">
                                <i class="bi bi-file-earmark-diff text-dark" style="font-size: xx-large;"></i>
                            </div>
                            <div class="card-body">
                                <a href="#" class="text-dark">Lakukan Pengaduan</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-6">
                    <a href="riwayat.php" class="text-dark">
                        <div class="card shadow-1 rounded-5 text-center">
                            <div class="card-title">
                                <i class="bi bi-clock-history text-dark" style="font-size: xx-large;"></i>
                            </div>
                            <div class="card-body">
                                <a href="riwayat.php" class="text-dark">Riwayat Pengaduan</a>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center mr-0" style="margin-right: 0px!important;margin-left: 0px!important;">
                    <div class="col-6">
                      <a href="panduan.php">
                        <div class="card shadow-1 rounded-5 text-center">
                            <div class="card-title">
                                <i class="bi bi-info-circle text-dark" style="font-size: xx-large;"></i>
                            </div>
                            <div class="card-body">
                                <a href="panduan.php" class="text-dark">Panduan</a>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6">
                    <a href="../backend/controller/Controller.php?u=logout">
                        <div class="card shadow-1 rounded-5 text-center">
                            <div class="card-title">
                                <i class="bi bi-box-arrow-left text-dark" style="font-size: xx-large;"></i>
                            </div>
                            <div class="card-body">
                                <a href="../backend/controller/Controller.php?u=logout" class="text-dark">Logout</a>
                            </div>
                        </div>
                    </a>
                    </div>
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