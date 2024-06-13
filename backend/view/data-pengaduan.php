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
      <h1>Data Pengaduan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Laporan Warga</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

                <div class="card rounded-5 shadow">
                <div class="card-body">
                    <h5 class="card-title">Laporan Warga</h5>
                    <p>Berikut adalah semua data laporan pengguna / masyarakat. Gunakan filter <code>.Search</code> untuk mengolah data  Klik hapus untuk menghapus data, klik refresh untuk melakukan refreshing data.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#CetakLaporan" class="btn btn-outline-success rounded-5"><i class="bi bi-printer"></i> Cetak</a>
                    <a href="#" onclick="location.reload();" class="btn btn-outline-warning rounded-5"><i class="bi bi-arrow-clockwise"></i>Refresh</a>
                    <br><br>
                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                    <table class="table datatable">
                    <thead>
                        <tr>
                        <th scope="col">#No</th>
                        <th scope="col">NIK Masyarakat</th>
                        <th scope="col">Foto Kejadian</th>
                        <th scope="col">Tanggal Kejadian</th>
                        <th scope="col">Lokasi Kejadian</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Status Pengaduan</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $data_pgd = getPengaduan(); $num=0;
                        foreach($data_pgd as $fetch_pengaduan){
                        $num++;
                        ?>
                        <tr>
                        <th scope="row"><?= $num; ?></th>
                        <td><?= $fetch_pengaduan['nik_masyarakat'];?></td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#FotoKejadian" data-bs-path="../../assets/img/<?= $fetch_pengaduan['fotokejadian_pengaduan'];?>" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i> Lihat</a></td>
                        <td><?= $fetch_pengaduan['tanggalkejadian_pengaduan'];?></td>
                        <td><?= $fetch_pengaduan['lokasikejadian_pengaduan'];?></td>
                        <td><?= $fetch_pengaduan['isilaporan_pengaduan'];?></td>
                        <td>
                            <?php 
                            if($fetch_pengaduan['statuspengaduan_pengaduan']=='0'){
                                echo "<div class='badge bg-danger rounded-5'> Belum ditinjau</div>" . "<br>";
                                echo "<a href='../controller/Controller.php?u=tinjau-pengaduan&id_pengaduan=" . $fetch_pengaduan['id_pengaduan'] . "' class='btn btn-sm btn-outline-success rounded-5 d-flex justify-content-center mt-2' onclick='return confirm(`Apakah pengaduan ini sudah ditinjau dan diproses?`);'><i class='bi bi-file-earmark-check'></i></a>";
                            }elseif($fetch_pengaduan['statuspengaduan_pengaduan']=='1'){
                                echo "<div class='badge bg-success rounded-5'> Sudah ditinjau</div>";
                                echo "<a href='../controller/Controller.php?u=revert-pengaduan&id_pengaduan=" . $fetch_pengaduan['id_pengaduan'] . "' class='btn btn-sm btn-outline-danger rounded-5 d-flex justify-content-center mt-2' onclick='return confirm(`Apakah ingin mengubah pengaduan ini ke belum ditinjau?`);'><i class='bi bi-x-octagon-fill'></i></a>";
                            }
                            ?>
                        </td>
                        <td>
                            <!-- <a href="#" class="btn btn-sm btn-outline-warning rounded-5"><i class="bi bi-pencil-square"></i></a> -->
                            <a href="../controller/Controller.php?u=delete-masyarakat&nik=<?= $fetch_pengaduan['nik_masyarakat']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger rounded-5"><i class="bi bi-trash"></i></a>
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
    var exampleModal = document.getElementById('FotoKejadian')
      exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var path = button.getAttribute('data-bs-path')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyImg = exampleModal.querySelector('.modal-body img')

        modalTitle.textContent = 'Lihat Foto Kejadian'
        modalBodyImg.src = path
    })
  </script>
</body>

</html>