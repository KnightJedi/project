<?php
mysql_connect('localhost', 'user', ''); 
mysql_select_db('korzina'); 
mysql_query('SET NAMES utf8');
$ress = mysql_query("SELECT stroka FROM result");
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
							Корзина
						</div>
						<div class="left">&nbsp;</div>
						<div class="center">
						<table class="otchet">
	<tr>
		<td>Выбранный товар</td>
		<td>1</td>
		<td>2</td>
		<td>3</td>
	</tr>	
						<?php $i=1;
while ($dropd = mysql_fetch_assoc($ress)) {
if (mysql_query("SELECT m1 FROM result where id=$i")) {?>
	 <tr>
		<td><?php $res=mysql_query("SELECT stroka FROM result where id=$i"); echo mysql_result($res, 0);?></td>
		<td><?php $res1=mysql_query("SELECT m1 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				echo mysql_result($res1, 0)*mysql_result($res2, 0) ?></td>
		<td><?php $res1=mysql_query("SELECT m2 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				echo mysql_result($res1, 0)*mysql_result($res2, 0) ?></td>
		<td><?php $res1=mysql_query("SELECT m3 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				echo mysql_result($res1, 0)*mysql_result($res2, 0) ?></td>
	</tr>
<?php
$i++;}
}
$ress = mysql_query("SELECT stroka FROM result");
?> 
	<tr>
		<td>Итоговая сумма:</td>
		<td>
			<?php $i=1; $sum=0;
			while ($dropd = mysql_fetch_assoc($ress)) {
				$res1=mysql_query("SELECT m1 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				$sum=$sum+mysql_result($res1, 0)*mysql_result($res2, 0);
				$i++;
				
			}
			echo $sum;
			$ress = mysql_query("SELECT stroka FROM result");
			?>
		</td>
		<td>
		<?php $i=1; $sum=0;
			while ($dropd = mysql_fetch_assoc($ress)) {
				$res1=mysql_query("SELECT m2 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				$sum=$sum+mysql_result($res1, 0)*mysql_result($res2, 0);
				$i++;
				
			}
			echo $sum;
			$ress = mysql_query("SELECT stroka FROM result");
			?>
		</td>
		<td>
		<?php $i=1; $sum=0;
			while ($dropd = mysql_fetch_assoc($ress)) {
				$res1=mysql_query("SELECT m3 FROM result where id=$i");
				$res2=mysql_query("SELECT kolvo FROM result where id=$i");
				$sum=$sum+mysql_result($res1, 0)*mysql_result($res2, 0);
				$i++;	
			}
			echo $sum;
			?>
		</td>
	</tr>
	</table>
	</div>
	<div class="right">&nbsp;</div>
							<form method="post">
							<div class="inprod">
								<input class="naiti" type="submit" name="clear" value="Очистить корзину"/>
							</div>
							</form>
							
							<?php
		if (isset($_POST['clear'])) {
		/*echo "Arrrr!!!";*/
		mysql_query("DROP TABLE result");
		mysql_query("create table result
					(id int not null primary key AUTO_INCREMENT,
					stroka varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
					m1 int not null,
					m2 int not null,
					m3 int not null,
					kolvo int not null)");
		header("Location: stage2.php");
		}
	?>
	
	<form action="stage0.php">
							<div class="inprod">
								<input class="naiti" type="submit" name="add" value="Добавить товар"/>
							</div>
							</form>
							
							<?php
	$ress = mysql_query("SELECT * FROM result");
	?>
	
		<form method="post">
							<div class="selvib">
								
								<select class="vibprod" name="tov">
									<?php $i=1; while ($dropd = mysql_fetch_assoc($ress)) : ?>
			<option value="<?php echo $dropd['id']?>"> <?php echo $dropd['stroka'] ?></option>;
		<?php endwhile ?>
								</select>
							</div>
							
							<div class="inprod">
								<input class="naiti" type="submit" name="submit" value="Удалить товар"/>
							</div>
							
	</form>
	<?php
	if (isset($_POST['submit'])) {
        echo $ind=$_POST['tov'];
		mysql_query("DELETE FROM result WHERE id=$ind");
		mysql_close();
		header("Location: stage2.php");
		}
	?>
<?php	
mysql_close();
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
						<a href="index.php"><img class="icon" src="home.png"></a><a href="stage0.php"><img class="icon" src="poisk.png"></a><a href="stage1.php"><img class="icon" src="vibor.png"></a><a href="stage2.php"><img class="icon" src="korzina_used.png"></a>
					</div><!--End Knopki-->
		</div><!--End Inner-->
	</div><!--End Footer-->
</body>
</html>
