<?php 
include 'genel/header.php' ;

if (yetkikontrol()!="yetkili") {
	header("location:index.php?durum=izinsiz");
	exit;
}

if (isset($_POST['id'])) {
	$urunsor=$db->prepare("SELECT * FROM stok where stokk_id=:id");
	$urunsor->execute(array(
		'id' => guvenlik($_POST['id'])
	));
	$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
}
 else {
	header("location:siparisler");
}

?>

<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>



<div class="app-main__inner">
 
                  

<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">Düzenleme</h5>
      <div class="card-body">
      <form action="islemler/Guncelle/StokGuncelle.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Kodu</label>
            <input name="stok_kod" value="<?php echo $uruncek['stok_kod'] ?>" maxlength="11" type="text" class="form-control" required="">
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Ürün Adı</label>
            <input name="stok_adi" value="<?php echo $uruncek['stok_adi'] ?>" type="text" class="form-control" required="">
          </div>
        </div>


        <div class="row">

          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Alış Fiyatı</label>
            <input name="urun_fiyati" value="<?php echo $uruncek['urun_fiyati'] ?>" type="number" class="form-control" required="">
          </div>
          <div class="position-relative form-group col-md-6">
            <label for="exampleEmail" class="">Satış Fiyatı</label>
            <input name="satis_fiyati" value="<?php echo $uruncek['satis_fiyati'] ?>" type="number" class="form-control" required="">
          </div>
        </div>
        <div class="row">

                    <div class="position-relative form-group col-md-3">
            <label for="exampleEmail" class="">Ürün Adedi</label>
            <input name="urun_kdv" value="<?php echo $uruncek['urun_adedi'] ?>" type="number" class="form-control" required="" disabled="">
          </div>

          <div class="position-relative form-group col-md-3">
            <label for="exampleEmail" class="">Kdv</label>
            <input name="urun_kdv" value="<?php echo $uruncek['urun_kdv'] ?>" type="number" class="form-control" required="">
          </div>
<div class="position-relative form-group col-md-6">
  <label for="exampleSelect" class="">Birimi</label>
  <select name="stok_birim" id="exampleSelect" class="form-control">
    <option value="<?php echo $uruncek['stok_birim'] ?>" hidden selected="<?php echo $uruncek['stok_birim'] ?>"><?php echo $uruncek['stok_birim'] ?></option>
      <option value="Adet">Adet</option>
      <option value="Paket">Paket</option>
      <option value="Metre">Metre</option>
      <option value="Kilogram">Kilogram</option>
                                                     
  </select></div>

   

        </div>

        <input type="hidden" class="form-control" name="id" value="<?php echo $_POST['id'] ?>">
        <input type="hidden" class="form-control" name="s_kod" value="<?php echo $_POST['s_kod'] ?>">
        <button type="submit" name="stokguncelle" class="btn btn-primary">Kaydet</button>        </form>
      </div>
    </div>
  </div>


</div>




</div></div>
<!-- End of Main Content -->
<?php include 'genel/footer.php' ?>
