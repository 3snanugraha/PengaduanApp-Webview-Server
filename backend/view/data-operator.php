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
      <h1>Data Operator</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Operator</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

                <div class="card rounded-5 shadow">
                <div class="card-body">
                    <h5 class="card-title">Data Operator </h5>
                    <p>Berikut adalah semua data Operator. Gunakan filter <code>.Search</code> untuk mengolah data. klik refresh untuk melakukan refreshing data.</p>
                    <?php if($_SESSION['role']==1){
                      echo '<a href="#" data-bs-toggle="modal" data-bs-target="#tambahOperator" class="btn btn-outline-success rounded-5"><i class="bi bi-person-plus"></i> Tambahkan Operator</a>';
                    }
                    ?>
                    <a href="#" onclick="location.reload();" class="btn btn-outline-warning rounded-5"><i class="bi bi-arrow-clockwise"></i>Refresh</a>
                    <br><br>
                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                    <table class="table datatable">
                    <thead>
                        <tr>
                        <th scope="col">#No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama Operator</th>
                        <?php if($_SESSION['role']==1){
                        echo '<th scope="col">Aksi</th>';
                        }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $data_pg = getOperator(); $num=0;
                        foreach($data_pg as $fetch_operator){
                        $num++;
                        ?>
                        <tr>
                        <th scope="row"><?= $num; ?></th>
                        <td><?= $fetch_operator['username_operator'];?></td>
                        <td>
                        <?php if($_SESSION['role']==1){
                          echo $fetch_operator['password_operator'];
                        }else{
                          echo '<div class="badge bg-warning rounded-5">Tidak dapat dilihat</div>';
                        }
                        ?>
                        </td>
                        <td><?= $fetch_operator['nama_operator'];?></td>
                        <td>
                        <?php if($_SESSION['role']==1){
                          ?>
                            <a href="#" class="btn btn-sm btn-outline-warning rounded-5" data-bs-toggle="modal" data-bs-target="#edit-operator" 
                            data-bs-idoperator="<?= $fetch_operator['id_operator'];?>"
                            data-bs-username="<?= $fetch_operator['username_operator'];?>"
                            data-bs-nama="<?= $fetch_operator['nama_operator'];?>"
                            ><i class="bi bi-pencil-square"></i></a>
                            <a href="../controller/Controller.php?u=delete-operator&id_operator=<?= $fetch_operator['id_operator']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data ini?');" class="btn btn-sm btn-outline-danger rounded-5"><i class="bi bi-trash"></i></a>
                         <?php } ?>
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
  <!-- Modal handler -->
  <script>
    var ModalEditOperator = document.getElementById('edit-operator')
      ModalEditOperator.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id_operator = button.getAttribute('data-bs-idoperator')
        var username_operator = button.getAttribute('data-bs-username')
        var nama_operator = button.getAttribute('data-bs-nama')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = ModalEditOperator.querySelector('.modal-title')
        var username_inp = ModalEditOperator.querySelector('.modal-body #username_operator')
        var nama_inp = ModalEditOperator.querySelector('.modal-body #nama_operator')
        var id_inp = ModalEditOperator.querySelector('.modal-body #id_operator')

        modalTitle.textContent = 'Edit Data Operator Username : ' + username_operator
        id_inp.value = id_operator
        username_inp.value = username_operator
        nama_inp.value = nama_operator
    })
  </script>

</body>

</html>