<?php 
	try{
		$db = new PDO("mysql:host=localhost;dbname=hit;charset=UTF8","root","");
	}catch(PDOException $error){
		echo "Veri Tabanı Bağlantı Hatası ! <br> Hata Kodu :" . $error->getMessage();
		die;
	}
	function filtrele($val){
		$one	 	= trim($val);
		$two 		= strip_tags($one);
		$last 		= htmlspecialchars($two , ENT_QUOTES);
		return $last;
	}
	    


 ?>
