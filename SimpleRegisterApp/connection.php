<?php 
$host = "localhost";
$user = "root";
$pass ="";
$database="login_php";

try {
    $connect = new PDO('mysql:host='.$host.';dbname='.$database.'', $user, $pass);
    if($connect){
        //echo "Bağlantı Tamam";
    }else{
        echo "Bağlantı Yok";
    }
} catch (\Throwable $th) {
    echo "VT Hatası Hata Kodu : " . $th->getMessage();
}

function  filterVal($val){
    $one = strip_tags($val);
    $two = trim($one);
    $last = addslashes($two);
    return $last;
}
?>