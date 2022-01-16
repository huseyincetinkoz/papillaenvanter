<?php
error_reporting(E_ALL);

ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';

/*******************************************************************************/


###################################################################################################
## KASA DEVRETME OLAYI
###################################################################################################


###################################################################################################
## KASA DEVRETME OLAYI BİTİŞ
###################################################################################################






if (isset($_POST['odeme-al'])) {


$barkod_no = guvenlik($_POST['barkod_no']);
$adi_soyadi = guvenlik($_POST['adi_soyadi']);
$odeme_tutari = guvenlik($_POST['odeme_tutari']);
$in_out = "Giriş";
$detay = guvenlik($_POST['detay']);
$zaman = guvenlik($_POST['zaman']);
$odeme_yontemi = guvenlik($_POST['odeme_yontemi']);
$odeme_turu = guvenlik($_POST['odeme_turu']);
$bugun = date('Y-m-d H:i:s');






$odeme_ali = $db->prepare("INSERT INTO hesap SET 
  barkod_no=?,
  adi_soyadi=?,
  odeme_tutari=?,
  in_out=?,
  detay=?,
  zaman=?,
  odeme_yontemi=?,
  odeme_turu=?

  ");


$odeme_ali->execute(array(
  $barkod_no,
  $adi_soyadi,
  $odeme_tutari,
  $in_out,
  $detay,
  $zaman,
  $odeme_yontemi,
  $odeme_turu
,));


$giden_id = $db->lastInsertId();


$kasa_cikis = $db->prepare("INSERT INTO kasa_turu SET hesap_id =? , kasa_tutari=? ,in_out=?,kasa_adi=? ,musteri_id=? ,k_tarih=? "); 

$kasa_cikis->execute(array(
  $giden_id,
  $odeme_tutari,
  $in_out,
  $odeme_yontemi,
  $barkod_no,
  $bugun
));









            if ($odeme_ali) {
             header("location:../../kasa?durum=ok");
             exit;
           } else {
             header("location:../../kasa?durum=no");
             exit;
           }
           exit;
         }

if (isset($_POST['odeme-cikisi'])) {


$in_out = "Çıkış";
$barkod_no = guvenlik($_POST['barkod_no']);
$adi_soyadi = guvenlik($_POST['adi_soyadi']);
$detay = guvenlik($_POST['detay']);
$odeme_tutari = guvenlik($_POST['odeme_tutari']);
$zaman = guvenlik($_POST['zaman']);
$odeme_yontemi = guvenlik($_POST['odeme_yontemi']);
$odeme_turu = guvenlik($_POST['odeme_turu']);
$bugun = date('Y-m-d H:i:s');



$odeme_ali = $db->prepare("INSERT INTO hesap SET 
  barkod_no=?,
  adi_soyadi=?,
 odeme_tutari=?,
  in_out=?,
  detay=?,
  zaman=?,
  odeme_yontemi=?,
  odeme_turu=?

  ");

$odeme_ali->execute(array(
  $barkod_no,
  $adi_soyadi,
  $odeme_tutari,
  $in_out,
  $detay,
  $zaman,
  $odeme_yontemi,
  $odeme_turu
,));

$giden_id = $db->lastInsertId();





$kasa_cikis = $db->prepare("INSERT INTO kasa_turu SET hesap_id =? , kasa_tutari=? ,in_out=?,kasa_adi=? ,musteri_id=? ,k_tarih=? "); 

$kasa_cikis->execute(array(
  $giden_id,
  $odeme_tutari,
  $in_out,
  $odeme_yontemi,
  $barkod_no,
  $bugun
));






            if ($odeme_ali) {
             header("location:../../kasa?durum=ok");
             exit;
           } else {
             header("location:../../kasa?durum=no");
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
