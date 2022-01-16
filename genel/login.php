<?php include '../islemler/baglan.php' ;

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>OG Stok Yönetim Sistemi </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="OG Stok Yönetim Sistemi">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="../style.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header" >
       <div class="app-main">

       <div class="app-main__outer" style="margin-left: 12%;">



        <div class="col-lg-6 col-xl-6">
                                                   
                                                    <h3 class="list-group-item-heading" style="text-align: center; margin-bottom: 20px;">Yönetim Paneli</h3>
                                              

                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="">Giriş</h5>
                                       <form class="user" action="../islemler/islem.php" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <input name="kul_mail" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder=" E-Mail ">
                                                </div>
                                               
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Şifre </label>            <input type="password" required name="kul_sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Şifre">
</div>
                                                </div>
                                               
                                            </div>  
                                            <button name="oturumac" type="submit" class="mt-2 btn btn-primary">Oturum Aç</button>
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                       </div></div>
        </div>
    </div>


