<?php 
include 'genel/header.php' ;

if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}

if (isset($_POST['id'])) {
  $hizmetsor=$db->prepare("SELECT * FROM hesap where hesap_id=:id");
  $hizmetsor->execute(array(
    'id' => guvenlik($_POST['id'])
  ));
  $hizmetcek=$hizmetsor->fetch(PDO::FETCH_ASSOC);
} else {
  header("location:durum");
}  
?>

<div class="app-main__inner">



<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white    bg-slick-carbon">Düzenleme</h5>
      <div class="card-body">
      <form action="islemler/Guncelle/MusteriGuncelle.php" method="POST" enctype="multipart/form-data" data-parsley-validate="">
        <div class="row">
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu </label>
              <input name="zaman" maxlength="10ml" id="exampleEmail" type="date" class="form-control" required="" value="<?php echo $hizmetcek['zaman'] ?>" >
            </div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu </label>
              <input name="barkod_no" maxlength="10ml" id="exampleEmail" type="text" class="form-control" required="" value="<?php echo $hizmetcek['barkod_no'] ?>" disabled >
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input  id="exampleEmail" type="text" value="<?php echo $hizmetcek['adi_soyadi'] ?>" class="form-control" required="" disabled>
            </div>
        </div> 
        <div class="row">
<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Girdi / Çıktı</label>
  <select  class="form-control">
         <option value="<?php echo $hizmetcek['in_out'] ?>" hidden selected="<?php echo $hizmetcek['in_out'] ?>"><?php echo $hizmetcek['in_out'] ?></option>
         <option value="<?php echo $hizmetcek['in_out'] ?>" hidden selected="<?php echo $hizmetcek['in_out'] ?>"><?php echo $hizmetcek['in_out'] ?></option>
         <option value="Giriş">Giriş</option>
         <option value="Çıkış">Çıkış</option>

                                                     
  </select></div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Ödeme Türü</label>
              <input   class="form-control" value="<?php echo $hizmetcek['odeme_turu'] ?>"required="">
            </div>

                        <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Ödeme Tutarı</label>
              <input   class="form-control" value="<?php echo $hizmetcek['odeme_tutari'] ?> TL "required="">
            </div>
        </div> 


        <input type="hidden" class="form-control" name="id" value="<?php echo $_POST['id'] ?>">
        <input type="hidden" class="form-control" name="b_id" value="<?php echo $_POST['b_id'] ?>">

      <button type="submit" name="musteriguncelle" class="btn btn-primary">Düzenle</button>        </form>
      </div>
    </div>
  </div>


                </div></div></div>
              </div>


           
<?php include 'genel/footer.php' ?>

