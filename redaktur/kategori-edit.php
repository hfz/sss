<?php 
include('../koneksi.php');
include('cek-login.php');
?>
<html>
<head>
<link rel="stylesheet" href="../css/style-admin.css" type="text/css" />
<title>Siberol | Sistem Berita Online</title>
<head><title>Halaman Submit Berita</title></head>
</head>
<body>
    <div id="content">
    	<h1><span class="hr">SIBEROL - REDAKTUR</span></h1>
        <ul id="menu">
            <?php include ('menu-redaktur.php'); ?>
        </ul>    
        <div id="left">
        	<?php 
			$id = $_GET['id'];
			$query = mysql_query("select * from kategori where idKategori='$id'") or die(mysql_error());
			$data = mysql_fetch_array($query);
			?>
            <h2>Edit Kategori</h2>
           <form name="update_data" action="kategori-update.php" method="post">
<input type="hidden" name="idKategori" value="<?php echo $id; ?>" />
<table  id="box-table-a" border="0" cellpadding="5" cellspacing="0">
    <thead>
    	<tr>
        	<th colspan="3">Data Kategori</b></th>
        </tr>
    </thead>
    
    <tbody>
    	<tr>
        	<td>Kategori</td>
        	<td>:</td>
        	<td><input type="text" name="nm_kategori" maxlength="35" required value="<?php echo $data['nm_kategori']; ?>"size="50" /></td>
        </tr>
    	<tr>
        	<td>Keterangan</td>
        	<td>:</td>
        	<td><input type="text" name="ket_kategori" maxlength="200" required value="<?php echo $data['ket_kategori']; ?>"  size="81"/></td>
        </tr>
        <tr>
        	<td align="right" colspan="3"><input type="submit" name="submit" value="Simpan" /></td>
        </tr>
    </tbody>
</table>
</form>
        </div>
    <div id="right"> 
    
    </div>
    <div id="footer">
    <p>Modified by : <a title="Hafiz.me" href="http://hafiz.me/" target="_blank"> Hafiz</a> & <a href="https://www.facebook.com/wahyu44" target="_blank"> Wahyu</a> | From template <a href="http://www.solucija.com/template/watch-this" target="_blank"> Watchthis Solucija</a></p>
    </div>
    </div>
</body>
</html>
