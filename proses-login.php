<?php
//terima input dulu
$username=$_POST['username'];
$password=$_POST['password'];

if (empty($username) && empty($password)) {
//kalau username dan password kosong
	header('location:index.php?error=1');
	break;
	} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:index.php?error=2');
	break;
	} else if (empty($password)) {
	//kalau password saja yang kosong
	//redirect ke halaman index
	header('location:index.php?error=3');
	break;
}

$password=md5($_POST['password']);

//koneksi ke DB
include_once ('koneksi.php');
//KIRIM QUERY
$qry = "SELECT  * from user WHERE username ='$username' AND password='$password'";  //CEK ke table user
$hasil = mysql_query($qry);
//apakah ada?
$ada= mysql_num_rows($hasil);
if($ada == 0)
	{
		header('location:index.php?error=4');
	}
	else
	{
		//cek security code
		$refid = $_POST ['refid'];
		$seccode = $_POST ['seccode'];
		$qry2 = "SELECT  * from secimg WHERE referenceid ='$refid' AND hiddentext='$seccode'";  //CEK ke table user
		$hasil2 = mysql_query($qry2);
		//apakah ada?
		$ada2= mysql_num_rows($hasil2);
		if($ada2 == 0)
			{	
			header('location:index.php?error=5');
			//end cek security code
			}
		else
			{
			//kalau username, password, dan seccode benar
			$row = mysql_fetch_array($hasil);
			$nama_lengkap=$row[nama_lengkap];
			$level=$row[level];
			$idUser=$row[idUser];
			//cara kirim nilai dg menggunakan variable session spy user gak sembarang bisa lihat halaman admin dgn ganti di url.
			session_start();
			$_SESSION ['ok']=1234;
			$_SESSION['idUser']=$idUser;
			$_SESSION['level']=$level;
			$_SESSION['nama_lengkap']=$nama_lengkap;
			$_SESSION['username'] = $username;
			header("Location:index.php");
			/** if($level==0)
			  {
			  header("Location:index.php");
			  }
			else 
			  { 
			  header("location:user.php");
			  } **/
		  }
	}
?>