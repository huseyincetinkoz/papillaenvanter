<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';



if (isset($_POST['siparis-ekle'])) {



$musteri_id = guvenlik($_POST['musteri_id']);
$stok_adi = guvenlik($_POST['stok_adi']);
$stok_id = guvenlik($_POST['s_id']);
$sip_birim_fiyati = guvenlik($_POST['sip_birim_fiyati']);
$sip_urun_adedi = guvenlik($_POST['sip_urun_adedi']);
$sip_kdvsiz_fiyat = guvenlik($_POST['sip_kdvsiz_fiyat']);
$sip_kdv_orani = guvenlik($_POST['sip_kdv_orani']);
$sip_kdv_tutari = guvenlik($_POST['sip_kdv_tutari']);
$sip_genel_toplam = guvenlik($_POST['sip_genel_toplam']);
$in_out = guvenlik($_POST['in_out']);
$fisno = guvenlik($_POST['fisno']);
$sip_turu = guvenlik($_POST['sip_turu']);
$sip_zaman = guvenlik($_POST['sip_zaman']);



###############################################################
### Sipariş Ekle

$urunekle = $db->prepare("INSERT INTO siparis SET 
  musteri_id=?,
  stok_id=?,
  stok_adi=?,
  sip_birim_fiyati=?,
  sip_urun_adedi=?,
  sip_kdvsiz_fiyat=?,
  sip_kdv_orani=?,
  sip_kdv_tutari=?,
  sip_genel_toplam=?,
  in_out=?,
  fisno=?,
  sip_turu=?,
  sip_zaman=?
  ");

$urunekle->execute(array(
  $musteri_id,
  $stok_id,
  $stok_adi,
  $sip_birim_fiyati,
  $sip_urun_adedi,
  $sip_kdvsiz_fiyat,
  $sip_kdv_orani,
  $sip_kdv_tutari,
  $sip_genel_toplam,
  $in_out,
  $fisno,
  $sip_turu,
  $sip_zaman
));

##################################
    
   

   $db = null; //bağlantımızı sonlandırıyoruz
            header("location:../../siparis-listele?durum=ok");
}




/********************************************************************************/


    if (yetkikontrol()!="yetkili") {
      header("location:../index.php");
      exit;
    }
    ?>
