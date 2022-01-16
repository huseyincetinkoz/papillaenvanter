<?php

ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';


/********************************************************************************/

if (isset($_POST['siparis-guncelle'])) {

$stok_id = guvenlik($_POST['s_id']);
$id = guvenlik($_POST['s_guncelle']);
$sip_zaman = guvenlik($_POST['sip_zaman']);
$in_out = guvenlik($_POST['in_out']);
$musteri_id = guvenlik($_POST['musteri_id']);
$sip_birim_fiyati = guvenlik($_POST['sip_birim_fiyati']);
$sip_urun_adedi = guvenlik($_POST['sip_urun_adedi']);
$sip_kdvsiz_fiyat = guvenlik($_POST['sip_kdvsiz_fiyat']);
$sip_kdv_orani = guvenlik($_POST['sip_kdv_orani']);
$sip_kdv_tutari = guvenlik($_POST['sip_kdv_tutari']);
$sip_genel_toplam = guvenlik($_POST['sip_genel_toplam']);
$sip_turu = guvenlik($_POST['sip_turu']);

$siparisguncelle = $db->prepare("UPDATE siparis SET 
  sip_zaman=?, 
  in_out=?, 
  musteri_id=?, 
  sip_birim_fiyati=?, 
  sip_urun_adedi=?, 
  sip_kdvsiz_fiyat=?, 
  sip_kdv_orani=?, 
  sip_kdv_tutari=?, 
  sip_genel_toplam=?,
  sip_turu=?

  where siparis_id=$id
  ");



$siparisguncelle->execute(array(
  $sip_zaman,
  $in_out,
  $musteri_id,
  $sip_birim_fiyati,
  $sip_urun_adedi,
  $sip_kdvsiz_fiyat,
  $sip_kdv_orani,
  $sip_kdv_tutari,
  $sip_genel_toplam,
  $sip_turu

,));


if ($_POST['sip_turu'] == "Tamamlandı") {

 if ($_POST['in_out'] == "Giriş") {
   
$orders = $db -> prepare("UPDATE stok SET urun_adedi=urun_adedi+$sip_urun_adedi WHERE stokk_id=$stok_id");
$orders-> execute (array($id));


 }


  if ($_POST['in_out'] == "Çıkış") {
   
$orders = $db -> prepare("UPDATE stok SET urun_adedi=urun_adedi-$sip_urun_adedi WHERE stokk_id=$stok_id");
$orders-> execute (array($id));

 }

}








          if ($siparisguncelle) {
            header("location:../../siparis-listele?durum=ok");
            exit;
          } else {
            header("location:../../siparis-listele?durum=no");
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
