<?php 

try{

	$db = new PDO("mysql:host=localhost;dbname=kisiler;charset=UTF8","root","");
}catch(PDOException $error){
	echo "Bağlantı Hatası! \nHata Kodu : " . $error->getMessage();
	die();
}
function filtrele($val){
	$one = trim($val);
	$two = strip_tags($one);
	$three = htmlspecialchars($two , ENT_QUOTES);
	$last = $three;
	return $last;
}



?>