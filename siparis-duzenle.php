<?php 
include 'genel/header.php' ;

if (yetkikontrol()!="yetkili") {
	header("location:index.php?durum=izinsiz");
	exit;
}

if (isset($_POST['id'])) {
  $urunsor=$db->prepare("SELECT *from siparis
join musteri on musteri.barkod_no = siparis.musteri_id
join stok on stok.stokk_id = siparis.stok_id 
where siparis_id=:id ");

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


<div class="row">
                            <div class="col-md-12">
                               <div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">Düzenleme</h5>
      <div class="card-body ">

      <form action="islemler/Guncelle/SiparisGuncelle.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">

<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu </label>
              <input name="musteri_id" id="busca" type="text" value="<?php echo $uruncek['musteri_id']; ?>" class="form-control">
            </div>


<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Tarih</label>
              <input name="sip_zaman" value="<?php echo $uruncek['sip_zaman']; ?>" type="date" class="form-control">
            </div>

<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Girdi / Çıktı </label>
  <select  name="in_out"  class="form-control">
         <option value="<?php echo $uruncek['in_out'] ?>" hidden selected="<?php echo $uruncek['in_out'] ?>"><?php echo $uruncek['in_out'] ?></option>

      <option value="Giriş">Ürün Giriş</option>
      <option value="Çıkış">Ürün Çıkış</option>
  </select></div>





<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Sipariş Durumu</label>
  <select  name="sip_turu"  class="form-control">
         <option value="<?php echo $uruncek['sip_turu'] ?>" hidden selected="<?php echo $uruncek['sip_turu'] ?>"><?php echo $uruncek['sip_turu'] ?></option>

      <option value="Tamamlandı">Tamamlandı</option>
      <option value="İptal Edildi">İptal Edildi</option>
  </select></div>


        </div> 
        <div class="row">
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input value="<?php echo $uruncek['adi_soyadi']; ?>" name="adi_soyadi" id="adi_soyadi" type="text" class="form-control" DISABLED>
            </div>            
            <div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">E- Posta</label>
              <input value="<?php echo $uruncek['e_posta']; ?>" name="e_posta" id="e_posta" type="text" class="form-control" DISABLED>
            </div>

            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adres</label>
              <input value="<?php echo $uruncek['acik_adres']; ?>" name="acik_adres" id="acik_adres" type="text" class="form-control" DISABLED>
            </div>
        </div> 

        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Vergi No / Tc No</label>
              <input  value="<?php echo $uruncek['tc_no']; ?>" name="tc_no" id="tc_no" type="text" class="form-control" DISABLED>
            </div>
          <div class="position-relative form-group col-md-6">
<div class="row">
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Cep Telefon</label>
   <input value="<?php echo $uruncek['cep_telefon']; ?>" name="cep_telefon" id="cep_telefon" type="text" class="form-control" DISABLED>
</div>
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Sabit Telefon</label>
   <input value="<?php echo $uruncek['sabit_tel']; ?>" name="sabit_tel" id="sabit_telefon" type="text" class="form-control" DISABLED>
</div>
</div>

           </div>
        </div> 



            <!-- Tab ların menü kısmı, burada içeriklerin olduğu div ler ile id lerin aynı olması lazım -->
            

            <!-- Tab panes -->
            <div class="tab-content">
        
                <!-- Ders bilgilerini aldığımız div-->
               <div class='row'>
                   <div class="table-responsive">
                        <table class="table table-hover" id="invoiceTable">
                            <thead >
                                <tr  class="text-white  btn-secondary">
                                    <th >Ürün Adı</th>
                                    <th >Ürün Fiyatı</th>
                                    <th >Ürün Adeti</th>
                                    <th >Kdvsiz Fiyat</th>
                                    <th >Kdv Oranı</th>
                                    <th >Kdv Tutarı</th>
                                    <th >Kdvli Toplam Tutar</th>
                                </tr>
                            </thead>
                            <tbody>



                                 <?php

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $urunsor=$db->prepare("SELECT * FROM siparis S , stok ST
    WHERE S.stok_id = ST.stokk_id AND  siparis_id=$id
");

  $urunsor->execute(array(
    'id' => guvenlik($_POST['id'])
  ));

}                            while ( $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
                          
                            

                             

                               ?>
               <tr class="satir">
<td><input type="text" data-type="stok_adi"  name="stok_adi" id="itemName_1"class="form-control autocomplete_txt"autocomplete="off" value="<?php  echo  $uruncek['stok_adi']; ?>"></td>
<input type="hidden" data-type="id" name="s_id" id="itemid_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php  echo  $uruncek['stokk_id']; ?>">
<input type="hidden" name="adi[]" id="itemid_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php  echo  $_POST['fisno_adi']; ?>">

<input type="hidden" name="s_guncelle"  class="form-control autocomplete_txt" autocomplete="off" value="<?php  echo  $uruncek['siparis_id']; ?>">                

<td><input data-type="satis_fiyati"  name="sip_birim_fiyati"  value="<?php  echo  $uruncek['sip_birim_fiyati']; ?>" id="itemsatis_1" class="fiyat hesaplama form-control" /></td>

<td><input name="sip_urun_adedi"  value="<?php  echo  $uruncek['sip_urun_adedi']; ?>"  class="adet hesaplama form-control" value=""/></td>
<td><input name="sip_kdvsiz_fiyat" value="<?php echo  
number_format(round($uruncek['sip_kdvsiz_fiyat']), 2); ?>" class="kdvsiztoplam form-control" id="kdvsiztoplam" value="" readonly="readonly"/></td>

<td><input name="sip_kdv_orani" value="<?php  echo  $uruncek['sip_kdv_orani']; ?>" class="kdvoran hesaplama form-control" value=""/></td>
<td><input name="sip_kdv_tutari"  value="<?php echo  number_format(round($uruncek['sip_kdv_tutari']), 2); ?>" class="kdvtutar form-control" value="" readonly="readonly"/></td>
<td><input name="sip_genel_toplam"  value="<?php echo number_format(round($uruncek['sip_genel_toplam']), 2); ?>" class="kdvlitutar form-control"  value="" readonly="readonly"/></td>
</tr>
             <?php
                            }
                            ?>
                                <tr>
                                  
 
                                     </td>



                            </tbody>
                        </table>
                   
                </div> </div>

                   
                
                <div class='row'>
             
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'></div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'></div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'></div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 ' style="text-align:right; ">
                    <br /><br /><br /><input  name="siparis-guncelle"  type="submit" value="Güncelle" class="btn btn-success"/>
                 </div>

                </div>

                           
                    </div>

                </div>

            </div>
                                

        </div>
    </div>


</form>


<?php 



 ?>

<?php 
include 'genel/footer.php';

?>



        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/auto.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
        <script type="text/javascript" src="costum.js"></script>



</body>
</html>

