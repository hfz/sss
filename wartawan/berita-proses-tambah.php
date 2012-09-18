<?php
include_once ('../koneksi.php');
$namafolder="../gambar_berita/"; //tempat menyimpan file gambar
//terima input & siapkan parameter lain
$idUser = addslashes($_POST['idUser']);
$tgl = date("Y-m-d H:i:s");
$nama = addslashes($_POST['nm_wartawan']);
$judul= addslashes($_POST['judul']);
$isi = addslashes($_POST['isi']);
$gambar = "";
$gambar_thumb = "";
$kategori= addslashes($_POST['kategori']);
$tayang = "";
$expire = date("Y-m-d H:i:s", time() + 604800);
//kirim query
$fileName = $_FILES['picture']['name']; //get the file name
$fileSize = $_FILES['picture']['size']; //get the size
$fileError = $_FILES['picture']['error']; //get the error when upload
$move = move_uploaded_file($_FILES['picture']['tmp_name'], '../gambar_berita/'.$fileName); //save image to the folder
$query = mysql_query("INSERT INTO berita (idUser, nm_wartawan, judul, isi, gambar, gambar_thumb, idKategori, tgl_tayang, tgl_expire, status)
VALUES ('$idUser', '$nama', '$judul', '$isi', 'gambar_berita/$fileName', 'gambar_berita/thumb/$fileName', '$kategori', '$tayang', '$expire', '0')") or die(mysql_error());
if ($query) {
	header('location:berita-tambah.php?message=success');
}
?>