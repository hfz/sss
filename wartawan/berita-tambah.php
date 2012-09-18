<?php session_start(); header('Content-type: text/html; charset=utf-8');?>
<html>
<head>
<link rel="stylesheet" href="../css/style-admin.css" type="text/css" />
<title>Siberol | Sistem Berita Online</title>
<head><title>Halaman Submit Berita</title></head>
<!-- TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
// General options
mode : "textareas",
theme : "advanced",
plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

// Theme options
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,

// Example content CSS (should be your site CSS)
content_css : "css/content.css",

// Drop lists for link/image/media/template dialogs
template_external_list_url : "lists/template_list.js",
external_link_list_url : "lists/link_list.js",
external_image_list_url : "lists/image_list.js",
media_external_list_url : "lists/media_list.js",

// Style formats
style_formats : [
{title : 'Bold text', inline : 'b'},
{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
{title : 'Example 1', inline : 'span', classes : 'example1'},
{title : 'Example 2', inline : 'span', classes : 'example2'},
{title : 'Table styles'},
{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
],

// Replace values for the template plugin
template_replace_values : {
username : "Some User",
staffid : "991234"
}
});
</script>
<!-- /TinyMCE -->
</head>
<body>
    <div id="content">
    	<h1><span class="hr">SIBEROL - WARTAWAN</span></h1>
        <ul id="menu">
            <?php include ('menu-wartawan.php'); ?>
        </ul>    
        <div id="left">
            <h2>Form Submit Berita</h2>
            <?php 
			if (!empty($_GET['message']) && $_GET['message'] == 'success') {
				echo '<h2><font color=red>Berhasil mengirim berita!</font></h2>';
			} else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
				echo '<h2>Berhasil menghapus data!</h2>';
			}
			?>
            <form action="berita-proses-tambah.php" method="post" enctype="multipart/form-data">
            <table border="0">
            <tr height="30"><td width="400">Nama Wartawan </td><td>: </td><td>
            <input type="hidden" name="nm_wartawan" value="<?php echo $_SESSION['nama_lengkap']; ?>">
            <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
			<?php echo $_SESSION['nama_lengkap']; ?></td></tr>
            <tr height="30"><td>Judul Berita </td><td>: </td><td><input type="text" name="judul" size=60/></td></tr>
            <tr height="30"><td>Kategori Berita </td><td>: </td><td><select name="kategori"/>
            <?php include_once ('../koneksi.php');
            $query = "select idKategori, nm_kategori FROM kategori ORDER by nm_kategori";
            $sql = mysql_query($query);
            while($hasil = mysql_fetch_array($sql)) { echo "<option value='$hasil[idKategori]'>$hasil[nm_kategori]</option>";} ?></select></td></tr>
            <tr valign="top"><td>Isi Berita <td>: </td><td><textarea cols="50" rows="5" name=isi></textarea></td></tr>
            <tr height="30"><td>Upload Foto </td><td>: </td><td><input name="picture" type="file" /></tr><tr>
            <td colspan="3"><input class="button" type="submit" value="Kirim" /> <input class="button" type="reset" value="Reset" /></td></tr>
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
