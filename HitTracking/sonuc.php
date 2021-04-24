<?php 
include_once("baglanti.php");
$id = filtrele($_GET['id']);
$sorgu = $db->prepare("UPDATE makaleler SET hit=hit+1 WHERE id =?");
$sorgu->execute([$id]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tıklanma Sayısı</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<tr>
			<td align="left" style="color: #212121">Görüntüleme ve Hit Uygulaması</td>
			<td align="right"><a href="index.php">Anasayfa</a></td>
		</tr>
		<?php 
		$sorgu2 = $db->prepare("SELECT * FROM makaleler WHERE id =?");
		$sorgu2->execute([$id]);

		$KayitSayisi = $sorgu2->rowCount();
		$Kayit = $sorgu2->fetch(PDO::FETCH_ASSOC);

		if($KayitSayisi > 0 ){
			?>
			<tr>
				<td><img src="img/<?php echo $Kayit['resim']?>"></td>	
			</tr>
			<tr>
				<td><h3><?php echo $Kayit['baslik']; ?></h3></td>				
			</tr>
			
			<tr>
				<td><span><?php echo $Kayit['icerik']; ?></span></td>							
			</tr>
			<tr>
				<td align="center"><?php echo " <br> Görüntülenme Sayısı : " .  $Kayit['hit']; ?></td>
			</tr>
			<?php			
		}else{
			header("Location:index.php");
		}		
		?>
	</table>	
</body>
</html>