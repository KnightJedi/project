<?php
mysql_connect('localhost', 'user', ''); 
mysql_select_db('korzina'); 
mysql_query('SET NAMES utf8');
//$rez = mysql_query("SELECT id FROM shag order by id desc limit 1");
//$myrow = mysql_fetch_array ($rez);
//print($myrow);
$res = mysql_query("SELECT id FROM shag order by id desc limit 1");
/*echo*/ $ind=mysql_result($res, 0);
$res = mysql_query("SELECT shaaag FROM shag WHERE id=$ind");
/*echo*/ $ind=mysql_result($res, 0);
$res1 = mysql_query("SELECT sv1 FROM `$ind` group by sv1");
$res2 = mysql_query("SELECT sv2 FROM `$ind` group by sv2");
$res3 = mysql_query("SELECT sv3 FROM `$ind` group by sv3");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->
<meta http-equiv="x-ua-compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title>Корзина</title>
	<link rel="stylesheet"  type="text/css" href="jquery-ui-1.8.23.custom.css" />
	<link rel="stylesheet"  type="text/css" href="style_css.css" />
	<link href='http://fonts.googleapis.com/css?family=Forum&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
  	<meta name="viewport" content="initial-scale=1, maximum-scale=1" /> 
</head>
<body>
	<div class="page">
		<div id="header">
			<div class="inner">
			</div><!--End Inner-->
		</div><!--End Header-->
		<div class="wrap">
			<div id="content">
				<div class="inner">
					<div class="poisk">
						<div class="vibortext">
							<?php 
							$res = mysql_query("SELECT name_product FROM product WHERE id_product=$ind");
							echo $n=mysql_result($res, 0);
							?>
						</div>
						<form name="por" method="post" >
							<div class="selvib">
							<select class="vibprod" name="sv1">
									<?php $i=1; while ($dropd = mysql_fetch_assoc($res1)) : ?>
									<option value="<?php echo $dropd['sv1']?>"> <?php echo $dropd['sv1'] ?></option>;
									<?php endwhile ?>
								</select>
							</div>
							<div class="selvib">
							<select class="vibprod" name="sv2">
							<?php $i=1; while ($dropd = mysql_fetch_assoc($res2)) : ?>
								<option value="<?php echo $dropd['sv2']?>"> <?php echo $dropd['sv2'] ?></option>;
								<?php endwhile ?>	
							</select>
							</div>
							<div class="selvib">
							<select class="vibprod" name="sv3">
		<?php $i=1; while ($dropd = mysql_fetch_assoc($res3)) : ?>
			<option value="<?php echo $dropd['sv3']?>"> <?php echo $dropd['sv3'] ?></option>;
		<?php endwhile ?>
		</select>
		</div>
													
							<div >
								<div class="text">Колличество</div>
								<input class="inputkol" type="text" size="40" name="kolvo" value="1">
							</div>
							
							<div class="inprod">
								<input class="naiti" type="submit" name="submit" value="Подтвердить "/>
							</div>
							
							<?php
		if (isset($_POST['submit'])) {
		/*echo*/ $kl=(int)$_POST['kolvo'];
		$res = mysql_query("SELECT name_product FROM product WHERE id_product=$ind");
		/*echo*/ $n=mysql_result($res, 0);
        /*echo*/ $s1=$_POST['sv1']; echo $s2=$_POST['sv2']; echo $s3=$_POST['sv3'];
		$res=mysql_query("SELECT m1, m2, m3 FROM `$ind` WHERE sv1='$s1' and sv2='$s2' and sv3='$s3' ");
	/*echo*/ $m1=mysql_result($res, 0);
	/*echo*/ $m2=mysql_result($res, 0, 1);
	/*echo*/ $m3=mysql_result($res, 0, 2);
	/*echo*/ $sssss=$n.' '.$s1.' '.$s2.' '.$s3.' '.$kl.' шт';
	mysql_query("INSERT INTO result (stroka, m1, m2, m3, kolvo) VALUES ('$sssss', $m1, $m2, $m3, $kl)");
	mysql_close();
	header("Location: stage2.php");
		}
	?>
							
						</form>
					</div><!--End Poisk-->
					<div class="probel">&nbsp;</div>
				</div><!--End Inner-->
			</div><!--End Content-->
		</div><!--End Wrap-->
	</div><!--End Page-->
	<div id="footer">
		<div class="inner">
		<div class="Knopki">
						<a href="index.php"><img class="icon" src="home.png"></a><a href="stage0.php"><img class="icon" src="poisk.png"></a><a href="stage1.php"><img class="icon" src="vibor_used.png"></a><a href="stage2.php"><img class="icon" src="korzina.png"></a>
					</div><!--End Knopki-->
		</div><!--End Inner-->
	</div><!--End Footer-->
</body>
</html>
