<?php 
include 'genel/header.php' ;
if (isset($_POST['stok-profil'])) {
  if (is_numeric($_POST['id'])) {

    $projesor=$db->prepare("SELECT * FROM stok where stokk_id=:id");
    $projesor->execute(array(
      'id' => guvenlik($_POST['id'])
    ));
    $projecek=$projesor->fetch(PDO::FETCH_ASSOC);
  } else {
    header("location:stok-listele?durum=hata");
  }

} else {
  header("location:stok-listele.php");
} 
?>
<div class="app-main__inner">
 
                  

<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">GÖRÜNTÜLE</h5>
      <div class="card-body">
      <form action="islemler/Guncelle/StokGuncelle.php" method="POST" enctype="multipart/form-data" data-parsley-validate="">
        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Kodu</label>
            <input disabled  name="stok_kod" value="<?php echo $projecek['stok_kod'] ?>" maxlength="11" type="text" class="form-control" required="">
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Adı</label>
            <input disabled  name="stok_adi" value="<?php echo $projecek['stok_adi'] ?>" type="text" class="form-control" required="">
          </div>
        </div>


        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Alış Fiyatı</label>
            <input disabled name="urun_fiyati" value="<?php echo $projecek['urun_fiyati'] ?>" type="number" class="form-control" required="">
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Satış Fiyatı</label>
            <input disabled name="satis_fiyati" value="<?php echo $projecek['satis_fiyati'] ?>" type="number" class="form-control" required="">
          </div>
        </div>
        <div class="row">

          <div class="position-relative form-group col-md-3">
            <label for="exampleEmail" class="">Kdv</label>
            <input disabled name="urun_kdv" value="<?php echo $projecek['urun_kdv'] ?>" type="number" class="form-control" required="">
          </div>
<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Birimi</label>
  <select disabled name="stok_birim" id="exampleSelect" class="form-control">
      <option value="Adet">Adet</option>
      <option value="Paket">Paket</option>
      <option value="Metre">Metre</option>
      <option value="Kilogram">Kilogram</option>
                                                     
  </select></div>

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Miktarı</label>
            <input disabled name="urun_adedi" value="<?php echo $projecek['urun_adedi'] ?>" type="number" class="form-control" required="">
          </div>

        </div>


      </div>
    </div>
  </div>


</div>


</div></div>


<?php include 'genel/footer.php' ?>

