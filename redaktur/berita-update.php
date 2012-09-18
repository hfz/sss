<?php
// terima input dari halaman sebelumnya
$id = $_POST['id'];
$judul = stripslashes($_POST['judul']);
$kategori=$_POST['kategori'];
$isi = $_POST['isi'];
$tgltayang = $_POST['tgltayang'];
$tglexpire = $_POST['tglexpire'];
$status = $_POST['status'];
$judul=mysql_escape_string(nl2br(stripslashes($judul)));
// koneksi ke DB
include ('../koneksi.php');
$query = mysql_query("UPDATE berita SET judul='$judul', idKategori='$kategori', isi='$isi', tgl_tayang='$tgltayang', tgl_expire='$tglexpire', status='$status' WHERE idberita = '$id' ") or die(mysql_error());
if ($query) {
	header('location:berita.php?message=success');
}?>