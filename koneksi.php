<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "siberol";
// Koneksi dan memilih database di server 
mysql_connect($server,$user,$pass) or die("Koneksi Gagal");
mysql_select_db($database) or die("Database tidak ditemukan");
?>