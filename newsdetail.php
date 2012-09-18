<?php session_start(); header('Content-type: text/html; charset=utf-8'); ?>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Siberol | Sistem Berita Online</title>
</head>
<body>
    <div id="content">
        <h1><span class="hr">SIBEROL</span></h1>
       <ul id="top">
            <?php if (!isset($_SESSION['username']) || empty($_SESSION['username'])){ echo "";}	else {echo "
			<ul>
			<li><a href=http://www.solucija.com/template/watch-this target=_blank><img class=template src=images/img-trans.gif height=14 width=14/> Template</a></li>
			<li><a href=about.php><img class=about src=images/img-trans.gif height=14 width=14/> About</a></li>
			<li><a href=cek-admin.php target=_blank><img class=admin src=images/img-trans.gif height=14 width=14/> Admin</a></li>
			<li><a href=logout.php><img class=logout src=images/img-trans.gif height=14 width=14/> Logout</a></li>
			</ul>"; 
			}
			?>
			</li>
        </ul>
        <ul id="menu">
            <?php include ('menu.php'); ?>
        </ul> 
        <div id="intro2">
            
        </div>
        <div id="left">
            <?php
            //buka koneksi
            include_once "koneksi.php";
			$x = $_GET['id'];
			// proses yang dilakukan setelah tombol submit komentar diklik
            if ($_GET['act'] == "submit")
            {
               // membaca data komentar dari form
               $nama = $_POST['nama'];
               $url = $_POST['url'];
			   $email = $_POST['email'];
               $komentar = $_POST['komentar'];
               $idArtikel = $_POST['idArtikel'];
               $tglKomentar = date("Y-m-d");
            
               // proses insert komentar ke database
               $query = "INSERT INTO komentar (idArtikel, commentAuthor, urlAuthor, emailAuthor, comment, commentDate)
                     VALUES ('$x', '$nama', 'http://$url', '$email', '$komentar', '$tglKomentar')";
               $hasil = mysql_query($query);
            }
            //membaca id berita
            $query = "SELECT * FROM berita WHERE idBerita = '$x'";
            $hasil = mysql_query($query);
            $data  = mysql_fetch_array($hasil);
			$rowset = mysql_query("SELECT * FROM kategori where idKategori = '".$data['idKategori']."'");
			$kategori = mysql_fetch_array($rowset);
			echo "<table border=0>";
			echo "<tr><td colspan =2><h2><a href=newsdetail.php?id=$x>".$data['judul']."</a></h2></td></tr>";
			echo "<tr><td colspan=2 class=wartawan>";
			echo "<img class=penulis src=images/img-trans.gif height=14 width=14/> $data[nm_wartawan] ";
			echo "<img class=tanggal src=images/img-trans.gif height=14 width=14/> $data[tgl_tulis]   ";
			echo "<img class=kategori src=images/img-trans.gif height=14 width=14/> $kategori[kategori]<br/><br/></td></tr>";
			echo "<tr><td colspan =2><img src=".$data['gambar']." width=580px height=300px></td></tr>";
			echo "<tr><td colspan =2><p>".$data['isi']."</p></td></tr>";
			echo "<tr><td colspan =2 align=right><a href='javascript:history.back();' class=button>Kembali</a></td></tr>";
			echo "</table>";		
		    // proses menampilkan komentar berdasarkan id artikelnya
			echo "<h3>Komentar</h3>";	
			$query = "SELECT * FROM komentar WHERE idArtikel = '$x'";
			$hasil = mysql_query($query);
			if (mysql_num_rows($hasil) > 0)
			{// jika ada komentar (jumlah data hasil query > 0), maka tampilkan komentarnya
			   while ($data = mysql_fetch_array($hasil))
			   {
				  echo "<p class=author>Dikirim oleh: ".$data['commentAuthor']."(<a href=http://".$data['urlAuthor']." target=_blank>".$data['urlAuthor']."</a>), Tanggal: ".$data['commentDate']."</p>";
				  echo "<p class=komentar>".$data['comment']."</p><hr>";
			   }
			}
			// jika tidak ada komentar (jumlah data hasil qu6ery = 0), tampilkan keterangan belum ada komentar
			else if (mysql_num_rows($hasil) == 0) echo "<p class=komentar>Belum ada komentar.</p>";
			// menampilkan form pengisian komentar
			echo "<br/>";
			echo "<h3>Kirim Komentar</h3><br/>";
			echo "<form method='post' action='".$_SERVER['PHP_SELF']."?id=".$x."&act=submit'>";
			echo "<table class=komentar>";
			echo "<tr><td>Nama Anda</td><td>:</td><td><input type='text' name='nama' size=30></td></tr>";
			echo "<tr><td>Email Anda</td><td>:</td><td><input type='text' name='email' size=30> email tidak ditampilkan</td></tr>";
			echo "<tr><td>Website </td><td>:</td><td><input type='text' name='url' size=30> tanpa http://</td></tr>";
			echo "<tr><td>Komentar Anda</td><td>:</td><td><textarea cols='60' rows='8' name='komentar'></textarea></td></tr>";
			echo "<tr><td></td><td></td><td><input type='submit' name='submit' value='Kirim'><input type='hidden' name='idArtikel' value='".$x."'></td></tr>";
			echo "</table>";
			echo "</form>";
			
             ?>
        </div>
         <div id="right">
            <h3>Kurs Bank BCA</h3>
            <?php include_once ('widget/kurs.php');?>
            <br />
            <h3>Latest Comments</h3>
            <?php include_once ('widget/komentarlist.php');?>
            <br />
            <h3>Informasi Visitor</h3>
            <?php //include_once ('widget/visitor.php');?>
        </div>
         <div id="footer">
            <p>Modified by : <a title="Hafiz.me" href="http://hafiz.me/" target="_blank"> Hafiz</a> & <a href="https://www.facebook.com/wahyu44" target="_blank"> Wahyu</a> | From template <a href="http://www.solucija.com/template/watch-this" target="_blank"> Watchthis Solucija</a></p>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
  var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-23247826-5']);_gaq.push(['_setDomainName', 'lenongonline.com']);_gaq.push(['_trackPageview']);
  (function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();
</script>