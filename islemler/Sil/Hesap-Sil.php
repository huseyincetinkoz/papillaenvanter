<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';
/********************************************************************************/

      if (isset($_POST['hesapsil'])) {



       $sil=$db->prepare("DELETE from hesap where hesap_id=:id");
       $kontrol=$sil->execute(array(
        'id' => guvenlik($_POST['id'])
      ));




       if ($kontrol) {
//echo "kayıt başarılı";
        header("location:../../kasa?durum=ok");
        exit;
      } else {
//echo "kayıt başarısız";
        header("location:../../kasa?durum=no");
        exit;

      }
    }


    /********************************************************************************/


    if (yetkikontrol()!="yetkili") {
      header("location:../index.php");
      exit;
    }
    ?>
