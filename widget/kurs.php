<?php
//menyalin data kurs dari website lain
$target = "http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp";
$ch = curl_init($target);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Referer: www.bca.co.id'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
$s = curl_exec($ch);
curl_close($ch);
//explode string
echo "<table border=0>";
echo "<tr bgcolor=#56b0e4><th width=90>Mata Uang</th><th width=90>Jual</th><th width=90>Beli</th>";
$pos1 = stripos($s,'<strong>Mata Uang</strong>');
for($k=1; $k<=14; $k++){
$data = array('','','');
for($i=0;$i<=2;$i++)
{
$pos2=stripos($s,'text-align:',$pos1)+($i==0 ? 20:19);
$pos3=stripos($s,'</td>',$pos2);
$data[$i]=substr($s,$pos2,$pos3-$pos2);
$pos1=$pos3;
}
echo "<tr><td align=left>$data[0]</td><td align=right>$data[1] </td><td align=right>$data[2]</td></tr>\n";
}
echo "</table>";
//echo "BCA lagi offline";
?>