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
			<li><a href=#><img class=about src=images/img-trans.gif height=14 width=14/> About</a></li>
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
            <div id="mid">
                  <table width="900px" border="0">
                    <tr>
                      <td width="100px"><img src="images/hafiz.jpg" width="200" height="267"/></td>
                      <td width="200px" valign="top">
                      <font size="4px" color="#E57E21">Hi, I'm Abdul Hafiz</font><br><br>
                      NIM <br>41508120050<br><br>
                      I write and design <br>wahyu-hafiz.lenongonline.com<br><br>
                      I made this website with him-><br><br>
                      <font style="font-style:italic">“I think the next best thing to solving a problem is finding some humor in it.”</font> - Frank Howard Clark<br><br></td>
                      <td width="100px"><img src="images/wahyu.jpg" width="200" height="267"/></td>
                      <td width="200px" valign="top">
                      <font size="4px" color="#E57E21">Hi, I'm Wahyu Indra Fajar</font><br><br>
                      NIM <br>41508120054<br><br>
                      <font style="font-style:italic">“hasbunalloh wanikmal wakil nikmal maulana wanikman natsir”</font><br><br>
                      </td>
                    </tr>
                  </table>
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
