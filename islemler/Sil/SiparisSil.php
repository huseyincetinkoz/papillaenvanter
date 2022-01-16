<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';
/********************************************************************************/
    if (isset($_POST['siparis-toptan'])) {

$sil=$db->prepare("DELETE from siparis where siparis_id=:id");
$kontrol=$sil->execute(array( 'id' => guvenlik($_POST['id'])  ));


       if ($kontrol) {
//echo "kayıt başarılı";
        header("location:../../siparis-listele?durum=ok");
        exit;
      } else {
//echo "kayıt başarısız";
        header("location:../../siparis-listele?durum=no");
        exit;

      }
    }



    /********************************************************************************/


    if (yetkikontrol()!="yetkili") {
    	header("location:../index.php");
    	exit;
    }
    ?>
