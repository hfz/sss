<?php session_start(); header('Content-type: text/html; charset=utf-8'); include ('../koneksi.php'); include ('cek-login.php');?>
<html>
<head>
<link rel="stylesheet" href="../css/style-admin.css" type="text/css" />
<title>Siberol | Sistem Berita Online</title>
</head>
<body>
    <div id="content">
    	<h1><span class="hr">SIBEROL - REDAKTUR</span></h1>
        <ul id="menu">
            <?php include ('menu-redaktur.php'); ?>
        </ul>    
        <div id="left">
            <h2>Daftar Berita Belum di Review</h2>
            <?php 
			if (!empty($_GET['message']) && $_GET['message'] == 'success') {
				echo '<h4>Berhasil meng-update data!</h4>';
			} else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
				echo '<h4>Berhasil menghapus data!</h4>';
			}
			?>
            <table id="box-table-a" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Wartawan</th>
                        <th>Kategori</th>
                        <th>Tanggal Tulis</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php  $query = mysql_query("SELECT * FROM berita WHERE status = 0 ORDER BY tgl_tulis");                
                $no = 1;
                while ($berita = mysql_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $berita['judul']; ?></td>
                        <td><?php echo $berita['nm_wartawan']; ?></td>
                        <td><?php 
						$rowset = mysql_query("SELECT * FROM kategori where idKategori = '".$berita['idKategori']."'");
						$kategori = mysql_fetch_array($rowset);
						echo $kategori['nm_kategori']; ?></td>
                        <td><?php echo $berita['tgl_tulis']; ?></td>
                        <td><a href="berita-review.php?id=<?php echo $berita['idBerita']; ?>">Review</a></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    <div id="right"> 
    </div>
    <div id="footer">
    <p>Modified by : <a title="Hafiz.me" href="http://hafiz.me/" target="_blank"> Hafiz</a> & <a href="https://www.facebook.com/wahyu44" target="_blank"> Wahyu</a> | From template <a href="http://www.solucija.com/template/watch-this" target="_blank"> Watchthis Solucija</a></p>
    </div>
    </div>
</body>
</html>
