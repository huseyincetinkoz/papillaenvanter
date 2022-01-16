<?php 
include 'genel/header.php' ;
?>
<div class="app-main__inner">


<div class="row">
                            <div class="col-md-12">
                               <div class="main-card mb-3 card">
<h5 class="card-header text-white  bg-slick-carbon">Sisteme kayıt olan ürünler</h5>
                                   
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th >#</th>
                                                <th>Ürün Adı</th>
                                                <th>Ürün Adedi</th>
                                                <th >Alış Fiyatı</th>
                                                <th >Satış Fiyatı</th>
                                                <th >Kdv</th>
                                                <th >Seçenek</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
          
     
         $musterisor=$db->prepare("SELECT * FROM stok");
         $musterisor->execute();
         while ($mustericek=$musterisor->fetch(PDO::FETCH_ASSOC)) {         
          echo '<tr role="row" class="odd">
          <td >'.$mustericek["stokk_id"].'</td>
          <td >'.$mustericek["stok_adi"].'</td>
          <td >'.$mustericek["urun_adedi"].'</td>
          <td >'.$mustericek["urun_fiyati"].'</td>
          <td >'.$mustericek["satis_fiyati"].'</td>
          <td >'.$mustericek["urun_kdv"].'</td>';
        
      ?>
                      
                      <td > <?php 
              if (yetkikontrol()=="yetkili") {?>

        


               <div class="d-flex ">


              <form action="stok-profil" method="POST">
                <input type="hidden" name="id" value="<?php echo $mustericek['stokk_id'] ?>">
                <button type="submit" name="stok-profil" class="btn btn-primary btn-sm btn-icon-split p-1">
                Görüntüle
                </button>
              </form>


               <form class="mx-1" action="stok-duzenle" method="POST">
                  <input type="hidden" name="id" value="<?php echo $mustericek['stokk_id'] ?>">
                  <input type="hidden" name="s_kod" value="<?php echo $mustericek['stok_kod'] ?>">
                  <button type="submit" name="duzenle" class="btn btn-info btn-sm btn-icon-split p-1">
                    Düzenle
                  </button>
                </form>
                
               <form class="mx-1" action="islemler/Sil/Stok-Sil.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $mustericek['stokk_id'] ?>">
                  <button type="submit" name="stoksilme" class="btn btn-danger btn-sm btn-icon-split p-1">
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

