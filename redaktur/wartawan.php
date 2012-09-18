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
    	<h1><span class="hr">SIBEROL - REDAKTUR</span></h1>s
        <ul id="menu">
            <?php include ('menu-redaktur.php'); ?>
        </ul>    
        <div id="left">
            <h2>Daftar Wartawan</h2>
             <?php 
			if (!empty($_GET['message']) && $_GET['message'] == 'success') {
				echo '<h4>Berhasil meng-update data!</h4>';
			} else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
				echo '<h4>Berhasil menghapus data!</h4>';
			}
			?>
            <table id="box-table-a" border="0" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = mysql_query("select * from user WHERE level=0");
                
                $no = 1;
                while ($data = mysql_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td>
                            <a href="wartawan-edit.php?id=<?php echo $data['idUser']; ?>">Edit</a> 
                        </td>
                    </tr>
                <?php 
                    $no++;
                } 
                ?>
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
