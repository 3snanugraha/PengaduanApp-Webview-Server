<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Front End 
    // Basic Function
    function sessionCheck(){
        session_start();
        if(empty($_SESSION['nik_masyarakat']) && empty($_SESSION['password_masyarakat'])){
            echo "<script>alert('Maaf sesi telah habis.');window.location = '../frontend/index.php';</script>";
        }
    }

    function loginCheck(){
        session_start();
        if(!empty($_SESSION['nik_masyarakat']) && !empty($_SESSION['password_masyarakat'])){
            echo "<script>window.location = '../frontend/dashboard.php';</script>";
        }
    }


    // Account Function
    function loginMasyarakat($nik_masyarakat,$password_masyarakat){
        include "Database.php";
        session_start();
        $password_masyarakat_enc = md5($password_masyarakat);
        $logindata = mysqli_query($conn, "SELECT * FROM tb_masyarakat WHERE nik_masyarakat='$nik_masyarakat' AND password_masyarakat='$password_masyarakat_enc'");
        $data = mysqli_fetch_array($logindata);
        if (!empty($data['nik_masyarakat'])){
            $_SESSION['nik_masyarakat'] = $data['nik_masyarakat'];
            $_SESSION['password_masyarakat'] = $data['password_masyarakat'];
            $_SESSION['namalengkap_masyarakat'] = $data['namalengkap_masyarakat'];
            header('location:../../frontend/dashboard.php');
        }else{
            echo "<script>alert('Login Gagal Username / Password Tidak Cocok'); window.location = '../../frontend/index.php'</script>";
        }
    }

    function Logout(){
        session_start();
        session_destroy();
        echo "<script>alert('Logout Success.'); window.location = '../../frontend/index.php';</script>";
    }
    

    // Masyarakat Function
    // Register
    function registerMasyarakat($nik_masyarakat,$password_masyarakat,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat){
        include "Database.php";
            $password_masyarakat_enc = md5($password_masyarakat);
            $result = mysqli_query($conn, "INSERT INTO tb_masyarakat(`nik_masyarakat`,`password_masyarakat`,`namalengkap_masyarakat`,`email_masyarakat`,`notelp_masyarakat`)VALUES('$nik_masyarakat','$password_masyarakat_enc','$namalengkap_masyarakat','$email_masyarakat','$notelp_masyarakat')");
        
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }else{
                echo "<script>alert('Register berhasil, silahkan login.');window.location='../../frontend/index.php';</script>";
            }

    }


    // Pengaduan Function
    // Get Panduan
    function getPanduan(){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_panduan");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array_panduan = [];
        while ($box = mysqli_fetch_array($result)) {
            $array_panduan[] = $box;
        }
        return $array_panduan;
    }

    function tambahPengaduan($nik_masyarakat,$file,$tanggalkejadian_pengaduan,$lokasikejadian_pengaduan,$isilaporan_pengaduan){
        include "Database.php";
        if(empty($_FILES['file']['name'])){
            $file="fotostandar.png";
        }else{
            $extensionList = array("bmp", "jpg", "gif", "png", "jpeg");
            $fileName = $_FILES['file']['name'];
            $pecah = explode(".", $fileName);
            $ekstensi = $pecah[1];
            
            $target_dir="../../assets/img/";
            $target_file=$target_dir . basename($_FILES["file"]["name"]);
            $ekstensi_file=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $size_file= $_FILES["file"]["size"];
            $tipe_file= $_FILES["file"]["type"];
            $file=date("dmyyhis") . "." . $ekstensi_file;
        }

        if (in_array($ekstensi, $extensionList))
        {
            if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir . $file)) {
                    //insert data
                        $query=mysqli_query($conn, "INSERT INTO tb_pengaduan(`nik_masyarakat`,`fotokejadian_pengaduan`,`tanggalkejadian_pengaduan`,`lokasikejadian_pengaduan`,`isilaporan_pengaduan`,`statuspengaduan_pengaduan`)VALUES('$nik_masyarakat','$file','$tanggalkejadian_pengaduan','$lokasikejadian_pengaduan','$isilaporan_pengaduan','0')");
                    //end sql insert
                    if($query){
                        echo "<script>alert('Pengaduan berhasil dikirim.');window.location='../../frontend/riwayat.php';</script>";
                    }else{
                        echo "<script>alert('Pengaduan Gagal ditambahkan.');window.location='../../frontend/pengaduan.php';</script>";
                    }
                    // End Insert Data
            }else{
                echo "Gagal diupload";
            }
        
        }
    }

    // Tinjau Pengaduan
    function tinjauPengaduan($id_pengaduan){
        include "Database.php";
        $result = mysqli_query($conn, "UPDATE tb_pengaduan SET statuspengaduan_pengaduan='1' WHERE id_pengaduan='$id_pengaduan'");
        if($result){
            echo "<script>alert('Pengaduan berhasil diupdate ke Ditinjau');window.location='../view/data-pengaduan.php';</script>";
        }else{
            echo "<script>alert('Error pengaduan tidak dapat diupdate.');window.location='../view/data-pengaduan.php';</script>";
        }
    }

    // Revert Pengaduan
    function revertPengaduan($id_pengaduan){
        include "Database.php";
        $result = mysqli_query($conn, "UPDATE tb_pengaduan SET statuspengaduan_pengaduan='0' WHERE id_pengaduan='$id_pengaduan'");
        if($result){
            echo "<script>alert('Pengaduan berhasil diupdate ke Belum ditinjau');window.location='../view/data-pengaduan.php';</script>";
        }else{
            echo "<script>alert('Error pengaduan tidak dapat diupdate.');window.location='../view/data-pengaduan.php';</script>";
        }
    }

    function getRiwayat($nik_masyarakat){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.nik_masyarakat=tb_masyarakat.nik_masyarakat WHERE tb_pengaduan.nik_masyarakat='$nik_masyarakat'");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array_riwayat = [];
        while ($box = mysqli_fetch_array($result)) {
            $array_riwayat[] = $box;
        }
        return $array_riwayat;
    }

    function deleteRiwayat($id_pengaduan){
        include "Database.php";
        $datafoto = mysqli_fetch_array(mysqli_query($conn, "SELECT fotokejadian_pengaduan FROM tb_pengaduan WHERE id_pengaduan='$id_pengaduan'"));
        $fotokejadian_pengaduan = $datafoto['fotokejadian_pengaduan'];
        $filepath = "../../assets/img/" . $fotokejadian_pengaduan;

        $result = mysqli_query($conn, "DELETE FROM tb_pengaduan WHERE id_pengaduan='$id_pengaduan'");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }else{
            echo "<script>alert('Delete riwayat berhasil.');window.location='../../frontend/riwayat.php';</script>";
            if($fotokejadian_pengaduan!='fotostandar.png'){
                unlink($filepath);
            }
        }
    }

