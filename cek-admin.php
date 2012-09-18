<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if($_SESSION['level']==0)
	{
	header("Location:wartawan/berita-tambah.php");
	}
  else 
	{ 
	header("location:redaktur/berita.php");
	}

?>