<?php 
include "../sambung.inc.php";
include "converttanggal.php";
session_start();
 $rand = session_id();
if (!isset($_SESSION['nim']))
  {
   header("Location: ../index.php");
  }
 $initid=strtoupper($_SESSION['nim']); 
 //--------------------  
  $ip=$_SERVER['REMOTE_ADDR'];
 $now=date("Y-m-d H:i:s");
 $query = mysql_query("SELECT * FROM online_user WHERE id='$initid'");
 $cek = mysql_fetch_array($query);
 		$dul=strtotime($cek['tm']);
		$skr=strtotime($now);
		$dif=(integer)$skr-$dul;
		//echo "$dif";
 if ($dif < 600)
 {		
 $sql = mysql_query("UPDATE online_user SET ip='$ip', tm='$now' ,sta='1' WHERE id='$initid'"); 
 }
 else
 {
  $sql = mysql_query("UPDATE online_user SET sta='0' WHERE id='$initid'");
 session_destroy();
 header("Location: ../index.php");
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
<script type="text/javascript" src="ed.js"></script>
<script type="text/javascript" src="aj.js"></script>
<script type="text/javascript" src="chrome.js"></script>
</head>
<body class="mhs">
<div id="header"></div>
<?php include "menu.php"; ?>
<div id="edit">
<?php
$urutan=$_GET['urutan'];
			$id_jud=$_GET['id_jud'];
			//$id_rev=$_GET['id_rev'];
			//$kode=$_GET['kode'];
			$urutan_rep=$_GET['urutan_rep'];
			$key=$_GET['key'];
			$field=$_GET['field'];
			$halaman=$_GET['halaman'];
?>
<a href="reviewmhs2.php?key=<?php=$key;?>&field=<?php=$field;?>&urutan=<?php=$urutan;?>&id_jud=<?php=$id_jud;?>&halaman=<?php=$halaman;?>#<?php=$urutan_rep;?>">.:: Kembali ke Halaman Review ::.</a>
			<br><br>
			<form action="replymcari1.php" method="post">
			<table width="100%" class="khusus">
			  <tr>
				<td colspan="2" align="center" bgcolor="#65739F"><b>New POST</b></td>
				</tr>
			  <tr>
				<td width="30%" valign="top" bgcolor="#FFFFFF">&nbsp;Review Text</td>
				<td bgcolor="#C4C6CA" valign="top" width="70%">
				<script>Init('review_text',80,15,''); </script>
				 </td>
			  </tr>			  			   			  
			  <tr>
				<td colspan="2" bgcolor="#999999" align="center">
				<input type="hidden" name="id_ju" value="<?php=$id_jud;?>">
				<input type="hidden" name="key" value="<?php=$key;?>">
				<input type="hidden" name="field" value="<?php=$field;?>">
				<input type="hidden" name="halaman" value="<?php=$halaman;?>">
				<input type="hidden" name="urutan" value="<?php=$urutan;?>">
				<?php
				//echo "<input type='hidden' name='review_s' value='$row[review_sound]'>";		
				?>
				<input type="hidden" name="urutan_rep" value="<?php=$urutan_rep;?>">
				<input name="submit" type="submit" value="Submit">&nbsp;<input type="reset" value="Reset"></td>
				</tr>
			</table>
			</form>
			
</div>
</body>
</html>

</body>
</html>
