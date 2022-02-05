<?php 
include 'genel/header.php';
?>

                    <div class="app-main__inner">



<div class="row">
        <div class="col-lg-3 col-xl-3">
<div class="row">


<div class="col-md-12 col-xl-12" style="padding-bottom: 12px;">
<a style="text-decoration:none;" href="musteri-yeni">  <div class="card mb-1 widget-content bg-grow-early"><div class="widget-content-wrapper text-white">
<div class="widget-numbers text-white" style=" font-size: 18px; ">ÜRÜN EKLE </div>
</div></div> </a>
  </div>
<div class="col-md-12 col-xl-12" style="padding-bottom: 12px;">
<a style="text-decoration:none;" href="stok-yeni">  <div class="card mb-1 widget-content bg-warning "><div class="widget-content-wrapper text-white">
<div class="widget-numbers text-white" style=" font-size: 18px; ">BEKLEYEN ÜRÜN</div>
</div></div> </a>
</div>
<div class="col-md-12 col-xl-12" style="padding-bottom: 12px;">
<a style="text-decoration:none;" href="siparis-yeni">  <div class="card mb-1 widget-content bg-focus"><div class="widget-content-wrapper text-white">
<div class="widget-numbers text-white" style=" font-size: 18px; ">BİTEN ÜRÜN</div>
</div></div> </a>
</div>
<div class="col-md-12 col-xl-12" style="padding-bottom: 12px;">
<a style="text-decoration:none;" href="kasa-detay?odeme-al">  <div class="card mb-1 widget-content bg-night-sky"><div class="widget-content-wrapper text-white">
<div class="widget-numbers text-white" style=" font-size: 18px; ">Ödeme Girişi</div>
</div></div> </a>
</div>



        </div> 






        </div>




     

        <div class="col-lg-3 col-xl-3">


                                    <div class="card mb-3 widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-subheading">Toplam</div>
                                                <div class="widget-heading">Müşteri Hesabı</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">
<span><?php $sorgu = $db->prepare("SELECT COUNT(*) FROM musteri"); $sorgu->execute(); 
$say = $sorgu->fetchColumn(); echo $say;?></span></div>
                                            </div>
                                        </div>
                                    </div>


                                                                        <div class="card mb-3 widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-subheading">Toplam</div>
                                                <div class="widget-heading">Sipariş</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary">
<span><?php $sorgu = $db->prepare("SELECT COUNT(*) FROM siparis"); $sorgu->execute(); 
$say = $sorgu->fetchColumn(); echo $say;?></span></div>
                                            </div>
                                        </div>
                                    </div>


                                                                        <div class="card mb-3 widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-subheading">Toplam</div>
                                                <div class="widget-heading">Stokdaki Ürünler</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">
<span><?php $sorgu = $db->prepare("SELECT COUNT(*) FROM stok"); $sorgu->execute(); 
$say = $sorgu->fetchColumn(); echo $say;?></span></div>
                                            </div>
                                        </div>
                                    </div>


        </div>


<div class="col-lg-6">
<div class="row">


