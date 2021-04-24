<?php 
include_once("baglanti.php");
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
			<td align="left">Görüntüleme ve Hit Uygulaması</td>
			<td align="right"><a href="index.php">Anasayfa</a></td>
		</tr>		
		<tr style=" background-color:#c0392b; color: #fff;height: 30px;">
			<td align="left">Makale Başlığı</td>
			<td align="right">Görüntüleme Sayısı</td>
		</tr>
		<?php 
		$sorgu = $db->prepare("SELECT * FROM makaleler");
		$sorgu->execute();

		$KayitSayisi = $sorgu->rowCount();
		$Kayitlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

		foreach ($Kayitlar as $key ) {	
			?>
			<tr>
				<td align="left"><a href="sonuc.php?id=<?=$key['id']?>"><?php echo $key['baslik'] ?></a></td>
				<td align="right"><?php echo $key['hit'] ?></td>
			</tr>
			<?php
		}
		?>
	</table>	
</body>
</html>