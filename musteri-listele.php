<?php 
include 'genel/header.php' ;
?>
<div class="app-main__inner">


<div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                   <h5 class="card-header text-white  bg-malibu-beach "  >Sisteme Kayıt Olan Müşteriler</h5>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th >Kayıt Tarihi</th>
                                                <th >Müşteri Kodu</th>
                                                <th>Adı Soyadı</th>
                                                <th >Cep Telefonu</th>
                                                <th >Müşteri Tipi</th>
                                                <th >Detay</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
          
     
         $musterisor=$db->prepare("SELECT * FROM musteri");
         $musterisor->execute();
         while ($mustericek=$musterisor->fetch(PDO::FETCH_ASSOC)) {         
          echo '<tr role="row" class="odd">
          <td >'.$mustericek["kayit_tarih"].'</td>
          <td >'.$mustericek["barkod_no"].'</td>
          <td >'.$mustericek["adi_soyadi"].'</td>
          <td >'.$mustericek["cep_telefon"].'</td>
          <td >'.$mustericek["musteri_tipi"].'</td>
';
        
      ?>
                      
                      <td> <?php 
              if (yetkikontrol()=="yetkili") {?>

        


               <div class="d-flex ">


              <form action="musteri-profil" method="POST">
                <input type="hidden" name="id" value="<?php echo $mustericek['id'] ?>">
                <button type="submit" name="musteri-goster" class="btn btn-primary btn-sm btn-icon-split p-1">
                Görüntüle
                </button>
              </form>


               <form class="mx-1" action="musteri-duzenle" method="POST">
                  <input type="hidden" name="id" value="<?php echo $mustericek['id'] ?>">
                  <input type="hidden" name="b_id" value="<?php echo $mustericek['barkod_no'] ?>">
                  <button type="submit" name="duzenle" class="btn btn-info btn-sm btn-icon-split p-1">
                    Düzenle
                  </button>
                </form>
                
               <form class="mx-1" action="islemler/Sil/Musteri-Sil.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $mustericek['id'] ?>">
                  <input type="hidden" name="sil" value="<?php echo $mustericek['barkod_no'] ?>">
                  <button type="submit" name="musterisilme" class="btn btn-danger btn-sm btn-icon-split p-1">
                   Sil
                  </button>
                </form>
            <?php } ?></td>
                    </tr>

                <?php } ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                 
                                </div>
                            </div>

                  </div>

                        
                
                	
                 
                
                    </div>
<?php include 'genel/footer.php' ?>

