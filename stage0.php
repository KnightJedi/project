<?php
mysql_connect('localhost', 'user', ''); 
mysql_select_db('korzina'); 
mysql_query('SET NAMES utf8');
$res = mysql_query("SELECT * FROM product");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
						<div class="vibortext">Выберите продукт</div>
							<form name="por" method="post" >
								<div class="selvib">
									<select class="vibprod" name="por">
										<?php while ($dropd = mysql_fetch_assoc($res)) : ?>
										<option value="<?php echo $dropd['id_product']?>"> <?php echo $dropd['name_product'] ?></option>;
										<?php endwhile ?>
									</select>
								</div>
								<div class="inprod">
									<input class="naiti" type="submit" name="submit" value="Подтвердить "/>
								</div>
							</form>
							<?php
		if (isset($_POST['submit'])) {
        echo $ideha=$_POST['por'];
		mysql_query("INSERT INTO shag (shaaag) VALUES ('{$ideha}')");
		mysql_close();
		header("Location: stage1.php");
		}
		?>
					</div><!--End Poisk-->
					<div class="probel">&nbsp;</div>
				</div><!--End Inner-->
			</div><!--End Content-->
		</div><!--End Wrap-->
	</div><!--End Page-->
	<div id="footer">
		<div class="inner">
		<div class="Knopki">
						<a href="index.php"><img class="icon" src="home.png"></a><a href="stage0.php"><img class="icon" src="poisk_used.png"></a><a href="stage1.php"><img class="icon" src="vibor.png"></a><a href="stage2.php"><img class="icon" src="korzina.png"></a>
					</div><!--End Knopki-->
		</div><!--End Inner-->
	</div><!--End Footer-->
</body>
</html>
