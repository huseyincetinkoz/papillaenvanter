<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';

/*******************************************************************************/







 
//urun Ekleme Bölümü
if (isset($_POST['stokekle'])) {


$stok_adi = guvenlik($_POST['stok_adi']);
$urun_adedi = guvenlik($_POST['urun_adedi']);
$urun_fiyati = guvenlik($_POST['urun_fiyati']);
$urun_kdv = guvenlik($_POST['urun_kdv']);
$stok_kod = guvenlik($_POST['stok_kod']);
$satis_fiyati = guvenlik($_POST['satis_fiyati']);
$stok_birim = guvenlik($_POST['stok_birim']);

$stok_toplam = ($_POST['urun_fiyati'] * $_POST['urun_adedi']) / $_POST['urun_kdv'];

 $log_detay = guvenlik($_POST['stok_kod'] . " Barkod Nolu ". $stok_adi ." Stok Girişi Yapılmıştır.");




$urunekle = $db->prepare("INSERT INTO stok SET 
  stok_adi=?,
  urun_adedi=?,
  urun_fiyati=?,
  urun_kdv=?,
  stok_kod=?,
  satis_fiyati=?,
  stok_birim=?,
  urun_toplam=?

  ");

$urunekle->execute(array(
  $stok_adi,
  $urun_adedi,
  $urun_fiyati,
  $urun_kdv,
  $stok_kod,
  $satis_fiyati,
  $stok_birim,
  $stok_toplam

));



###################################################################################################
$log = $db->prepare("INSERT INTO log_kayit SET  log_tarih=?,log_saat=?,log_kullanici=?,log_detay=?");
$log->execute(array($buguntarih,$bugunsaat,$log_kullanici,$log_detay ));
###################################################################################################





            if ($urunekle) {
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
