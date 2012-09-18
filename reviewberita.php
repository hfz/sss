<?php
$id = $_GET['id'];
include ('../koneksi.php');

$qry = "SELECT * FROM berita WHERE idBerita = '$id' ";
echo "--$qry;--";
$hasil = mysql_query($qry);
while($row = mysql_fetch_array($hasil))//row adalah var array.
{
//bikin table
$isi = stripslashes($row['isi']);
$judul=stripslashes($row['judul']);
$kategori =stripslashes($row['idKategori']);
$nama=stripslashes($row['nm_wartawan']);
$tgltayang= $row['tgl_tayang'];
$tglexpire= $row['tgl_expire'];
$status = $row ['status'];
//buang semua echo
}
?>
<html>
<head>
<title>Halaman Review Berita </title>
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
<h2>FORM Review BERITA </h2><BR>
Silahkan review berita ...
<form method="POST" action="prosesreview.php">
<table border=0>
  <tr><td>Nama Wartawan</td><td>:</td><td><input type=text name=nm_wartawan value="<?php echo $nama; ?>" ></td></tr>
  <tr><td>Judul</td><td>:</td><td><input type=text name=judul value="<?php echo $judul; ?>" /></td></tr>
  <tr><td>Kategori</td><td>:</td>
  	<td><select id="select" name="kategori" value="<?php echo $kategori;?>" >
    <option value="1">Olahraga</option>
    <option value="2">Kesehatan</option>
        <option value="3">Ekonomi</option>
        <option value="4">Teknologi</option>
        </select>
	</td>
    	
  <tr><td>Isi berita</td><td colspan=2>:</td></tr>
  <tr><td colspan=3><textarea name=isi cols=50 rows=7><?php echo $isi; ?> </textarea></td></tr>
  <tr><td>Tanggal tayang</td><td>:</td><td><input type=text name=tgltayang value="<?php echo $tgltayang; ?>" /></td></tr>
  <tr><td>Tanggal expire</td><td>:</td><td><input type=text name=tglexpire value="<?php echo $tglexpire; ?>" /></td></tr>
  <tr><td>Approved</td><td>:</td>
    <td><select id="select" name="status">
        <option value="0">Blm direview</option>
        <option value="1">Approve</option>
        <option value="2">Reject</option>
        </select>
	</td>
  </tr>
  <tr><td colspan=3><input type=hidden name=id value="<?php echo $id; ?>" /><input type=submit value=Kirim /><input type=reset /></td></tr>
</table>
</form>
</body>
</html>