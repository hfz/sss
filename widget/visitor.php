<?php

/**
include_once( 'class.GetUserInfo.php' );
$init = new GetUserInfo();
echo '<table width="280px" border="0">';
echo '<tr><td>IP </td><td>: '.$init->getIP().'</td></tr>';
echo '<tr><td>Visit Type </td><td>: '.$init->getvisitType().'</td></tr>';
echo '<tr><td>Browser </td><td>: '.$init->getBrowserName().'</td></tr>';
echo '<tr><td>Browser Ver. </td><td>: '.$init->getBrowserVersion().'</td></tr>';
echo '<tr><td>OS </td><td>: '.$init->getOSName().'</td></tr>';
echo '<tr><td>OS Version </td><td>: '.$init->getOSVersion().'</td></tr>';
echo '<tr><td>Country </td><td>: '.$init->getCountry().'</td></tr>';
echo '<tr><td>Region </td><td>: '.$init->getRegion().'</td></tr>';
echo '<tr><td>Latitude </td><td>: '.$init->getLatitutde().'</td></tr>';
echo '<tr><td>Longitude : </td><td>: '.$init->getLongitude().'</td></tr>';
echo '<tr><td>ISP </td><td>: '.$init->getIsp().'</td></tr>';
//echo '<tr><td>Local Time:- </td><td>'.$init->getLocalTime().'</td></tr>';
echo '</table>';
$ip = $init->getIP(); 
$type = $init->getvisitType(); 
$browse = $init->getBrowserName(); 
$browserver = $init->getBrowserVersion(); 
$os = $init->getOSName(); 
$osname = $init->getOSVersion(); 
$country = $init->getCountry(); 
$region = $init->getRegion();
$lat = $init->getLatitutde(); 
$long = $init->getLongitude();
$isp = $init->getIsp();
$log=" 

IP : $ip 
Visit Type : $type
Browser : $browse
Browser Version : $browserver 
OS : $os 
OS Version : $osname 
Country : $country
Region : $region 
Latitude $lat
Longtitude : $long 
ISP : $isp

############################################### 
"; 
//script untuk menulis hasil exe
$fp = fopen("visitor-log.txt", "a"); 
fputs($fp, $log); 
fclose($fp); 
**/
?>