<?php 
include 'genel/header.php' ;
if (isset($_POST['kasa-goster'])) {
  if (is_numeric($_POST['id'])) {

    $projesor=$db->prepare("SELECT * from hesap 
join musteri on musteri.barkod_no = hesap.barkod_no


    where hesap_id=:id");
    $projesor->execute(array(
      'id' => guvenlik($_POST['id'])
    ));

    $projecek=$projesor->fetch(PDO::FETCH_ASSOC);
  } else {
    header("location:projeler?durum=hata");
  }

} else {
  header("location:projeler.php");
} 
?>


<div class="app-main__inner">




<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white    bg-slick-carbon">Görüntüle</h5>
      <div class="card-body">
        <div class="row">
   <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Tarih</label>
              <input disabled  maxlength="10ml" id="exampleEmail" type="text" class="form-control" required="" value="<?php echo $projecek['zaman'] ?>">
            </div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu </label>
              <input disabled name="barkod_no" maxlength="10ml" id="exampleEmail" type="text" class="form-control" required="" value="<?php echo $projecek['barkod_no'] ?>">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input disabled name="adi_soyadi" id="exampleEmail" type="text" value="<?php echo $projecek['adi_soyadi'] ?>" class="form-control" required="">
            </div>
        </div> 
        <div class="row">
<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Girdi / Çıktı</label>
  <select disabled class="form-control">
         <option value="<?php echo $projecek['in_out'] ?>" hidden selected="<?php echo $projecek['in_out'] ?>"><?php echo $projecek['in_out'] ?></option>

                                                     
  </select></div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Ödeme Türü</label>
              <input disabled  class="form-control" value="<?php echo $projecek['odeme_turu'] ?>"required="">
            </div>

                        <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Ödeme Tutarı</label>
              <input disabled  class="form-control" value="<?php echo $projecek['odeme_tutari'] ?> TL "required="">
            </div>
        </div> 

  

      </div>





















    </div>
  </div>


                </div></div></div>
              </div>



</div>


<?php include 'genel/footer.php' ?>

