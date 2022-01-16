<?php


//  ##
// ÜRÜNLERDEN VERİ ÇEK
// ##
require_once 'islemler/baglan.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];

$query = $db->query("SELECT stok_adi , stok_id ,satis_fiyati FROM stok ", PDO::FETCH_ASSOC);


	$data = array();

if ( $query->rowCount() )
{

     foreach( $query as $row )
          {
        $name = $row['stok_adi'].'|'.$row['stok_id'].'|'.$row['satis_fiyati'];
		array_push($data, $name);
          }
}

	echo json_encode($data);exit;
}


