

                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                   
                                </div>
                                <div class="app-footer-right">
                                    <ul class="nav">
                                      
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                <div class="badge badge-success mr-1 ml-0">
                                                    <small>></small>
                                                </div>
                                               Kodlama : Ömer Güzelyurt
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>    



<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/sweetalert2.all.min.js"></script>

<?php if (@$_GET['durum']=="no")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Lütfen Tekrar Deneyin',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="ok")  {?>  
  <script>
    Swal.fire({
      type: 'success',
      title: 'İşlem Başarılı',
      text: 'İşleminiz Başarıyla Gerçekleştirildi',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="hata")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Yapmamanız Gereken Şeyler Yapıyorsunuz!',
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  <?php } ?>

  <?php if (@$_GET['durum']=="ekleme")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Öğrenciye  aynı faaliyeti birden fazla giriyorsunuz!',
      showConfirmButton: false,
      timer: 3000
    })
  </script>


  <?php } ?>

</body>
</html>

