<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';
/********************************************************************************/

      if (isset($_POST['stoksilme'])) {

         $musterisor=$db->prepare("SELECT * FROM stok");
         $musterisor->execute();
         $mustericek=$musterisor->fetch(PDO::FETCH_ASSOC) ;


       $sil=$db->prepare("DELETE from stok where stokk_id=:id");
       $kontrol=$sil->execute(array(
        'id' => guvenlik($_POST['id'])
      ));




       if ($kontrol) {
//echo "kayıt başarılı";
        header("location:../../stok-listele?durum=ok");
        exit;
      } else {
//echo "kayıt başarısız";
        header("location:../../stok-listele?durum=no");
        exit;

      }
    }


    /********************************************************************************/


    if (yetkikontrol()!="yetkili") {
    	header("location:../index.php");
    	exit;
    }
    ?>
