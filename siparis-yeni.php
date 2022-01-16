<?php 
include 'genel/header.php';
if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}
?>

<div class="app-main__inner">


<div class="row">
                            <div class="col-md-12">
                               <div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">Ekle</h5>
      <div class="card-body ">

      <form action="islemler/Kayit/siparis-ekle.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">


<div class="position-relative form-group col-md-3">
  <label for="exampleSelect" class="">Girdi / Çıktı </label>
  <select  name="in_out"  class="form-control" required>
      <option value="Giriş">Giriş</option>
      <option value="Çıkış">Çıkış</option>
  </select></div>


<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Fiş No</label>
              <input name="fisno" type="text" class="form-control" required>
</div>




<div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Tarih</label>
              <input name="sip_zaman" type="date" class="form-control" required>
            </div>

<div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Müşteri Kodu <a href="musteri-yeni"><div  class="mb-2 mr-2 badge badge-success">Müşteri Ekle</div></a></label>
              <input name="musteri_id" id="busca" type="text" class="form-control" required>
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input name="adi_soyadi" id="adi_soyadi" type="text" class="form-control" DISABLED>
            </div>
        </div> 
        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adres</label>
              <input name="adres" id="adres" type="text" class="form-control" DISABLED>
            </div>

            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">E -Posta </label>
              <input name="e_posta" id="e_posta" type="text" class="form-control" DISABLED>
            </div>
        </div> 

        <div class="row">
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Vergi No / Tc No</label>
              <input name="tc_no" id="tc_no" type="text" class="form-control" DISABLED>
            </div>
          <div class="position-relative form-group col-md-6">
<div class="row">
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Cep Telefon</label>
   <input name="cep_telefon" id="cep_telefon" type="text" class="form-control" DISABLED>
</div>
<div class="position-relative form-group col-md-6">
   <label for="exampleEmail" class="">Sabit Telefon</label>
   <input name="sabit_tel" id="sabit_telefon" type="text" class="form-control" DISABLED>
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
                               <tr class="satir">
                                  
<td><input type="text" data-type="stok_adi"  name="stok_adi" id="itemName_1"class="form-control autocomplete_txt"autocomplete="off"></td>
<input type="hidden" data-type="id" name="s_id" id="itemid_1" class="form-control autocomplete_txt" autocomplete="off">                
<td><input data-type="satis_fiyati"  name="sip_birim_fiyati" id="itemsatis_1" class="fiyat hesaplama form-control" /></td>

<td><input name="sip_urun_adedi" type="text"    class="adet hesaplama form-control" value=""/></td>
<td><input name="sip_kdvsiz_fiyat" type="text" class="kdvsiztoplam form-control" id="kdvsiztoplam" value="" readonly="readonly"/></td>

<td><input name="sip_kdv_orani" class="kdvoran hesaplama form-control" value=""/></td>
<td><input name="sip_kdv_tutari" class="kdvtutar form-control" value="" readonly="readonly"/></td>
<td><input name="sip_genel_toplam"  class="kdvlitutar form-control"  value="" readonly="readonly"/></td>
            </tr>
                                <tr>
                                  
 
                                     </td>



                            </tbody>
                        </table>
                   
                </div> </div>

                   
                
                <div class='row'>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'> </div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'></div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'></div>
                    <div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 ' style="text-align:right; ">
                      <input type="hidden" name="sip_turu"  class="form-control" value="Beklemede">
                    <br /><br /><br /><input  id="kaydet" name="siparis-ekle" type="submit" value="Kaydet" class="btn btn-success"/></div>

                </div>

                           
                    </div>

                </div>

            </div>
                                

        </div>
    </div>


</form>


    



        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/auto.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
        <script type="text/javascript" src="costum.js"></script>


<?php 
include 'genel/footer.php';

?>