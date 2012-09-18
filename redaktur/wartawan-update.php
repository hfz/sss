<?php
include('../koneksi.php');
//tangkap data dari form
$id = $_POST['idUser'];
$username = $_POST['username'];
$namalengkap = $_POST['nama_lengkap'];
//update data di database sesuai user_id
$query = mysql_query("update user set username='$username', nama_lengkap='$namalengkap' where idUser='$id'") or die(mysql_error());
if ($query) {
	header('location:wartawan.php?message=success');
}
?>