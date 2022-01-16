0<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';
/********************************************************************************/

      if (isset($_POST['musterisilme'])) {


 $musterisor=$db->prepare("SELECT * FROM musteri");
         $musterisor->execute();
         $mustericek=$musterisor->fetch(PDO::FETCH_ASSOC) ;


###################################################################################################
$sil=$db->prepare("DELETE from musteri where id=:id");
$kontrol=$sil->execute(array( 'id' => guvenlik($_POST['id'])  ));
###################################################################################################
$sil2=$db->prepare("DELETE from siparis where musteri_id=:id");
$kontrol=$sil2->execute(array( 'id' => guvenlik($_POST['sil'])  ));
###################################################################################################
$sil3=$db->prepare("DELETE from kasa_turu where musteri_id=:id");
$kontrol=$sil3->execute(array( 'id' => guvenlik($_POST['sil'])  ));
###################################################################################################
$sil4=$db->prepare("DELETE from hesap where barkod_no=:id");
$kontrol=$sil4->execute(array( 'id' => guvenlik($_POST['sil'])  ));





       if ($kontrol) {
//echo "kayıt başarılı";
             header("location:../../musteri-listele?durum=ok");
        exit;
      } else {
//echo "kayıt başarısız";
             header("location:../../musteri-listele?durum=no");
        exit;

      }
    }


    /********************************************************************************/


    if (yetkikontrol()!="yetkili") {
    	header("location:../index.php");
    	exit;
    }
    ?>
