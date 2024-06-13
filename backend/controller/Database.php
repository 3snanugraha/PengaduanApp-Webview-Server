<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host="localhost";
$user="root";
$pass="";
$database="pengaduanapp";

$conn = new mysqli($host,$user,$pass,$database);

if (mysqli_connect_errno()){
		trigger_error("Koneksi gagal : " . mysqli_connect_error(), E_USER_ERROR);
		
		}
		
?>