<?php
    $si_adet = $db->prepare("SELECT Sum(urun_adedi)FROM stok"); 
    $si_adet->execute();
    $sip_adet = $si_adet->fetchColumn();
    $si_alis = $db->prepare("SELECT Sum(urun_fiyati)FROM stok"); 
    $si_alis->execute();
    $sip_alis = $si_alis->fetchColumn();
    $si_satis = $db->prepare("SELECT Sum(satis_fiyati)FROM stok"); 
    $si_satis->execute();
    $sip_satis = $si_satis->fetchColumn();
    $bugun = date('Y-m-d');
    $t_kasa = $db->prepare("SELECT Sum(odeme_tutari)FROM hesap"); 
    $t_kasa->execute();
    $to_kasa = $t_kasa->fetchColumn();
    $si_cik = $db->prepare("SELECT Sum(odeme_tutari) FROM hesap  
       WHERE zaman ='$bugun' AND in_out ='Çıkış'  "); 
    $si_cik->execute();
    $sip_cikis = $si_cik->fetchColumn();
    $si_gir = $db->prepare("SELECT Sum(odeme_tutari) FROM hesap  
        WHERE zaman ='$bugun' AND in_out ='Giriş' ");     
    $si_gir->execute();
    $sip_giris = $si_gir->fetchColumn();

    $toplam_kasa = $sip_giris - $sip_cikis;

?>





<div class="col-md-12">

                <div class="main-card mb-3 card">
                    <div class="card-body "><h5 class="card-title badge badge-success mr-1 ml-0 text-white">KASA</h5>

                        <div class="row space-5">
                            <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                                                                



                                </div> <!-- /.col-* -->
                            <div class="col-md-12">
                                <div class="">
                                    <small class="text-muted" style="color:#1f1d1d;">KASA</small> <small class="text-muted">toplam</small>
                                   
                                    <span ><b> <?php echo $toplam_kasa; ?> TL </b></small></b>
                                    
                                    
                                </div>
                                <div class="h-20"></div>
                            </div> <!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="">
                                    <small class="text-muted">bu gün giriş</small>
                                    <br>
                                    <span class="ff-2 fs-14 bold"><b> + <?php echo $sip_giris; ?> TL </b></span>
                                </div>
                            </div> <!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="">
                                    <small class="text-muted">bu gün çıkış</small>
                                    <br>
                                    <span class="ff-2 fs-14 bold"><b> - <?php echo $sip_cikis; ?> TL </b></span>
                                </div>
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- /.row -->
                        

                        

                    </div> <!-- /.panel -->
                </div> <!-- /.panel -->

            </div>



<div class="col-lg-12">

<div class="main-card mb-3 card">
<div class="card-body"><h5 class="card-title badge badge-warning  mr-1 ml-0 text-white">STOK</h5>
<div class="row">

 <div class="col-md-12"> <b><?php echo $say; ?></b> çeşit  <b><?php echo $sip_adet; ?></b> adet </div>
</div>
<div class="row">


                             
 <div class="col-md-6">
<small class="text-muted">maliyet değeri</small><br>
<span class="ff-2 fs-14 bold">+ <b><?php echo $sip_alis; ?> TL</b></span> </div>
 <div class="col-md-6 text-muted"><small class="text-muted">satış değeri</small><br>
<span class="ff-2 fs-14 bold">+ <b><?php echo $sip_satis; ?> TL</b></span> </div>
</div></div>
                                               
                                            
                                    </div>
                                </div>

  </div>

 </div> </div>

 <div class="row">
                          
<div class="col-md-6"><div class="main-card mb-3 card"><div class="card-header">Son 5 Stok Ürünü
</div><div class="table-responsive"><table class="align-middle mb-0 table table-borderless table-striped table-hover">
<thead>
<tr>
<th class="text-center">#</th>
<th>Ürün Kodu</th>
<th>Ürün Adı</th>
<th>Alış Fiyatı</th>
</tr></thead><tbody>
<?php    $stoksor=$db->prepare("SELECT * FROM stok Order By stokk_id DESC LIMIT 15");
         $stoksor->execute();
         while ($stokcek=$stoksor->fetch(PDO::FETCH_ASSOC)) {         
          echo '<tr role="row" class="odd">
          <td >'.$stokcek["stokk_id"].'</td>
          <td >'.$stokcek["stok_kod"].'</td>
          <td >'.$stokcek["stok_adi"].'</td>
          <td >'.$stokcek["urun_fiyati"].'</td>';
           }  ?>
</tbody></table></div></div></div>  



<div class="col-md-6"><div class="main-card mb-3 card"><div class="card-header">Son Siparişler
</div><div class="table-responsive"><table class="align-middle mb-0 table table-borderless table-striped table-hover">
<thead>
<tr>
<th >FişNo</th>
<th>Müşteri Adı</th>
<th>KDV Fiyatı</th>
<th>Satış Fiyatı</th>
</tr></thead><tbody>
<?php $urunsor=$db->prepare("SELECT * FROM musteri M , siparis SP 
                              WHERE SP.musteri_id = M.barkod_no LIMIT 5");
         $urunsor->execute();
         while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {         
          echo '<tr role="row" class="odd">
          <td >'.$uruncek["fisno"].'</td>
          <td >'.$uruncek["adi_soyadi"].'</td>
          <td >'.number_format(round($uruncek['sip_kdv_tutari']), 2).'</td>
         <td >' .number_format(round($uruncek['sip_genel_toplam']), 2).'</td></tr>';
          }  ?>
</tbody></table></div></div></div>  



                    


                        </div>










                    </div>


<?php 
include 'genel/footer.php';
?>

