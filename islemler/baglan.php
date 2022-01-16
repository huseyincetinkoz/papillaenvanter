<?php 



$host="localhost";huseyincetinkoz.com
$veritabani_ismi="";huseyi46_papillaenvanter
$kullanici_adi="";papilla
$sifre="";kara4114

try {
	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8mb4",$kullanici_adi,$sifre);
	//echo "veritabanı bağlantısı başarılı";

	            $db->query("SET NAMES 'utf8mb4'");
                $db->query("SET CHARACTER SET 'utf8mb4'");
                $db->query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
}

catch (PDOExpception $e) {
	echo $e->getMessage();
}

?>
