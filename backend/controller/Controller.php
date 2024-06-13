<?php
include "Database.php";
include "Function.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ----------------------------------
// Basic Function Call By GET Method
// ----------------------------------
// Initialize
if(isset($_GET["u"])){
    $u=$_GET['u'];
}else{
    $u="0";
}
// Hapus Riwayat
if($u=="hapus-pengaduan"){
    $id_pengaduan=$_GET['id'];
    deleteRiwayat($id_pengaduan);
}

// Hapus Masyarakat
if($u=="delete-masyarakat"){
    $nik_masyarakat=$_GET['nik'];
    deleteMasyarakat($nik_masyarakat);
}

// Hapus Operator
if($u=="delete-operator"){
    $id_operator=$_GET['id_operator'];
    deleteOperator($id_operator);
}

// Tinjau Pengaduan
if($u=="tinjau-pengaduan"){
    $id_pengaduan=$_GET['id_pengaduan'];
    tinjauPengaduan($id_pengaduan);
}

// Tinjau Pengaduan
if($u=="revert-pengaduan"){
    $id_pengaduan=$_GET['id_pengaduan'];
    revertPengaduan($id_pengaduan);
}

// Logout
if($u=="logout"){
    Logout();
}

if($u=="logout-operator"){
    LogoutOperator();
}

if(isset($_POST['login'])){
    $nik_masyarakat = mysqli_real_escape_string($conn, $_POST['nik_masyarakat']);
    $password_masyarakat = mysqli_real_escape_string($conn, $_POST['password_masyarakat']);
    loginMasyarakat($nik_masyarakat,$password_masyarakat);
}

if(isset($_POST['register'])){
    $nik_masyarakat = mysqli_real_escape_string($conn, $_POST['nik_masyarakat']);
    $password_masyarakat = mysqli_real_escape_string($conn, $_POST['password_masyarakat']);
    $password_masyarakat_verification = mysqli_real_escape_string($conn, $_POST['password_masyarakat_verification']);
    $namalengkap_masyarakat = mysqli_real_escape_string($conn, $_POST['namalengkap_masyarakat']);
    $email_masyarakat = mysqli_real_escape_string($conn, $_POST['email_masyarakat']);
    $notelp_masyarakat = mysqli_real_escape_string($conn, $_POST['notelp_masyarakat']);
    if($password_masyarakat != $password_masyarakat_verification){
        echo "<script>alert('Gagal register, password pertama dan password verifikasi tidak sama. silahkan coba lagi');</script>";
    }else{
        registerMasyarakat($nik_masyarakat,$password_masyarakat,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat);
    }
}

if(isset($_POST['tambahMasyarakat'])){
    $nik_masyarakat = mysqli_real_escape_string($conn, $_POST['nik_masyarakat']);
    $password_masyarakat = mysqli_real_escape_string($conn, $_POST['password_masyarakat']);
    $password_masyarakat_verification = mysqli_real_escape_string($conn, $_POST['password_masyarakat_verification']);
    $namalengkap_masyarakat = mysqli_real_escape_string($conn, $_POST['namalengkap_masyarakat']);
    $email_masyarakat = mysqli_real_escape_string($conn, $_POST['email_masyarakat']);
    $notelp_masyarakat = mysqli_real_escape_string($conn, $_POST['notelp_masyarakat']);
    if($password_masyarakat != $password_masyarakat_verification){
        echo "<script>alert('Gagal register, password pertama dan password verifikasi tidak sama. silahkan coba lagi');</script>";
    }else{
        registerMasyarakatBackend($nik_masyarakat,$password_masyarakat,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat);
    }
}

