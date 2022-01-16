<?php 
include 'genel/header.php' ;

if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}

if (isset($_POST['id'])) {
  $hizmetsor=$db->prepare("SELECT * FROM musteri where id=:id");
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
  <label for="exampleSelect" class="">Müşteri Türü </label>
  <select name="musteri_tipi" id="exampleSelect" class="form-control">
         <option value="<?php echo $hizmetcek['musteri_tipi'] ?>" hidden selected="<?php echo $hizmetcek['musteri_tipi'] ?>"><?php echo $hizmetcek['musteri_tipi'] ?></option>      <option value="Alıcı">Alıcı</option>
      <option value="Satıcı">Satıcı</option>
      <option value="Alıcı / Satıcı">Alıcı / Satıcı</option>
                                                     
  </select></div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu </label>
              <input name="barkod_no" maxlength="10ml" id="exampleEmail" type="text" class="form-control" required="" value="<?php echo $hizmetcek['barkod_no'] ?>">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input name="adi_soyadi" id="exampleEmail" type="text" value="<?php echo $hizmetcek['adi_soyadi'] ?>" class="form-control" required="">
            </div>
        </div> 
        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adres</label>
              <input name="acik_adres" id="exampleEmail" type="text" class="form-control"value="<?php echo $hizmetcek['acik_adres'] ?>" required="">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">E -Posta </label>
              <input name="e_posta" type="email" id="exampleEmail" class="form-control" value="<?php echo $hizmetcek['e_posta'] ?>"required="">
            </div>
        </div> 

        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Vergi No / Tc No</label>
              <input name="tc_no" id="exampleEmail" maxlength="11" value="<?php echo $hizmetcek['tc_no'] ?>" type="number" class="form-control" required="">
            </div>
            <div class="position-relative form-group col-md-6">
<div class="row">
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Cep Telefon</label>
   <input name="cep_telefon" id="exampleEmail" type="number" class="form-control" value="<?php echo $hizmetcek['cep_telefon'] ?>" required="">
</div>
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Sabit Telefon</label>
   <input name="sabit_tel" id="exampleEmail" type="number" class="form-control" value="<?php echo $hizmetcek['sabit_tel'] ?>" required="">
</div>
</div>

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

