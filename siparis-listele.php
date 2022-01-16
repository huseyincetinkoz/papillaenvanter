
<?php 
include'genel/header.php';



?>


<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css" media="screen">
  @media only screen and (max-width: 700px) {
    .mobilgizle {
      display: none;
    }
    .mobilgizleexport {
      display: none;
    }
    .mobilgoster {
      display: block;
    }
  }
  @media only screen and (min-width: 700px) {
    .mobilgizleexport {
      display: flex;
    }
    .mobilgizle {
      display: block;
    }
    .mobilgoster {
      display: none;
    }
  }
</style>
<!-- Begin Page Content -->
<div class="app-main__inner">


<div class="row">
                            <div class="col-md-12">
                               <div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">siparişler</h5>

    <div class="card-body" style="width: 100%">
     
    <div class="table-responsive">


      <table class="table table-bordered" id="dataTable " width="100%" cellspacing="0">
        <thead>
          <tr> 
            <th>Tarih</th>
            <th>Fiş No</th>
            <th>Müşteri Adı</th>
            <th>Ürün Adı</th>
            <th>Toplam Fiyat</th>
            <th>Sipariş Durumu</th>
            <th>Giriş / Çıkış</th>

            <th>İşlem</th>
          </tr>
        </thead>
        <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
        <tbody>
         <?php 
         //$urunsor=$db->prepare("SELECT * from musteri inner join siparis on musteri.id=siparis.musteri_adi");
$urunsor=$db->prepare("SELECT * from musteri 
join siparis on musteri.barkod_no = siparis.musteri_id
join stok on siparis.stok_id = stok.stokk_id
");

         $urunsor->execute();
         while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 

       ?>
           <tr>
            <td><?php echo $uruncek['sip_zaman']; ?></td>
            <td><?php echo $uruncek['fisno']; ?></td>
            <td><?php echo $uruncek['adi_soyadi']; ?></td>
            <td><?php echo $uruncek['stok_adi']; ?></td>
            <td><?php
            echo number_format(round($uruncek['sip_genel_toplam']), 2);
             ?></td>
            <td><?php 

            if ($uruncek['sip_turu'] =="Beklemede" ) {
               echo'<div class="mb-2 mr-2 badge badge-warning">Beklemede</div>';
            }
            if ($uruncek['sip_turu'] =="Tamamlandı" ) {
               echo'<div class="mb-2 mr-2 badge badge-success">Tamamlandı</div>';
            }
            if ($uruncek['sip_turu'] =="İptal Edildi" ) {
               echo'<div class="mb-2 mr-2 badge badge-danger">İptal Edildi</div>';
            }
             ?></td>
            <td><?php echo $uruncek['in_out']; ?></td>

         
            
            <td>

             
               <div class="d-flex justify-content-center">                



                 <?php 
              if (yetkikontrol()=="yetkili") {?>


              <form action="siparis-fatura" method="POST">
                <input type="hidden" name="id" value="<?php echo $uruncek['siparis_id'] ?>">
                <button type="submit" name="siparis-profil" class="btn btn-primary btn-sm btn-icon-split p-1">
                Görüntüle
                </button>
              </form>


              <form action="siparis-duzenle" method="POST" style="padding-left: 10px;">
                <input type="hidden" name="id" value="<?php echo $uruncek['siparis_id'] ?>">
                <button type="submit" name="siparis-profil"  class="btn btn-info btn-sm btn-icon-split p-1">
                Düzenle
                </button>
              </form>


       
               
                <form class="mx-1" action="islemler/Sil/SiparisSil.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $uruncek['siparis_id'] ?>">
                  <button type="submit" name="siparis-toptan" class="btn btn-danger btn-sm btn-icon-split">
                    <span class="icon text-white-60">Sil</span>

                  </button>
                </form>
              <?php } ?>

            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
  </table>
</div>
</div>
</div>
<!--Datatables çıkış-->
</div>
</div></div>
<?php include'genel/footer.php' ?>