// Backend Function

    function LogoutOperator(){
        session_start();
        session_destroy();
        echo "<script>alert('Logout Success.'); window.location = '../index.php';</script>";
    }

    // Ubah Akun
    function ubahAkunOperator($id_operator,$username_operator,$nama_operator,$verifikasi_password,$password_baru){
        include "Database.php";
        $verif_query=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_operator WHERE id_operator='$id_operator'"));
        $verifikasi_password_enc = md5($verifikasi_password);
        // Lakukan verifikasi terlebih dahulu
        if($verifikasi_password_enc==$verif_query['password_operator']){
            // Jika Berhasil verifikasi, logika ini dijalankan
            // Jika tidak terdapat password baru
            if($password_baru==''){
                $result=mysqli_query($conn, "UPDATE tb_operator SET 
                username_operator='$username_operator',
                nama_operator='$nama_operator'
                WHERE id_operator='$id_operator'");
                if($result){
                    echo "<script>alert('Berhasil ubah informasi akun, Silahkan login kembali.');window.location='Controller.php?u=logout-operator';</script>";
                }
            // Jika ada password baru
            }else if(!empty($password_baru)){
                $result=mysqli_query($conn, "UPDATE tb_operator SET 
                username_operator='$username_operator',
                nama_operator='$nama_operator',
                password_operator='$password_baru'
                WHERE id_operator='$id_operator'");
                if($result){
                    echo "<script>alert('Berhasil ubah informasi akun, Silahkan login kembali.');window.location='Controller.php?u=logout-operator';</script>";
                }
            }
        }else{
            echo "<script>alert('Password verifikasi (password saat ini) salah, silahkan coba lagi.');window.location='../view/index.php';</script>";
        }
    }

    // Edit Akun Oleh Admin
    function editAkunOperator($id_operator,$username_operator,$nama_operator,$password_baru){
        include "Database.php";
            // Tanpa Password Baru
            if($password_baru==''){
                $result=mysqli_query($conn, "UPDATE tb_operator SET 
                username_operator='$username_operator',
                nama_operator='$nama_operator'
                WHERE id_operator='$id_operator'");
                if($result){
                    echo "<script>alert('Berhasil ubah informasi akun.');window.location='../view/data-operator.php';</script>";
                }
            // Jika ada password baru
            }else if(!empty($password_baru)){
                $password_baru_enc=md5($password_baru);
                $result=mysqli_query($conn, "UPDATE tb_operator SET 
                username_operator='$username_operator',
                nama_operator='$nama_operator',
                password_operator='$password_baru_enc'
                WHERE id_operator='$id_operator'");
                if($result){
                    echo "<script>alert('Berhasil ubah informasi akun.');window.location='../view/data-operator.php';</script>";
                }
            }

    }

    // Fungsi Login
    function loginOperator($username_operator,$password_operator){
        include "Database.php";
        session_start();
        $password_operator_enc = md5($password_operator);
        $logindata = mysqli_query($conn, "SELECT * FROM tb_operator WHERE username_operator='$username_operator' AND password_operator='$password_operator_enc'");
        $data = mysqli_fetch_array($logindata);
        if (!empty($data['username_operator'])){
            $_SESSION['id_operator'] = $data['id_operator'];
            $_SESSION['username_operator'] = $data['username_operator'];
            $_SESSION['password_operator'] = $data['password_operator'];
            $_SESSION['nama_operator'] = $data['nama_operator'];
            $_SESSION['role'] = $data['role'];
            header('location:../view/index.php');
        }else{
            echo "<script>alert('Login Gagal Username / Password Tidak Cocok'); window.location = '../index.php'</script>";
        }
    }

    function loginCheckOperator(){
        session_start();
        if(!empty($_SESSION['username_operator']) && !empty($_SESSION['password_operator'])){
            echo "<script>window.location = '../view/index.php';</script>";
        }
    }

    function sessionCheckOperator(){
        session_start();
        if(empty($_SESSION['username_operator']) && empty($_SESSION['password_operator'])){
            echo "<script>alert('Maaf sesi telah habis.');window.location = '../index.php';</script>";
        }
    }

    // Sum Dashboard
    function JumlahPengguna(){
        include "Database.php";  
        $result=mysqli_query($conn, "SELECT * FROM tb_masyarakat");
        if ($result) 
        { 
            $sum = mysqli_num_rows($result);
            echo $sum;
            mysqli_free_result($result); 
        } 
    }

    function JumlahOperator(){
        include "Database.php";  
        $result=mysqli_query($conn, "SELECT * FROM tb_operator");
        if ($result) 
        { 
            $sum = mysqli_num_rows($result);
            echo $sum;
            mysqli_free_result($result); 
        } 
    }

    function JumlahPengaduan(){
        include "Database.php";  
        $result=mysqli_query($conn, "SELECT * FROM tb_pengaduan");
        if ($result) 
        { 
            $sum = mysqli_num_rows($result);
            echo $sum;
            mysqli_free_result($result); 
        } 
    }

    // Pengaduan Terbaru
    function pengaduanTerbaru(){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_pengaduan WHERE statuspengaduan_pengaduan='0' ORDER BY tanggalkejadian_pengaduan DESC LIMIT 5");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array_pt = [];
        while ($box = mysqli_fetch_array($result)) {
            $array_pt[] = $box;
        }
        return $array_pt;
    }

    // Data Pengguna
    // Get Data Pengguna
    function getDataMasyarakat(){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_masyarakat");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array = [];
        while ($box = mysqli_fetch_array($result)) {
            $array[] = $box;
        }
        return $array;
    }

    // Get Data Pengguna
    function deleteMasyarakat($nik_masyarakat){
        include "Database.php";
        $result = mysqli_query($conn, "DELETE FROM tb_masyarakat WHERE nik_masyarakat='$nik_masyarakat'");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }else{
            echo "<script>alert('Delete masyarakat berhasil.');window.location='../view/data-pengguna.php';</script>";
        }
    }

    function registerMasyarakatBackend($nik_masyarakat,$password_masyarakat,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat){
        include "Database.php";
            $password_masyarakat_enc = md5($password_masyarakat);
            $result = mysqli_query($conn, "INSERT INTO tb_masyarakat(`nik_masyarakat`,`password_masyarakat`,`namalengkap_masyarakat`,`email_masyarakat`,`notelp_masyarakat`)VALUES('$nik_masyarakat','$password_masyarakat_enc','$namalengkap_masyarakat','$email_masyarakat','$notelp_masyarakat')");
        
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }else{
                echo "<script>alert('Tambah data berhasil.');window.location='../view/data-pengguna.php';</script>";
            }

    }

    function updateMasyarakatBackend($nik_masyarakat,$password_masyarakat,$password_masyarakat_verification,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat){
        include "Database.php";
            if($password_masyarakat==''){
                $result = mysqli_query($conn, "UPDATE tb_masyarakat SET 
                `namalengkap_masyarakat`='$namalengkap_masyarakat',
                `email_masyarakat`='$email_masyarakat',
                `notelp_masyarakat`='$notelp_masyarakat'
                WHERE `nik_masyarakat`='$nik_masyarakat'");
            
                if (!$result) {
                    die("Query error: " . mysqli_error($conn));
                }else{
                    echo "<script>alert('Update data berhasil.');window.location='../view/data-pengguna.php';</script>";
                }
            }else{
                if($password_masyarakat!=$password_masyarakat_verification){
                    echo "<script>alert('Gagal update data, password verifikasi tidak sama. silahkan coba lagi.');window.location='../view/data-pengguna.php';</script>";
                }else{
                    $password_masyarakat_enc = md5($password_masyarakat);
                    $result = mysqli_query($conn, "UPDATE tb_masyarakat SET 
                        `password_masyarakat`='$password_masyarakat_enc',
                        `namalengkap_masyarakat`='$namalengkap_masyarakat',
                        `email_masyarakat`='$email_masyarakat',
                        `notelp_masyarakat`='$notelp_masyarakat'
                        WHERE `nik_masyarakat`='$nik_masyarakat'");
                    
                        if (!$result) {
                            die("Query error: " . mysqli_error($conn));
                        }else{
                            echo "<script>alert('Update data berhasil.');window.location='../view/data-pengguna.php';</script>";
                        }
                }
            }
            
    }

    // Laporan Warga
    function getPengaduan(){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.nik_masyarakat=tb_masyarakat.nik_masyarakat");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array = [];
        while ($box = mysqli_fetch_array($result)) {
            $array[] = $box;
        }
        return $array;
    }


    // Operator
    function getOperator(){
        include "Database.php";
        $result = mysqli_query($conn, "SELECT * FROM tb_operator WHERE id_operator!='99'");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
    
        $array = [];
        while ($box = mysqli_fetch_array($result)) {
            $array[] = $box;
        }
        return $array;
    }

    // Tambah Operator
    function tambahOperator($username_operator,$password_operator,$nama_operator){
        include "Database.php";
            $password_operator_enc = md5($password_operator);
            $result = mysqli_query($conn, "INSERT INTO tb_operator(`username_operator`,`password_operator`,`nama_operator`,`role`)VALUES('$username_operator','$password_operator_enc','$nama_operator','0')");
        
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }else{
                echo "<script>alert('Tambah data berhasil.');window.location='../view/data-operator.php';</script>";
            }

    }

    // Hapus Operator
    function deleteOperator($id_operator){
        include "Database.php";
        $result = mysqli_query($conn, "DELETE FROM tb_operator WHERE id_operator='$id_operator'");
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }else{
            echo "<script>alert('Delete operator berhasil.');window.location='../view/data-operator.php';</script>";
        }
    }

    // Cetak Laporan
    function cetakLaporan($tanggal_1,$tanggal_2,$filter_laporan){
        include "Database.php";
        if($filter_laporan=='2'){
            $result = mysqli_query($conn, "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.nik_masyarakat=tb_masyarakat.nik_masyarakat WHERE tanggalkejadian_pengaduan BETWEEN '$tanggal_1' AND '$tanggal_2'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }
        
            $array_pengaduan = [];
            while ($box = mysqli_fetch_array($result)) {
                $array_pengaduan[] = $box;
            }
            return $array_pengaduan;
        }else{
            $result = mysqli_query($conn, "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.nik_masyarakat=tb_masyarakat.nik_masyarakat WHERE statuspengaduan_pengaduan='$filter_laporan' AND tanggalkejadian_pengaduan BETWEEN '$tanggal_1' AND '$tanggal_2'");
            if (!$result) {
                die("Query error: " . mysqli_error($conn));
            }
        
            $array_pengaduan = [];
            while ($box = mysqli_fetch_array($result)) {
                $array_pengaduan[] = $box;
            }
            return $array_pengaduan;
        }
    }
?>