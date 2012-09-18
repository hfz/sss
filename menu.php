<?php 
include ('koneksi.php');
$query = mysql_query("SELECT * FROM kategori ") or die(mysql_error());
echo "<li><a class=current href=index.php><img class=home src=images/img-trans.gif height=14 width=14/> Home</a></li>";
while ($row=mysql_fetch_array($query)){
echo "     <li><a href=kategori-list.php?id=$row[idKategori]>$row[nm_kategori]</a></li>";
}
?>