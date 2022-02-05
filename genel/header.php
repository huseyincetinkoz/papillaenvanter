<?php 
ob_start();
session_start(); 
@header('Content-Type: text/html; charset=utf-8');

include 'islemler/baglan.php';
include 'genel/fonksiyonlar.php';

oturumkontrol();

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanici=$db->prepare("SELECT * FROM kullanicilar where session_mail=:mail");
$kullanici->execute(array(
    'mail' => $_SESSION['kul_mail']
));

$say=$kullanici->rowcount();
$kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC);
if ($say==0) {
    header("location:../genel/login?durum=izinsiz");
    exit;
};

if ($kullanicicek['ip_adresi']!=$_SERVER['REMOTE_ADDR']) {
    header("location:../genel/login?durum=suphe");
    session_destroy();
    exit;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/HTML; charset=ISO-8859-9" />
    <title>PAPİLLA -ALCO Ürün Takip </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
        <style type="text/css">
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('./don.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>


<link href="./style.css" rel="stylesheet"></head>
<body>
    <div class="loader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="index.php"><div class="logo-src"></div></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
             <div class="app-header__content">
                <div class="app-header-left">
          
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <h6>
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-database"> </i>
                                AL-CO 2. Hat Ürün Takip Yazılımı
                            </a>
                        </h6>
                        </li>
                       
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                               
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                       <?php echo $kullanicicek['kul_isim']; ?>
                                    </div>
                                    <div class="widget-subheading">
                                       <?php echo $kullanicicek['kul_unvan']; ?>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>


               <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <a href="http://localhost/stok/"><div class="logo-src"></div></a>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">MENÜ</li>
<li class=""><a href="#" aria-expanded="false"><i class="metismenu-icon fa fa-user "></i>Ürün LİST<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                <ul class="mm-collapse" style="height: 7.05px;">
                                 <li><a href="musteri-listele.php"><i class="metismenu-icon"></i>Listele</a> </li>
                            <li><?php 
                            if (yetkikontrol()=="yetkili") {?>
                                <a class="collapse-item" href="musteri-yeni.php"><i class="metismenu-icon"></i>Ekle</a>
                            <?php } ?>
                             </li>
                         </ul></li>
<li class=""><a href="#" aria-expanded="false"><i class="metismenu-icon fa fa-shopping-basket "></i>Bekleyen Ürün<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                <ul class="mm-collapse" style="height: 7.05px;">
                                 <li><a href="stok-listele.php"><i class="metismenu-icon"></i>Listele</a> </li>
                            <li><?php 
                            if (yetkikontrol()=="yetkili") {?>
                                <a class="collapse-item" href="stok-yeni.php"><i class="metismenu-icon"></i>Ekle</a>
                            <?php } ?>
                             </li>
                         </ul></li>
<li class=""><a href="" aria-expanded="false"><i class="metismenu-icon fa fa-shopping-cart "></i>Biten Ürün<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                <ul class="mm-collapse" style="height: 7.05px;">
                                 <li><a href="siparis-listele.php"><i class="metismenu-icon"></i>Listele</a> </li>
                            <li><?php 
                            if (yetkikontrol()=="yetkili") {?>
                                <a class="collapse-item" href="siparis-yeni.php"><i class="metismenu-icon"></i>Ekle</a>
                            <?php } ?>
                             </li>
                         </ul></li>



<li class=""><a href="#" aria-expanded="false"><i class="metismenu-icon fa fa-window-maximize "></i>Kasa<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
<ul class="mm-collapse" style="height: 7.05px;">
<li><a href="kasa.php"><i class="metismenu-icon"></i>Kasa  Listele</a> </li>
<li><?php if (yetkikontrol()=="yetkili") {?>
<a class="collapse-item" href="kasa-detay?odeme-al.php"><i class="metismenu-icon"></i>Ödeme Girişi</a>
<?php } ?></li>
<li><?php if (yetkikontrol()=="yetkili") {?>
<a class="collapse-item" href="kasa-detay?odeme-cikisi.php"><i class="metismenu-icon"></i>Ödeme Çıkışı</a>
<?php } ?></li>
</ul></li>





<li class=""><a href="genel/cikis.php" aria-expanded="false"><i class="metismenu-icon fa fa-lock "></i>Güvenli Çıkış Yap</a></li>

                          </ul>
                        </div>
                    </div>
                </div>    

              <div class="app-main__outer">