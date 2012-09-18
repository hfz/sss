<?php session_start(); header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Siberol | Sistem Berita Online</title>
</head>
<body>
    <div id="content">
        <h1><span class="hr">SIBEROL</span></h1>
        <ul id="top">
            <?php if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {echo "";}else{echo "<ul>
			<li><a href=http://www.solucija.com/template/watch-this target=_blank><img class=template src=images/img-trans.gif height=14 width=14/> Template</a></li>
			<li><a href=about.php><img class=about src=images/img-trans.gif height=14 width=14/> About</a></li>
			<li><a href=cek-admin.php target=_blank><img class=admin src=images/img-trans.gif height=14 width=14/> Admin</a></li>
			<li><a href=logout.php><img class=logout src=images/img-trans.gif height=14 width=14/> Logout</a></li>
			</ul>";} ?>
        </ul>
        <ul id="menu">
            <?php include ('menu.php'); ?>
        </ul>    
        <div id="intro">
            <p>Selamat datang <b><?php echo " ".$_SESSION[username]; ?></b>, Siberol merupakan singkatan dari Sistem Informasi Berita Online yang dibuat untuk menyelesaikan tugas mata kuliah Server Side Scripting yang diberikan oleh Dosen Mercubuana Meruya Jakarta. <br>NOTE : Login Wartawan, Username=wahyu Password=wahyu1234 | Login Redaktur, Username=hafiz Password=hafiz1234</p>
        </div>
            <div id="left">
				<?php
                include_once ('koneksi.php');
				$x = $_GET['id'];
                $qry = "SELECT * FROM berita WHERE status = 1 AND tgl_tayang < Now() AND tgl_expire > Now() AND idKategori='$x' ORDER by tgl_tulis desc LIMIT 0,6";
                $hasil = mysql_query($qry);
					while ($row = mysql_fetch_array($hasil))
					{
					//bikin tabel
					$judul = stripslashes($row['judul']);
					$nama = stripslashes($row['nm_wartawan']);
					$brief = substr($row['isi'],0,370). "...";
					$x = $row['idBerita'];
					$loc = stripslashes($row['gambar']);
					$rowset = mysql_query("SELECT * FROM kategori where idKategori = '".$row['idKategori']."'");
					$kategori = mysql_fetch_array($rowset);
					echo "<hr color=#ccc>";
					echo "<table border=0>";
					echo "<tr><td colspan=2><h2><a href=newsdetail.php?id=$x>$judul</a></h2></td></tr>";
					echo "<tr><td colspan=2 class=wartawan height=25>";
					echo "<img class=penulis src=images/img-trans.gif height=14 width=14/> $nama ";
					echo "<img class=tanggal src=images/img-trans.gif height=14 width=14/> $row[tgl_tulis]   ";
					echo "<img class=kategori src=images/img-trans.gif height=14 width=14/> $kategori[nm_kategori]<br/></td></tr>";
					echo "<tr><td width=25%><img src=$loc width=140px height=120px></td><td width=90%>$brief</td></tr>";
					echo "<tr><td colspan=2 align=right><a href=newsdetail.php?id=$x class=button>selanjutnya...</a></td>";
					echo "</table>";
					
					}
                ?>
            </div>
        <div id="right"> 
       		<?php 
			if (!isset($_SESSION['username']) || empty($_SESSION['username'])) 
			{
    			//muncul login form
				include ('login.php');
  			} 
			?>
            <h3>Kurs Bank BCA</h3>
            <?php include_once ('widget/kurs.php');?>
            <br />
            <h3>Komentar Terakhir</h3>
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
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-23247826-5']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
