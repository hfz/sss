<?php
include('../koneksi.php');
//tangkap data dari form
$id = $_POST['idKategori'];
$password = $_POST['nm_kategori'];
$fullname = $_POST['ket_kategori'];
//update data di database sesuai user_id
$query = mysql_query("update kategori set nm_kategori='$password', ket_kategori='$fullname' where idKategori='$id'") or die(mysql_error());
if ($query) {
	header('location:kategori.php?message=success');
}
?>