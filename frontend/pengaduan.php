<?php
include "../backend/controller/Function.php"; 
sessionCheck();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Pengaduan Masyarakat [Nama Desa]</title>
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
      <a href="dashboard.php" class="green-secondary"><i class="bi bi-arrow-left-circle green-secondary"></i>&nbsp;&nbsp; <span> Lakukan Pengaduan</span> </a>
      
      <section class="section register min-vh-50 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="pb-2">
                <h5 class="card-title text-center pb-0 fs-4 green-secondary">Form Pengaduan</h5>
                <i><p class="green-secondary">*Mohon tidak memberikan laporan palsu!</p></i>
              </div>
            </div>
              <div class="card mb-3 shadow-1 rounded-5" style="background-color: rgb(194,231,235);">

                <div class="card-body">

                  <form class="row g-3 mt-2 needs-validation" method="post" action="../backend/controller/Controller.php" enctype="multipart/form-data" novalidate>

                    <div class="col-12 mb-1">
                      <label for="yourUsername" class="form-label green-secondary">Unggah Foto Bukti Pengaduan</label>
                      <div class="input-group has-validation d-flex justify-content-center">
                        <label for="imgInp" class="btn btn-teal rounded-5"><i class="bi bi-camera"></i><span> Ambil Foto</span></label>
                        <input accept="image/*" type='file' id="imgInp" name="file" style="visibility: hidden;" capture="environment"/>
                        <img id="blah" src="../assets/img/fotostandar.png" alt="your image" class="img-fluid"/>
                      </div>
                    </div>
                    
                    <div class="col-12 mb-1">
                      <label for="tanggalkejadian_pengaduan" class="form-label green-secondary">Tanggal Kejadian</label>
                      <input type="date" name="tanggalkejadian_pengaduan" class="form-control rounded-5" id="tanggalkejadian_pengaduan" required>
                      <div class="invalid-feedback">Masukan Tanggal Kejadian.</div>
                      <input type="hidden" name="nik_masyarakat" value="<?= $_SESSION['nik_masyarakat']; ?>" class="form-control rounded-5" id="nik_masyarakat" required>
                    </div>

                    <div class="col-12 mb-1">
                        <label for="lokasikejadian_pengaduan" class="form-label green-secondary">Lokasi Kejadian</label>
                        <input type="text" name="lokasikejadian_pengaduan" placeholder="Masukan Lokasi Kejadian..." class="form-control rounded-5" id="email" required>
                        <div class="invalid-feedback">Masukan lokasi kejadian terlebih dahulu.</div>
                    </div>

                    <div class="col-12 mb-1">
                        <label for="isilaporan_pengaduan" class="form-label green-secondary">Isi Laporan</label>
                        <textarea name="isilaporan_pengaduan" placeholder="Masukan Laporan Anda..." class="form-control rounded-4" rows="5" id="isilaporan_pengaduan" required></textarea>
                        <div class="invalid-feedback">Masukan Isi Laporan terlebih dahulu.</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-teal w-100 rounded-5" name="tambah-pengaduan" type="submit"><i class="bi bi-send"></i><span> Kirim Laporan</span> </button>
                    </div>
                  </form>

                </div>
              </div>

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
  <script>
    document.addEventListener('DOMContentLoaded', ()=>{
        const imgInp = document.querySelector('#imgInp');
        
        imgInp.addEventListener('change', () =>{
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        })

    });
    </script>
</body>

</html>