if(isset($_POST['update-masyarakat'])){
    $nik_masyarakat = mysqli_real_escape_string($conn, $_POST['nik_masyarakat']);
    $password_masyarakat = mysqli_real_escape_string($conn, $_POST['password_masyarakat']);
    $password_masyarakat_verification = mysqli_real_escape_string($conn, $_POST['password_masyarakat_verification']);
    $namalengkap_masyarakat = mysqli_real_escape_string($conn, $_POST['namalengkap_masyarakat']);
    $email_masyarakat = mysqli_real_escape_string($conn, $_POST['email_masyarakat']);
    $notelp_masyarakat = mysqli_real_escape_string($conn, $_POST['notelp_masyarakat']);
    updateMasyarakatBackend($nik_masyarakat,$password_masyarakat,$password_masyarakat_verification,$namalengkap_masyarakat,$email_masyarakat,$notelp_masyarakat);
}

// Pengaduan Function
// Tambah Pengaduan
if(isset($_POST['tambah-pengaduan'])){
    $nik_masyarakat = mysqli_real_escape_string($conn, $_POST['nik_masyarakat']);
    $file = mysqli_real_escape_string($conn, $_POST['file']);
    $tanggalkejadian_pengaduan = mysqli_real_escape_string($conn, $_POST['tanggalkejadian_pengaduan']);
    $lokasikejadian_pengaduan = mysqli_real_escape_string($conn, $_POST['lokasikejadian_pengaduan']);
    $isilaporan_pengaduan = mysqli_real_escape_string($conn, $_POST['isilaporan_pengaduan']);
    tambahPengaduan($nik_masyarakat,$file,$tanggalkejadian_pengaduan,$lokasikejadian_pengaduan,$isilaporan_pengaduan);
}

// Cetak Laporan
if(isset($_POST['cetak-laporan'])){
    $tanggal_1 = mysqli_real_escape_string($conn, $_POST['tanggal_1']);
    $tanggal_2 = mysqli_real_escape_string($conn, $_POST['tanggal_2']);
    $filter_laporan = mysqli_real_escape_string($conn, $_POST['filter_laporan']);
    $data_laporan = cetakLaporan($tanggal_1,$tanggal_2,$filter_laporan);
    include "../view/cetak-laporan.php";
}


// Backend
if(isset($_POST['login-operator'])){
    $username_operator = mysqli_real_escape_string($conn, $_POST['username_operator']);
    $password_operator = mysqli_real_escape_string($conn, $_POST['password_operator']);
    loginOperator($username_operator,$password_operator);
}


// Akun Operator
if(isset($_POST['ubahakunoperator'])){
    $id_operator = mysqli_real_escape_string($conn, $_POST['id_operator']);
    $username_operator = mysqli_real_escape_string($conn, $_POST['username_operator']);
    $nama_operator = mysqli_real_escape_string($conn, $_POST['nama_operator']);
    $verifikasi_password = mysqli_real_escape_string($conn, $_POST['verifikasi_password']);
    $password_baru = mysqli_real_escape_string($conn, $_POST['password_baru']);
    ubahAkunOperator($id_operator,$username_operator,$nama_operator,$verifikasi_password,$password_baru);
}

// Akun Operator
if(isset($_POST['editoperator'])){
    $id_operator = mysqli_real_escape_string($conn, $_POST['id_operator']);
    $username_operator = mysqli_real_escape_string($conn, $_POST['username_operator']);
    $nama_operator = mysqli_real_escape_string($conn, $_POST['nama_operator']);
    $password_baru = mysqli_real_escape_string($conn, $_POST['password_baru']);
    editAkunOperator($id_operator,$username_operator,$nama_operator,$password_baru);
}

// Tambah Operator
if(isset($_POST['tambahakunoperator'])){
    $username_operator = mysqli_real_escape_string($conn, $_POST['username_operator']);
    $password_operator = mysqli_real_escape_string($conn, $_POST['password_operator']);
    $password_operator_verif = mysqli_real_escape_string($conn, $_POST['password_operator_verif']);
    $nama_operator = mysqli_real_escape_string($conn, $_POST['nama_operator']);
    if($password_operator!=$password_operator_verif){
        echo "<script>alert('Password Konfirmasi salah, silahkan coba lagi.');window.location='../view/data-operator.php';</script>";
    }else{
        tambahOperator($username_operator,$password_operator,$nama_operator);
    }
}
?>