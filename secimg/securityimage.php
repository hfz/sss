<?php
//Nama File: securityimage.php
//-----------------------------
//
//ambil reference id

if (isset($_GET['refid'])){
  $refid = $_GET['refid'];
} else {
  $refid = md5(rand(0,999999));
}
//select font dulu
$font = "trebuc.ttf";
//select image backeground --> random
$idx = rand(1,3); //random dari 1 s/d 3 (integer: 1,2,3)
$bground = "bg$idx.png";
// create image di memori. -> menggunakan bground. bground = random dari bg.png.
// kita akan buat gambar dari background ini. seberapa besar, tergantung dari ukuran background
$im = imagecreatefrompng($bground);
//siapkan string text --> random
$chars = array ("1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
$length = 6; //pjgnya. Untuk campurin angka dan huruf, jangan buat user bingung untuk bedain o dan 0. pakai salah satu aja.
//saya akan buat string sepanjang 4.
$textnya = "";
for ($i = 0; $i <$length; $i++)
{
	$textnya .=$chars[rand(0,count($chars)-1)];
}
//echo "---$textnya--";
//tentukan ukuran font, sudut menulis, dan warna
$size  = rand(14,20); //ukuran font dari 14 s/d 20 --> supaya ada space di atas dan dibawah. karena belum tentu tulisnya horizontal. ada sudut untuk tulisan.
$angle = rand(-5,5); //sudut dari -5 ke 5
$warna = imagecolorallocate($im,rand(0,128),rand(0,128),rand(0,128)); //warna adalah sebuah pallet = kumpulan warna. function ini parameternya ada 4 yaitu obj image, R, G,B. warna dirandom. 0 - 128 = warna agak gelap.
//hitung ukuran text untuk menentukan koordinat penulisan
$textsize = imagettfbbox($size, $angle,$font, $textnya); //menghasilkan array dgn 8 elemen
$lebar = abs($textsize[2]-$textsize[0]);
$tinggi = abs($textsize[5]-$textsize[3]);
//tentukan koordinat penulisan
$x = imagesx($im)/2-($lebar/2);
$y = imagesy($im)- ($tinggi/2);
//tuliskan text ke gambar menggunakan semua parameter
imagettftext($im,$size, $angle,$x,$y,$warna,$font,$textnya);
//kirim ke browser
header("Content-Type: image/png");
imagepng($im);
//jangan lupa bebaskan memori
imageDestroy($im);
//simpan pasangan reference id dan textnya
include_once ('../koneksi.php');
//mysql_connect ("localhost","root","") or die ("MySQL error!");
//mysql_select_db("siberol") or die ("DB error!");
$qry = "INSERT INTO secimg (referenceid, hiddentext) VALUES ('$refid', '$textnya')";
mysql_query($qry) or die ("INSERT gagal!");
//hapus refence id dan hiddentext yang sudah berumur lebih dari 5 menit
$qry = "DELETE FROM secimg WHERE tanggal < date_sub(now(), interval 5 minute)";
mysql_query($qry) or die ("DELETE gagal!");
// SELESAI
?>
