<?php 
include 'genel/header.php' ;
?>

<div class="app-main__inner">

<div class="row">

<div class="row" style="margin-bottom: 10px;">



<?php $sorgu = $db->prepare("SELECT sum(odeme_tutari) FROM hesap WHERE in_out='Giriş' "); 
$sorgu->execute(); 
$giriskasa = $sorgu->fetchColumn(); ?>
<?php $sorgu = $db->prepare("SELECT sum(odeme_tutari) FROM hesap WHERE in_out='Çıkış' "); 
$sorgu->execute(); 
$cikiskasa = $sorgu->fetchColumn(); 

$toplamkasa = $giriskasa - $cikiskasa;
?>
<div class="col-lg-6 col-xl-4" >
                                    <div class="card mb-3 widget-content bg-info">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Toplam Kasaya Giren</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?php echo $giriskasa;?> <i class="fa fa-fw" aria-hidden="true" title="Copy to use try"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-4"  >
                                    <div class="card mb-3 widget-content bg-danger">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Toplam Kasadan Çıkan</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?php echo $cikiskasa;?>  <i class="fa fa-fw" aria-hidden="true" title="Copy to use try"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-success">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Kasada Kalan Para</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span><?php echo $toplamkasa ;?>  <i class="fa fa-fw" aria-hidden="true" title="Copy to use try"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<div class="col-lg-4 col-xl-4">


  <div class="row" style="margin-bottom: 10px;">

  <div class="col-md-12 col-xl-12">
    <a  style="text-decoration:none;" href="kasa-detay?odeme-al">
      <div class="card mb-1 widget-content bg-grow-early">
        <div class="widget-content-wrapper text-white">
          
          <div class="widget-numbers text-white" style=" font-size: 18px; ">Ödeme Girişi</div>
       
        </div>
      </div>
       </a>
  </div>
                            


</div>




</div>


<div class="col-lg-4 col-xl-4">


  <div class="row" style="margin-bottom: 10px;">

                  
  <div class="col-md-12 col-xl-12">
    <a style="text-decoration:none;" href="kasa-detay?odeme-cikisi">
      <div class="card mb-1 widget-content " style="background-color: #b71c1c;">
        <div class="widget-content-wrapper text-white">
          <div class="widget-numbers text-white" style="font-size: 18px;">Ödeme Çıkışı</div> 
        </div>
      </div>
       </a>
  </div>


</div>




</div>

                        




                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">KASA HAREKETLERİ </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width: 12%;">Tarih</th>
                                                <th style="width: 25%;" >Müşteri Adı</th>
                                                <th style="width: 15%;" >Ödeme Şekli</th>
                                                <th style="width: 10%;">Ödeme Tutarı</th>
                                                <th style="width: 10%">Giriş / Çıkış</th>
                                                <th  style="width: 15%">İşlemler</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
          
          $girissor=$db->prepare("SELECT * FROM hesap ");
         $girissor->execute();
         while ($giriscek=$girissor->fetch(PDO::FETCH_ASSOC)) {

                    # code...
                        
          echo '<tr role="row" class="odd">
          <td >'.$giriscek["hesap_id"].'</td>
          <td >'.$giriscek["zaman"].'</td>
          <td >'.$giriscek["adi_soyadi"].'</td>
          <td >'.$giriscek["odeme_turu"].'</td>
          <td >'.$giriscek["odeme_tutari"].'</td>';
         
  if ($giriscek["in_out"] == "Giriş") {
       echo   '<td style="color:green;"> + '.$giriscek["in_out"].'</td>';
       } elseif ($giriscek["in_out"] == "Çıkış") {
       echo   '<td style="color:red;"> - '.$giriscek["in_out"].'</td>';
       } 


       ?><td> <?php 
              if (yetkikontrol()=="yetkili") {?>

        


               <div class="d-flex ">


              <form action="kasa-profil" method="POST">
                <input type="hidden" name="id" value="<?php echo $giriscek['hesap_id']; ?>">
                <button type="submit" name="kasa-goster" class="btn btn-primary btn-sm btn-icon-split p-1">
                Görüntüle
                </button>
              </form>


               <form class="mx-1" action="kasa-duzenle" method="POST">
                  <input type="hidden" name="id" value="<?php echo $giriscek['hesap_id'];  ?>">
                  <button type="submit" name="kasa-duzenle" class="btn btn-info btn-sm btn-icon-split p-1">
                    Düzenle
                  </button>
                </form>
                
               <form class="mx-1" action="islemler/Sil/Hesap-Sil.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $giriscek['hesap_id']; ?>">
                  <button type="submit" name="hesapsil" class="btn btn-danger btn-sm btn-icon-split p-1">
                   Sil
                  </button>
                </form>
            <?php } ?></td>
                     </tr>

                <?php }  ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                 
                                </div>
                            </div>

















                  </div>

                        
                
                	
                 
                
                    </div> </div>
<?php include 'genel/footer.php' ?>