<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include "../controller/Function.php";
sessionCheckOperator();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Layanan Pengaduan Masyarakat Desa Desa Kekiling </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/logo-transparent.png" rel="icon">
  <link href="../../assets/img/logo-transparent.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php include "header.php";?>

  <?php include "nav.php";?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card rounded-5">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Opsi</h6>
                    </li>

                    <li><a class="dropdown-item" href="data-pengguna.php">Buka Data</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data Pengguna <span>| Total Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= JumlahPengguna(); ?></h6>
                      <span class="text-success small pt-1 fw-bold">Buka Data</span> <span class="text-muted small pt-2 ps-1">untuk detail</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card rounded-5">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Opsi</h6>
                    </li>

                    <li><a class="dropdown-item" href="data-operator.php">Buka Data</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data Operator <span>| Total Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= JumlahOperator(); ?></h6>
                      <span class="text-success small pt-1 fw-bold">Buka Data</span> <span class="text-muted small pt-2 ps-1">untuk detail</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card rounded-5">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Opsi</h6>
                    </li>

                    <li><a class="dropdown-item" href="data-pengaduan.php">Buka Data</a></li>
                    <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                    
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Laporan Warga <span>| Total Data</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= JumlahPengaduan(); ?></h6>
                      <span class="text-danger small pt-1 fw-bold">Buka data</span> <span class="text-muted small pt-2 ps-1">untuk detail</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card rounded-5">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Opsi</h6>
                </li>

                <li><a class="dropdown-item" href="data-pengaduan.php">Buka Data</a></li>
                <li><a class="dropdown-item" href="#" onclick="location.reload();">Refresh</a></li>
                
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Pengaduan Terbaru <span>| Warga</span></h5>

              <div class="activity">
              <?php 
              $data_pt = pengaduanTerbaru();
              foreach($data_pt as $fetch_ft){
              ?>
                <div class="activity-item d-flex">
                  <div class="activite-label"><?= $fetch_ft['tanggalkejadian_pengaduan'];?></div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    <?= $fetch_ft['isilaporan_pengaduan'];?> - <b>Belum ditinjau</b>
                  </div>
                </div><!-- End activity item-->
                
              <?php } ?>
              </div>

            </div>
          </div><!-- End Recent Activity -->

          

        </div><!-- End Right side columns -->

      </div>
    </section>
    <?php include "modals.php"; ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright text-dark">
      &copy; Copyright <strong><span>Aplikasi Layanan Pengaduan Masyarakat Desa Kekiling</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>