<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pengaduan</title>

<!-- Favicons -->
  <link href="../../assets/img/logo-transparent.png" rel="icon">
  <link href="../../assets/img/logo-transparent.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <style>
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: black;
    }
  </style>
</head>
<body>
    <div class="row text-center mt-2">
        <h1>Aplikasi Pengaduan</h1>
        <h2>Desa Kekiling</h2>
    </div>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="container">
            <p class="text-center"><b>Laporan Pengaduan</b></p>
            <p>Periode Laporan : <?= "<b>" . $tanggal_1 . " s/d " . $tanggal_2 . "</b>"; ?></p>
            <table id="customers">
            <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Tempat Kejadian</th>
                    <th>Keterangan</th>
                    <th>Tgl Kejadian</th>
                    <th>Status</th>
            </tr>
            <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $no=0;
                foreach($data_laporan as $fetch_pengaduan){   
            ?>
                <tr>
                    <tr>
                    <td><?= ++$no;?></td>
                    <td><?= $fetch_pengaduan['namalengkap_masyarakat']; ?></td>
                    <td><?= $fetch_pengaduan['lokasikejadian_pengaduan']; ?></td>
                    <td><?= $fetch_pengaduan['isilaporan_pengaduan']; ?></td>
                    <td><?= $fetch_pengaduan['tanggalkejadian_pengaduan']; ?></td>
                    <td>
                        <?php
                        if($fetch_pengaduan['statuspengaduan_pengaduan']=='0'){
                            echo "Belum Ditinjau";
                        }else if($fetch_pengaduan['statuspengaduan_pengaduan']=='1')
                            echo "Sudah Ditinjau";
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>