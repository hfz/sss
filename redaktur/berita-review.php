<?php
$id = $_GET['id'];
include ('../koneksi.php');

$qry = "SELECT * FROM berita WHERE idBerita = '$id' ";
$hasil = mysql_query($qry);
while($row = mysql_fetch_array($hasil))//row adalah var array.
{
//bikin table
$isi = stripslashes($row['isi']);
$judul=stripslashes($row['judul']);
$kategori =stripslashes($row['idKategori']);
$nm_wartawan=stripslashes($row['nm_wartawan']);
$tgltayang= $row['tgl_tayang'];
$tglexpire= $row['tgl_expire'];
$status = $row ['status'];
$gambar = $row['gambar'];
$tgl = date("Y-m-d H:i:s");
//buang semua echo
}
?>
<html>
<head>
<link rel="stylesheet" href="../css/style-admin.css" type="text/css" />
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
        	
            <h2>Review Berita</h2>
           <form method="POST" action="berita-update.php">
<table border=0 cellpadding="5" cellspacing="5">
  <tr><td width="150">Nama Wartawan</td><td>:</td><td><input type="hidden" name="nm_wartawan" value="<?php echo $nm_wartawan; ?>" ><?php echo $nm_wartawan; ?></td></tr>
  <tr><td>Judul</td><td>:</td><td><input type="text" name="judul" value="<?php echo $judul; ?>" size=50/></td></tr>
  <tr><td>Kategori</td><td>:</td>
  	<td><select name="kategori">
            <?php
            $query2 = mysql_query("SELECT idKategori, nm_kategori FROM kategori") or die(mysql_error());
            while($data2 = mysql_fetch_array($query2)) 
			{
				if($data2['idKategori'] == $kategori){
					$selected = "selected='selected'"; 
				}else{
					$selected = "";}
			echo '<option '.$selected.' value="'.$data2['idKategori'].'">'.$data2['nm_kategori'].'</option>';
			}?>
            </select>
	</td>
  <tr><td valign="top">Isi berita</td><td valign="top">: </td><td><textarea name="isi" cols=50 rows=12><?php echo $isi; ?> </textarea></td></tr>
  <tr><td valign="top">Foto</td><td valign="top">:</td><td><img src="../<?php echo $gambar; ?>" width="200"  height="150"/></td></tr>
  <tr><td>Tanggal Tayang</td><td>:</td><td><input type="text" name="tgltayang" value="<?php echo $tgl; ?>" size=25/></td></tr>
  <tr><td>Tanggal Expire</td><td>:</td><td><input type="text" name="tglexpire" value="<?php echo $tglexpire; ?>" size=25 /></td></tr>
  <tr><td>Status Berita</td><td>:</td>
    <td><select id="select" name="status">
        <option value="0">Review</option>
        <option value="1">Approve</option>
        <option value="2">Reject</option>
        </select>
	</td>
  </tr>
  <tr><td colspan=3><input type="hidden" name="id" value="<?php echo $id; ?>" /><input  class="button" type="submit" value="Kirim" /> &nbsp;<input class="button"  type="reset" /></td></tr>
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
