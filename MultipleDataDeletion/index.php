<?php 
include_once("baglanti.php");
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<title>Çoklu Kayıt Silme</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="sonuc.php" method="post">
		<table align="center">
			<tr>
				<td colspan="3"><strong>Kullanıcılar</strong></td>
			</tr>
			<?php 
			$sorgu = $db->prepare("SELECT * FROM kullanicilar");
			$sorgu->execute();
			$KayitSayisi = $sorgu->rowCount();
			$Kayitlar=$sorgu->fetchAll(PDO::FETCH_ASSOC);
			foreach ($Kayitlar as $key) {
				?><tr>
					<td width="25"><input type="checkbox" name="secim[]" value="<?=$key['id']?>"></td>
					<td width="170"><?php echo $key['ad'] ." " . $key['soyad'] ?></td>
					<td width="200"><?php echo $key['mail'] ?></td>
				</tr>
				<?php 
			}
			?>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="gonder" value="Seçilenleri Sil">
				</td>
			</tr>
		</table>
	</form>	
</body>
</html>