<?php
include "../sambung.inc.php";
include "converttanggal.php";
//include "search.inc.php";
session_start();
  if (!isset($_SESSION['user_nama']))
  {
  header("Location: index.php");
  }

//---------------------  
 $ip=$_SERVER['REMOTE_ADDR'];
 $now=date("Y-m-d H:i:s");
 $query = mysql_query("SELECT * FROM online_user WHERE id='$_SESSION[user_nama]'");
 $cek = mysql_fetch_array($query);
 		$dul=strtotime($cek['tm']);
		$skr=strtotime($now);
		$dif=(integer)$skr-$dul;
		//echo "$dif";
 if ($dif < 600)
 {		
 $sql = mysql_query("UPDATE online_user SET ip='$ip', tm='$now' ,sta='1' WHERE id='$_SESSION[user_nama]'"); 
 }
 else
 {
  $sql = mysql_query("UPDATE online_user SET sta='0' WHERE id='$_SESSION[user_nama]'");
 session_destroy();
 header("Location: index.php");
 }
 $ubah = mysql_query("UPDATE online_user SET sta='0' WHERE ((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(tm))/60) > 10");                                                                     	
//------------------------------  
  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>..::[SPOTA Prodi TEKNIK INFORMATIKA]::..</title>
<meta name="keywords" content="SPOTA, Sistem Pendukung Outline Tugas Akhir" />
<meta name="copyright" content="nikolaidiez - Teknik Informatika - UNTAN" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" src="aj.js"></script>
</head>
<body>
<?php
//$form = new searching("admin-spota.php","$_POST[key]","Search");
//$form->addoption("NIM");
//$form->addoption("Judul");
//$form->tamsearchform();
//if(!isset($_POST['submit']))
//{
echo "<form method='GET' action='judulpra_asli1.php'>";
echo "<table width='400' border='0' align='center'>
  <tr>
    <td align='center'><img src='../images/search.gif'></td>
  </tr>
  <tr>
  <td align='center'>
  <label>Berdasarkan</label>
  <input type='radio' name='field' value='judul_praoutline' onClick='tsemang(this.value)'>Judul Praoutline
  <input type='radio' name='field' value='NIM' onClick='tsemang(this.value)'>NIM
  <input type='radio' name='field' value='carilain' onClick='tsemang(this.value)'>Advanced Search<br>
  <div id='adva'></div>
  </td>
  </tr>
  
  <tr>
    <td align='center'><input type='submit' name='submit' value='Cari Desain Praoutline' class='spesial'>&nbsp;<input type='reset' value='Reset Kata Kunci' class='spesial'></td>
  </tr>";
echo "</table>";
echo "</form>";
//}
?>

</body>
</html>