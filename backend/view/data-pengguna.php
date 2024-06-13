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
      <h1>Data Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

                <div class="card rounded-5 shadow">
                <div class="card-body">
                    <h5 class="card-title">Data Pengguna / Masyarakat</h5>
                    <p>Berikut adalah semua data pengguna / masyarakat. Gunakan filter <code>.Search</code> untuk mengolah data  Klik hapus untuk menghapus data, klik edit untuk mengedit data, klik tambah data untuk menambahkan data, klik refresh untuk melakukan refreshing data.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambahMasyarakat" class="btn btn-outline-success rounded-5"><i class="bi bi-person-plus"></i> Tambahkan data</a>
                    <a href="#" onclick="location.reload();" class="btn btn-outline-warning rounded-5"><i class="bi bi-arrow-clockwise"></i>Refresh</a>
                    <br><br>
                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                    <table class="table datatable">
                    <thead>
                        <tr>
                        <th scope="col">#No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $data_pg = getDataMasyarakat(); $num=0;
                        foreach($data_pg as $fetch_masyarakat){
                        $num++;
                        ?>
                        <tr>
                        <th scope="row"><?= $num; ?></th>
                        <td><?= $fetch_masyarakat['nik_masyarakat'];?></td>
                        <td><?= $fetch_masyarakat['namalengkap_masyarakat'];?></td>
                        <td><?= $fetch_masyarakat['email_masyarakat'];?></td>
                        <td><?= $fetch_masyarakat['notelp_masyarakat'];?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-warning rounded-5" data-bs-toggle="modal" data-bs-target="#edit-masyarakat" 
                            data-bs-nik="<?= $fetch_masyarakat['nik_masyarakat'];?>"
                            data-bs-namalengkap="<?= $fetch_masyarakat['namalengkap_masyarakat'];?>"
                            data-bs-email="<?= $fetch_masyarakat['email_masyarakat'];?>"
                            data-bs-notelp="<?= $fetch_masyarakat['notelp_masyarakat'];?>"
                            ><i class="bi bi-pencil-square"></i></a>
                            <a href="../controller/Controller.php?u=delete-masyarakat&nik=<?= $fetch_masyarakat['nik_masyarakat']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger rounded-5"><i class="bi bi-trash"></i></a>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
                </div>

        </div>
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
  <!-- Modal Handler -->
  <script>
    var ModalEditMasyarakat = document.getElementById('edit-masyarakat')
      ModalEditMasyarakat.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var nik_masyarakat = button.getAttribute('data-bs-nik')
        var namalengkap_masyarakat = button.getAttribute('data-bs-namalengkap')
        var email_masyarakat = button.getAttribute('data-bs-email')
        var notelp_masyarakat = button.getAttribute('data-bs-notelp')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = ModalEditMasyarakat.querySelector('.modal-title')
        var nik_inp = ModalEditMasyarakat.querySelector('.modal-body #nik_masyarakat')
        var nl_inp = ModalEditMasyarakat.querySelector('.modal-body #namalengkap_masyarakat')
        var email_inp = ModalEditMasyarakat.querySelector('.modal-body #email_masyarakat')
        var notelp_inp = ModalEditMasyarakat.querySelector('.modal-body #notelp_masyarakat')

        modalTitle.textContent = 'Edit Data Masyarakat NIK : ' + nik_masyarakat
        nik_inp.value = nik_masyarakat
        nl_inp.value = namalengkap_masyarakat
        email_inp.value = email_masyarakat
        notelp_inp.value = notelp_masyarakat
    })
  </script>
</body>

</html>