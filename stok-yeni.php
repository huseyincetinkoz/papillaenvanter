<?php 
include 'genel/header.php';
if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}
?><div class="app-main__inner">
 
                  

<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">Ekle</h5>
      <div class="card-body">
      <form action="islemler/Kayit/stok-ekle.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Kodu</label>
            <input name="stok_kod"   maxlength="11"  type="text" class="form-control" required>
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Adı</label>
            <input name="stok_adi"  type="text" class="form-control" required>
          </div>
        </div>


        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Alış Fiyatı</label>
            <input name="urun_fiyati"   type="number" class="form-control" required>
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Satış Fiyatı</label>
            <input name="satis_fiyati"   type="number" class="form-control" required>
          </div>
        </div>
        <div class="row">

          <div class="position-relative form-group col-md-3">
            <label for="exampleEmail" class="">Miktar</label>
            <input name="urun_adedi"   type="number" class="form-control" required>
          </div>
 <div class="position-relative form-group col-md-3">
            <label for="exampleEmail" class="">Kdv</label>
            <input name="urun_kdv"   type="number" class="form-control" required>
          </div><div class="position-relative form-group col-md-6">
  <label for="exampleSelect" class="">Birimi</label>
  <select name="stok_birim" id="exampleSelect" class="form-control">
      <option value="Adet">Adet</option>
      <option value="Paket">Paket</option>
      <option value="Metre">Metre</option>
      <option value="Kilogram">Kilogram</option>
                                                     
  </select></div>

          

        </div>
          <button type="submit" name="stokekle" class="btn btn-primary">Ekle</button>
        </form>
      </div>
    </div>
  </div>


</div>
<!-- End of Main Content -->
<?php include 'genel/footer.php' ?>
