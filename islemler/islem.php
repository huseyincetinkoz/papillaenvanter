<?php


ob_start();
session_start();
include 'baglan.php';
include '../genel/fonksiyonlar.php';

//Site ayarlarını veritabanından çekme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

/********************************************************************************/

















/*Oturum Açma İşlemi Giriş*/
if (isset($_POST['oturumac'])) {
	$kul_mail=guvenlik($_POST['kul_mail']);
	$kul_sifre=md5($_POST['kul_sifre']);
	$kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=:mail and kul_sifre=:sifre");
	$kullanicisor->execute(array(
		'mail'=> $kul_mail,
		'sifre'=> $kul_sifre
	));
	$sonuc=$kullanicisor->rowCount();
	if ($sonuc==1) {
		$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
		$_SESSION['kul_mail']=sifreleme($kul_mail); //Session güvenliği için sessionumuzu üç aşamalı oalrak şifreliyoruz
		$_SESSION['kul_id']=$kullanicicek['kul_id'];

		$ipkaydet=$db->prepare("UPDATE kullanicilar SET
			ip_adresi=:ip_adresi, 
			session_mail=:session_mail WHERE 
			kul_mail=:kul_mail
			");

		$kaydet=$ipkaydet->execute(array(
			'ip_adresi' => $_SERVER['REMOTE_ADDR'], //Güvenlik için işlemine karşı kullanıcının ip adresini veritabanına kayıt ediyoruz
			'session_mail' => sifreleme($kul_mail),
			'kul_mail' => $kul_mail
		));
		header("location:../index.php");
		exit;
	} else {
		header("location:../login?durum=hata");
	}
	exit;
}
/*Oturum Açma İşlemi Giriş*/


/*******************************************************************************/

if (isset($_POST['genelayarkaydet'])) {

 			$boyut = $_FILES['site_logo']['size'];//Dosya boyutumuzu alıp değişkene aktardık.
            if($boyut > 3145728)//Burada dosyamız 3 mb büyükse girmesini söyledik
            {
            //İsteyen arkadaslar burayı istediği gibi değiştirebilir size kalmış bir şey
                echo 'Dosya 3MB den büyük olamaz.';// 3 mb büyükse ekrana yazdıracağımız alan
              } else {

               if ($boyut < 20) {
                $genelayarkaydet=$db->prepare("UPDATE ayarlar SET
                 site_baslik=:baslik,
                 site_aciklama=:aciklama,
                 site_sahibi=:sahip,
                 mail_onayi=:mail_onayi,
                 duyuru_onayi=:duyuru_onayi where id=1
                 ");

                $ekleme=$genelayarkaydet->execute(array(
                 'baslik' => guvenlik($_POST['site_baslik']),
                 'aciklama' => guvenlik($_POST['site_aciklama']),
                 'sahip' => guvenlik($_POST['site_sahibi']),
                 'mail_onayi' => guvenlik($_POST['mail_onayi']),
                 'duyuru_onayi' => guvenlik($_POST['duyuru_onayi'])
               ));
              } else {

                $yuklemeklasoru = '../img';
                @$gecici_isim = $_FILES['site_logo']["tmp_name"];
                @$dosya_ismi = $_FILES['site_logo']["name"];
            		$benzersizsayi1=rand(100,10000); //Güvenlik için yüklenen dosyanın başına rastgele karakterler koyuyoruz
            		$benzersizsayi2=rand(100,10000); //Güvenlik için yüklenen dosyanın başına rastgele karakterler koyuyoruz
            		$isim=$benzersizsayi1.$benzersizsayi2.$dosya_ismi;
            		$resim_yolu=substr($yuklemeklasoru, 3)."/".tum_bosluk_sil($isim);
            		@move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");

            		$genelayarkaydet=$db->prepare("UPDATE ayarlar SET
            			site_baslik=:baslik,
            			site_aciklama=:aciklama,
            			site_sahibi=:sahip,
            			mail_onayi=:onay,
            			duyuru_onayi=:duyuru_onayi,
            			site_logo=:site_logo where id=1
            			");

            		$ekleme=$genelayarkaydet->execute(array(
            			'baslik' => guvenlik($_POST['site_baslik']),
            			'aciklama' => guvenlik($_POST['site_aciklama']),
            			'sahip' => guvenlik($_POST['site_sahibi']),
            			'onay' => guvenlik($_POST['mail_onayi']),
            			'duyuru_onayi' => guvenlik($_POST['duyuru_onayi']),
            			'site_logo' => $resim_yolu
            		));
            	}
            }

            if ($ekleme) {
            	header("location:../ayarlar?durum=ok");
            } else {
            	header("location:../ayarlar?durum=no");
            	exit;
            }            
          }



    /********************************************************************************/


    if (isset($_POST['sifreguncelle'])) {

     $eskisifre=guvenlik($_POST['eskisifre']);
     $yenisifre_bir=guvenlik($_POST['yenisifre_bir']); 
     $yenisifre_iki=guvenlik($_POST['yenisifre_iki']);

     $kul_sifre=md5($eskisifre);

     $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kul_sifre=:sifre AND kul_id=:id");
     $kullanicisor->execute(array(
      'id' => guvenlik($_POST['kul_id']),
      'sifre' => $kul_sifre
    ));

//dönen satır sayısını belirtir
     $say=$kullanicisor->rowCount();

     if ($say==0) {
      header("Location:../profil?durum=eskisifrehata");
    } else {
//eski şifre doğruysa başla
      if ($yenisifre_bir==$yenisifre_iki) {
       if (strlen($yenisifre_bir)>=6) {
//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
        $sifre=md5($yenisifre_bir);
        $kullanici_yetki=0;
        $kullanicikaydet=$db->prepare("UPDATE kullanicilar SET
         kul_sifre=:kul_sifre
         WHERE kul_id=:kul_id");

        $insert=$kullanicikaydet->execute(array(
         'kul_sifre' => $sifre,
         'kul_id'=>guvenlik($_POST['kul_id'])
       ));

        if ($insert) {
         header("Location:../profil.php?durum=sifredegisti");
//Header("Location:../production/genel-ayarlar?durum=ok");
       } else {
         header("Location:../profil.php?durum=no");
       }

// Bitiş
     } else {
      header("Location:../profil.php?durum=eksiksifre");
    }

  } else {
   header("Location:../profil?durum=sifreleruyusmuyor");
   exit;
 }
}
exit;
if ($update) {
  header("Location:../profil?durum=ok");

} else {
  header("Location:../profil?durum=no");
}
}


/********************************************************************************/


if (isset($_POST['profilguncelle'])) {

 if (isset($_SESSION['kul_mail'])) {

			$boyut = $_FILES['kul_logo']['size'];//Dosya boyutumuzu alıp değişkene aktardık.
            if($boyut > 3145728)//Burada dosyamız 3 mb büyükse girmesini söyledik
            {
            //İsteyen arkadaslar burayı istediği gibi değiştirebilir size kalmış bir şey
                echo 'Dosya 3MB den büyük olamaz.';// 3 mb büyükse ekrana yazdıracağımız alan
              } else {
               $yuklemeklasoru = '../img';
               @$gecici_isim = $_FILES['kul_logo']["tmp_name"];
               @$dosya_ismi = $_FILES['kul_logo']["name"];
               $benzersizsayi1=rand(10000,99999);
               $benzersizsayi2=rand(10000,99999);
               $isim=$benzersizsayi1.$benzersizsayi2.$dosya_ismi;
               $resim_yolu=substr($yuklemeklasoru, 3)."/".tum_bosluk_sil($isim);
               @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");            	
             }

             $uzunluk=strlen($resim_yolu);
             if ($uzunluk<18) {
               $profilguncelle=$db->prepare("UPDATE kullanicilar SET
                kul_isim=:isim,
                kul_mail=:mail,
                kul_telefon=:telefon,
                kul_unvan=:unvan WHERE session_mail=:session_mail");
               $ekleme=$profilguncelle->execute(array(
                'isim' => guvenlik($_POST['kul_isim']),
                'mail' => guvenlik($_POST['kul_mail']),
                'telefon' => guvenlik($_POST['kul_telefon']),
                'unvan' => guvenlik($_POST['kul_unvan']),
                'session_mail' => $_SESSION['kul_mail']
              ));
               if ($ekleme) {
                header("Location:../kullanicilar?durum=ok");
              } else {

                header("Location:../kullanicilar?durum=no");
              }
              exit;
            } else {
            	$profilguncelle=$db->prepare("UPDATE kullanicilar SET
            		kul_isim=:isim,
            		kul_mail=:mail,
            		kul_telefon=:telefon,
            		kul_unvan=:unvan,
            		kul_logo=:logo WHERE session_mail=:session_mail");
            	$ekleme=$profilguncelle->execute(array(
            		'isim' => guvenlik($_POST['kul_isim']),
            		'mail' => guvenlik($_POST['kul_mail']),
            		'telefon' => guvenlik($_POST['kul_telefon']),
            		'unvan' => guvenlik($_POST['kul_unvan']),
            		'logo' => $resim_yolu,
            		'session_mail' => $_SESSION['kul_mail']
            	));

            	if ($ekleme) {
            		header("Location:../profil?durum=ok");
            	} else {
            		header("Location:../profil?durum=noff");
            	}
            	exit;
            }

          }
          header("Location:../profil");
          exit;

        }


        /********************************************************************************/

    if (yetkikontrol()!="yetkili") {
    	header("location:../index.php");
    	exit;
    }
    ?>
