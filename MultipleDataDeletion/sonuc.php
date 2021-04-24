<?php 
include_once("baglanti.php");

$sonuc 				= $_POST["secim"];
$idleribirleştir 	= implode(", ", $sonuc);
$idler 				= filtrele($idleribirleştir);
$sorgu 				= $db->prepare("DELETE FROM kullanicilar WHERE id IN ($idler)");
$son				= $sorgu->execute();

header("Location:index.php");
exit();
?>
