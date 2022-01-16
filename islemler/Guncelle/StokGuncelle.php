<?php

ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';


/********************************************************************************/

if (isset($_POST['stokguncelle'])) {

$stok_kod = guvenlik($_POST['stok_kod']);
$stok_adi = guvenlik($_POST['stok_adi']);
$urun_fiyati = guvenlik($_POST['urun_fiyati']);
$urun_kdv = guvenlik($_POST['urun_kdv']);
$stok_birim = guvenlik($_POST['stok_birim']);
$satis_fiyati = guvenlik($_POST['satis_fiyati']);


           $siparisguncelle=$db->prepare("UPDATE stok SET
            stok_adi=:stok_adi,
            urun_fiyati=:urun_fiyati,
            urun_kdv=:urun_kdv,
            stok_kod=:stok_kod,
            stok_birim=:stok_birim,
            satis_fiyati=:satis_fiyati
             where stokk_id={$_POST['id']}");

           $guncelle=$siparisguncelle->execute(array(
            'stok_adi' => guvenlik($_POST['stok_adi']),
            'urun_fiyati' => guvenlik($_POST['urun_fiyati']),
            'urun_kdv' => guvenlik($_POST['urun_kdv']),
            'stok_kod' => guvenlik($_POST['stok_kod']),
            'stok_birim' => guvenlik($_POST['stok_birim']),
            'satis_fiyati' => guvenlik($_POST['satis_fiyati'])
          ));



$siparis_turu=$db->prepare("UPDATE siparis SET stok_id=:id , stok_adi=:adi   
                          where stok_id = {$_POST['s_kod']}");

           $guncelleme=$siparis_turu->execute(array(
            'id' => $stok_kod,
            'adi' => $stok_adi
         
          ));




          if ($guncelle) {
            header("location:../../stok-listele?durum=ok");
            exit;
          } else {
            header("location:../../stok-listele?durum=no");
            exit;
          }
          exit;
        }
    /********************************************************************************/


    if (yetkikontrol()!="yetkili") {
    	header("location:../index.php");
    	exit;
    }
    ?>
