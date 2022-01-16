<?php 

ob_start();
session_start(); 
include 'islemler/baglan.php';
include 'genel/fonksiyonlar.php';

oturumkontrol();

if (isset($_POST['id'])) {
  $urunsor=$db->prepare("SELECT *from siparis
join musteri on musteri.barkod_no = siparis.musteri_id where siparis_id=:id ");

  $urunsor->execute(array(
    'id' => guvenlik($_POST['id'])
  ));
  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
}
 else {
  header("location:siparis-listele");
}



?>
<div class="app-main__inner">

<a onclick="window.print();" id="printbutton">Yazdır</a>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fatura</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <style>
  @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  body, h1, h2, h3, h4, h5, h6{
    font-family: 'Bree Serif', serif;
  }
  </style>
</head>
<body>

  <div class="container">

    <div class="row">
      <div class="col-xs-6">
        <h1>
          <a href="">
          <!--   <img src="logo.png"> -->
           FİRMA LOGO
          </a>
        </h1>
      </div>
      <div class="col-xs-6 text-right">
        <h1>FATURA</h1>
        <h1><small>Fiş No: #<?php echo $uruncek['fisno']; ?></small></h1>
      </div>
    </div>

      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4> <a href="#">Firma Adı : CMR Yönetim Sistemleri</a></h4>
                  </div>
                  <div class="panel-body">
                    <p>
                     Firma Adresi :Firma Adres <br />
                     İletişim  : İletişim Adresi<br />
                     Mail       : omerguzelyurt41@gmail.com
                    </p>
                  </div>
                </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4><a href="#"><?php echo $uruncek['adi_soyadi']; ?></a></h4>
                  </div>
                  <div class="panel-body">
                    <p>
                      <?php echo $uruncek['acik_adres']; ?><br />
                      <?php echo $uruncek['cep_telefon']; ?><br />
                      <?php echo $uruncek['e_posta']; ?><br />
                      <?php echo $uruncek['sabit_tel']; ?><br />
                    </p>
                  </div>
                </div>
        </div>
      </div> <!-- / end client details section -->

             <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>Hizmet Adı</h4></th>
            <th><h4>Adet</h4></th>
            <th><h4>Fiyat</h4></th>
            <th><h4>Kdv Oran</h4></th>
            <th><h4>Fiyat Tutar</h4></th>
          </tr>
        </thead>
        <tbody>
<?php
if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $urunsor=$db->prepare("SELECT * from siparis  where siparis_id =$id");
  $urunsor->execute(array(
    'id' => guvenlik($_POST['id'])
  ));


  $urunsor1=$db->prepare("SELECT * from siparis  where siparis_id =$id");

  $urunsor1->execute(array(
    'id' => guvenlik($_POST['id'])
  ));


}
while ( $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {  ?>
          <tr>
            <td><?php  echo  $uruncek['stok_adi']; ?> </td>
            <td class="text-right"><?php  echo  $uruncek['sip_urun_adedi']; ?></td>
             <td class="text-right"><?php echo  number_format($uruncek['sip_birim_fiyati'],2,".",","); ?></td>
             <td class="text-right"><?php  echo  $uruncek['sip_kdv_orani']; ?></td>
              <td class="text-right"><?php echo  number_format($uruncek['sip_kdvsiz_fiyat'],2,".",","); ?></td>
          </tr>

<?php  } ?>

        </tbody>
      </table>

    <div class="row text-right">
      <div class="col-xs-2 col-xs-offset-8">
        <p style="font-size: 16px;">
          <strong>
            Toplam Kdv : <br>
            Genel Toplam : <br>
          </strong>
        </p>
      </div>
      <div class="col-xs-2">
        <strong style="font-size: 16px;">
          <?php $uruncek1=$urunsor1->fetch(PDO::FETCH_ASSOC);
 ?>
 <?php echo  number_format($uruncek1['sip_kdv_tutari'],2,".",","); ?> <br>
 <?php echo  number_format($uruncek1['sip_genel_toplam'],2,".",","); ?> <br>
        </strong>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-5">
        <div class="panel panel-info">
        <div class="panel-heading">
          <h4>Ödeme Bilgisi</h4>
        </div>
        <div class="panel-body">
          <p>Banka Adı</p>
          <p>Şube Kodu : --------</p>
          <p>Hesap Numarası : --------</p>
          <p>IBAN : --------</p> 
        </div>
      </div>
      </div>
      <div class="col-xs-7">
       <div class="span7">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4>Firma İletişim<h4>
          </div>
          <div class="panel-body">
            <p>
              Email :xxxxx<br><br>
              Mobile : xxxx <br> <br>
             
            </p>
           <!--  <h4>Payment should be mabe by Bank Transfer</h4> -->
          </div>
        </div>
      </div>
      </div>
    </div>

  </div>

</body>
</html>

