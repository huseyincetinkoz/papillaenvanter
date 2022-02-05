<?php 
include 'genel/header.php';
if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}
?><div class="app-main__inner">



<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white    bg-slick-carbon">Sisteme Yeni  Müşteri Kayıt</h5>
      <div class="card-body">
      <form action="islemler/Kayit/musteri.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
      	<div class="row">
<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Müşteri Türü </label>
  <select name="musteri_tipi" id="exampleSelect" class="form-control">
      <option >Operatör</option>
      <option value="Alıcı">İsmail</option>
      <option value="Satıcı">Ömer</option>
      <option value="Alıcı / Satıcı">Hüseyin</option>
                                                     
  </select></div>
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">ADET </label>
              <input name="barkod_no" maxlength="10ml" id="exampleEmail" type="text" class="form-control" required>
            </div>
            <div class="position-relative form-group col-md-6">
	            <label for="exampleEmail" class="">ÜRÜN ADI</label>
	            <input name="adi_soyadi" id="exampleEmail" type="text" class="form-control" required>
	          </div>
        </div> 
      	<div class="row">
	          <div class="position-relative form-group col-md-6">
	            <label for="exampleEmail" class="">İş Emri NO</label>
	            <input name="acik_adres" id="exampleEmail" type="text" class="form-control" required>
	          </div>
	          <div class="position-relative form-group col-md-6">
	            <label for="exampleEmail" class="">E -Posta </label>
	            <input name="e_posta" type="text" id="exampleEmail"  class="form-control" required>
	          </div>
        </div> 

      	<div class="row">
	          <div class="position-relative form-group col-md-6">
	            <label for="exampleEmail" class="">Vergi No / Tc No</label>
	            <input name="tc_no" id="exampleEmail" maxlength="11" type="number" class="form-control" required>
	          </div>
	          <div class="position-relative form-group col-md-6">
<div class="row">
<div class="position-relative form-group col-md-6">
	 <label for="exampleEmail" class="">Cep Telefon</label>
	 <input name="cep_telefon" id="exampleEmail"  type="number" class="form-control"   required>
</div>
<div class="position-relative form-group col-md-6">
	 <label for="exampleEmail" class="">Sabit Telefon</label>
	 <input name="sabit_tel" id="exampleEmail" type="number" class="form-control" required>
</div>
</div>

	          </div>
        </div> 
      <button type="submit" name="musteriekle" class="btn btn-primary">Ekle</button>
        </form>
      </div>
    </div>
  </div>


</div>
<!-- End of Main Content -->
<?php include 'genel/footer.php' ?>
