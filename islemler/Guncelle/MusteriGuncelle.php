<?php

ob_start();
session_start();
include '../baglan.php';
include '../fonksiyonlar.php';
include '../fonk.php';


/********************************************************************************/

if (isset($_POST['musteriguncelle'])) {

$adi_soyadi = guvenlik($_POST['adi_soyadi']);
$acik_adres = guvenlik($_POST['acik_adres']);
$cep_telefon = guvenlik($_POST['cep_telefon']);
$barkod_no = guvenlik($_POST['barkod_no']);
$sabit_tel = guvenlik($_POST['sabit_tel']);
$e_posta = guvenlik($_POST['e_posta']);
$tc_no = guvenlik($_POST['tc_no']);
$musteri_tipi = guvenlik($_POST['musteri_tipi']);


           $kategoriguncelle=$db->prepare("UPDATE musteri SET
            adi_soyadi=:adi_soyadi ,
            acik_adres=:acik_adres ,
            cep_telefon=:cep_telefon,
            sabit_tel=:sabit_tel,
            barkod_no=:barkod_no,
            e_posta=:e_posta,
            tc_no=:tc_no,
            musteri_tipi=:musteri_tipi
             where id={$_POST['id']}");

           $guncelle=$kategoriguncelle->execute(array(
            'adi_soyadi' => $adi_soyadi,
            'acik_adres' => $acik_adres,
            'cep_telefon' => $cep_telefon,
            'sabit_tel' => $sabit_tel,
            'barkod_no' => $barkod_no,
            'e_posta' => $e_posta,
            'tc_no' => $tc_no,
            'musteri_tipi' => $musteri_tipi
          ));


// $kategoriguncelle=$db->prepare("UPDATE musteri SET where id={$_POST['id']}");

###################################################################################################
$kasa=$db->prepare("UPDATE kasa_turu SET  musteri_id=:degistir where musteri_id = {$_POST['b_id']}");

$guncelleme=$kasa->execute(array(  'degistir' => $barkod_no  ));
###################################################################################################
$siparis=$db->prepare("UPDATE siparis SET musteri_id=:degis where musteri_id = {$_POST['b_id']}");

$guncelleme=$siparis->execute(array( 'degis' => $barkod_no ));
###################################################################################################
$hesap=$db->prepare("UPDATE hesap SET barkod_no=:degis,adi_soyadi=:adi where barkod_no = {$_POST['b_id']}");

$guncelleme=$hesap->execute(array('degis' => $barkod_no,'adi' => $adi_soyadi));
###################################################################################################


        



          if ($guncelle) {
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
