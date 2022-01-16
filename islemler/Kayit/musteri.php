<?php
ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';

/*******************************************************************************/

//proje Ekleme Bölümü
if (isset($_POST['musteriekle'])) {


$barkod_no = guvenlik($_POST['barkod_no']);
$adi_soyadi = guvenlik($_POST['adi_soyadi']);
$acik_adres = guvenlik($_POST['acik_adres']);
$e_posta = guvenlik($_POST['e_posta']);
$tc_no = guvenlik($_POST['tc_no']);
$cep_telefon = guvenlik($_POST['cep_telefon']);
$sabit_tel = guvenlik($_POST['sabit_tel']);
$musteri_tipi = guvenlik($_POST['musteri_tipi']);
$log_detay = guvenlik($_POST['adi_soyadi']."  Adında  Cari Kaydı Oluşturuldu.");


 



$projeekle = $db->prepare("INSERT INTO musteri SET barkod_no=?,adi_soyadi=?,acik_adres=?,e_posta=?,tc_no=?,cep_telefon=?,sabit_tel=?,musteri_tipi=?,kayit_tarih=?");

$projeekle->execute(array($barkod_no,$adi_soyadi,$acik_adres,$e_posta,$tc_no,$cep_telefon,$sabit_tel,$musteri_tipi,$buguntarih));


###################################################################################################
$log = $db->prepare("INSERT INTO log_kayit SET  log_tarih=?,log_saat=?,log_kullanici=?,log_detay=?");
$log->execute(array($buguntarih,$bugunsaat,$log_kullanici,$log_detay ));
###################################################################################################




            if ($projeekle) {
             header("location:../../musteri-listele?durum=ok");
             exit;
           } else {
             header("location:../../musteri-listele?durum=no");
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
