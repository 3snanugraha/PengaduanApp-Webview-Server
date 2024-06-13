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
        <a href="dashboard.php" class="green-secondary"><i class="bi bi-arrow-left-circle green-secondary"></i>&nbsp;&nbsp; <span> Riwayat Pengaduan</span> </a>
      <section class="section register mt-2 d-flex flex-column align-items-center justify-content-center py-2">
        <div class="container mt-5">
          <div class="row justify-content-center">

          <?php 
            $data_riwayat = getRiwayat($_SESSION['nik_masyarakat']);
            foreach($data_riwayat as $fetch_riwayat){
          ?>
              <div class="row align-items-center justify-content-center" style="margin-right: 0px!important;margin-left: 0px!important;">
                <p class="green-secondary">
                <?php 
                $date=date_create($fetch_riwayat['tanggalkejadian_pengaduan']);
                echo date_format($date,"d F Y"); ?>
                </p>
                <div class="card shadow-1 rounded-5">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-7">
                                <p class="text-start mt-4">
                                    <?= $fetch_riwayat['notelp_masyarakat']; ?>
                                </p>
                                <p class="text-start mb-2">
                                    <?= $fetch_riwayat['lokasikejadian_pengaduan']; ?>
                                </p>
                                <p class="text-start mb-2">
                                    <?= $fetch_riwayat['isilaporan_pengaduan']; ?>
                                </p>
                            </div>
                            <div class="col-5 mt-4">
                                <img class="img-fluid" src="../assets/img/<?= $fetch_riwayat['fotokejadian_pengaduan']; ?>">
                            </div>
                        </div>

                        <div class="row text-center mt-2">
                            <a href="../backend/controller/Controller.php?u=hapus-pengaduan&id=<?= $fetch_riwayat['id_pengaduan']; ?>" class="btn btn-sm btn-outline-danger rounded-5" onclick="return confirm('Apakah anda yakin akan menghapus laporan ini?')"><i class="bi bi-trash"></i><span> Hapus laporan</span></a>
                        </div>

                    </div>
                </div>
                <p class="green-secondary d-flex justify-content-end">
                <?php 
                    if($fetch_riwayat['statuspengaduan_pengaduan']=='0'){
                    echo "Belum ditinjau";
                    }else if($fetch_riwayat['statuspengaduan_pengaduan']=='1'){
                    echo "Sudah ditinjau"; 
                    }
                ?>
                </p>
              </div>
            <?php } ?>

              <div class="credits">
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