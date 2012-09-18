<?php
//buka koneksi
include_once ('koneksi.php');
//kirim query
$qry = "SELECT * FROM komentar ORDER by idComment desc LIMIT 0,8";
$hasil = mysql_query($qry);
while ($row = mysql_fetch_array($hasil)){
//bikin tabel
$komentar = substr($row['comment'],0,70)."...";
$id = stripslashes($row['idArtikel']);
echo "<ul>\n";
echo "  <li><a href=newsdetail.php?id=$id>$komentar</a></li> \n";
echo "</ul>\n";}
?>