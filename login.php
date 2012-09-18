<h3>Form Login</h3>
<?php
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
    echo '<h4>Username dan Password belum diisi!</h4>';
    } else if ($_GET['error'] == 2) {
    echo '<h4>Username belum diisi!</h4>';
    } else if ($_GET['error'] == 3) {
    echo '<h4>Password belum diisi!</h4>';
    } else if ($_GET['error'] == 4) {
    echo '<h4>Username dan Password tidak terdaftar!</h4>';
    }else if ($_GET['error'] == 5) {
    echo '<h4>Security Code yang Anda masukkan salah!</h4>';
    }
}
?>
<form action="proses-login.php" method="post">
<table border="0" cellspacing="5px">
<tr>
<td>Username</td>
<td>:</td>
<td><input type="text" name="username" id="username"/></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password" id="password"/></td>
</tr>
<tr>
<td colspan="3">
<?php
$refid = md5(rand(0, 999999));
?>
<img src="secimg/securityimage.php?refid=<?php echo $refid; ?>" height="40px" width="150px"/>
</td> 
</tr>
<tr>
<td>Security Code</td><td>:</td>
<td><input type="text" name="seccode" maxlength="6" autocomplete="off"/></td>
 
<input type="hidden" name="refid" value="<?php echo $refid; ?>" />
   </tr>
 <tr>
<td colspan="3" align="left"><input class="button" type="submit" value="Login" /> <input class="button" type="reset" /></td>
 </tr>
</table>
</form>
<br/>