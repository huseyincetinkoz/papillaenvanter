<?php 
include 'genel/header.php' ;
if (isset($_POST['musteri-goster'])) {
  if (is_numeric($_POST['id'])) {

    $projesor=$db->prepare("SELECT * FROM musteri where id=:id");
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
      <form action="islemler/Guncelle/MusteriGuncelle.php" method="POST" enctype="multipart/form-data" data-parsley-validate="">
        <div class="row">
<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Müşteri Türü </label>
  <select disabled name="musteri_tipi" id="exampleSelect" class="form-control">
         <option value="<?php echo $projecek['musteri_tipi'] ?>" hidden selected="<?php echo $projecek['musteri_tipi'] ?>"><?php echo $projecek['musteri_tipi'] ?></option>
      <option value="Alıcı">Alıcı</option>
      <option value="Satıcı">Satıcı</option>
      <option value="Alıcı / Satıcı">Alıcı / Satıcı</option>
                                                     
  </select></div>
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
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adres</label>
              <input disabled name="acik_adres" id="exampleEmail" type="text" class="form-control"value="<?php echo $projecek['acik_adres'] ?>" required="">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">E -Posta </label>
              <input disabled name="e_posta" type="email" id="exampleEmail" class="form-control" value="<?php echo $projecek['e_posta'] ?>"required="">
            </div>
        </div> 

        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Vergi No / Tc No</label>
              <input disabled name="tc_no" id="exampleEmail" maxlength="11" value="<?php echo $projecek['tc_no'] ?>" type="number" class="form-control" required="">
            </div>
            <div class="position-relative form-group col-md-6">
<div class="row">
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Cep Telefon</label>
   <input disabled name="cep_telefon" id="exampleEmail" type="number" class="form-control" value="<?php echo $projecek['cep_telefon'] ?>" required="">
</div>
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Sabit Telefon</label>
   <input disabled name="sabit_tel" id="exampleEmail" type="number" class="form-control" value="<?php echo $projecek['sabit_tel'] ?>" required="">
</div>
</div>

            </div>
        </div> 

      </div>
    </div>
  </div>


                </div></div></div>
              </div>



</div>


<?php include 'genel/footer.php' ?>

