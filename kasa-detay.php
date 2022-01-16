<?php 
include 'genel/header.php' ; ?>

<?php
# ÖDEME AL 
if (isset($_GET['odeme-al'])) { 

  ?>
  
<div class="app-main__inner">



<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white bg-slick-carbon">Ödeme Al</h5>
      <div class="card-body">

      <form action="islemler/Kayit/hesap.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">


<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Tarih</label>
              <input name="zaman" type="date" class="form-control">
            </div>

<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu <a href="musteri-yeni"><div  class="mb-2 mr-2 badge badge-success">Müşteri Ekle</div></a></label>
                            <input name="barkod_no" id="busca" type="text" class="form-control">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input name="adi_soyadi" id="adi_soyadi" type="text" class="form-control" >
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
        <div class="row">
            <div class="position-relative form-group col-md-12">
              <label for="exampleEmail" class="">Not</label>
              <input name="detay" id="exampleEmail" type="text" class="form-control">
            </div>
 
        </div> 
        <div class="row">





               
           


<div class="position-relative form-group col-md-6">
  <label for="exampleSelect" class="">Ödeme Türü </label>
  <select name="odeme_turu" id="exampleSelect" class="form-control">
      <option value="Nakit">Nakit</option>
      <option value="Banka Çeki">Baka Çeki</option>
      <option value="Kredi Kartı">Kredi Kartı</option>
                                                     
  </select></div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Ödeme Tutarı</label>
              <input name="odeme_tutari" id="exampleEmail" type="text" class="form-control">
            </div>        </div>




            <button type="submit" name="odeme-al" class="btn btn-primary">Ekle</button>
        </form>
      </div>
    </div>
  </div>


</div>

<?php
# ÖDEME AL 
 } 
 ?>


<?php
# ÖDEME AL 
if (isset($_GET['odeme-cikisi'])) { 

  ?>
  
<div class="app-main__inner">
 


<div class="col-md-12">
<div class="main-card mb-3 card">
<h5 class="card-header text-white bg-slick-carbon">ÖDEME ÇIKIŞI</h5>      

      <div class="card-body">

      <form action="islemler/Kayit/hesap.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
        <div class="row">


<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Tarih</label>
              <input name="zaman" type="date" class="form-control">
            </div>

<div class="position-relative form-group col-md-3">
              <label for="exampleEmail" class="">Müşteri Kodu <a href="musteri-yeni"><div  class="mb-2 mr-2 badge badge-success">Müşteri Ekle</div></a></label>              <input name="barkod_no" id="busca" type="text" class="form-control">
            </div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Adı Soyadı</label>
              <input name="adi_soyadi" id="adi_soyadi" type="text" class="form-control" >
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
        <div class="row">
            


<div class="position-relative form-group col-md-6">
  <label for="exampleSelect" class="">Ödeme Türü </label>
  <select name="odeme_turu" id="exampleSelect" class="form-control">
      <option value="Nakit">Nakit</option>
      <option value="Banka Çeki">Baka Çeki</option>
      <option value="Kredi Kartı">Kredi Kartı</option>
                                                     
  </select></div>
            <div class="position-relative form-group col-md-6">
              <label for="exampleEmail" class="">Ödeme Tutarı</label>
              <input name="odeme_tutari" id="exampleEmail" type="text" class="form-control">
            </div>        </div>    <button type="submit" name="odeme-cikisi" class="btn btn-primary">Ekle</button>
        </form>
      </div>
    </div>
  </div>


</div>

<?php
# ÖDEME AL 
 } 
 ?>







 <?php include 'genel/footer.php' ?>



<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">

     
<script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="costum.js"></script>
</body>
</html>