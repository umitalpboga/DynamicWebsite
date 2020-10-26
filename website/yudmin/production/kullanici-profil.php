<?php

include 'header.php'; 
include '../nedting/baglan.php';





?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Ayarlar </h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <?php echo $kullanicicek['kullanici_adsoyad'];  ?>
                        kayıdının profil ayarlarını yapıyorsunuz...
                <small>

                   <?php 

                   if (@$_GET["durum"]=="ok") 
                   {?>

                     <b style="color:green;"> Güncelleme Başarılı </b> 
                    
                   <?php } elseif  (@$_GET["durum"]=="no") { ?>

                    <b style="color:red;"> Güncelleme Başarısız </b> 

                   <?php }   ?>           
                   
                   
                </small>
                  </h2>


                    <ul class="nav navbar-right panel_toolbox">
                      
                      
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

      <form action="../nedting/islem.php" method="POST"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
 
       
       <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Resmi :<span class="required"></span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       <?php 
        if(strlen($kullanicicek['kullanici_resim'])>0) 
        { ?>
          <img width="150"  src="../../<?php echo $kullanicicek['kullanici_resim']; ?>" >
       <?php } 
       
       else { ?>
        <img width="150"  src="../../img/avatars/kullanici-resim-yok.jpg" >
       <?php }?> 
        </div>
     </div>
     <input type="hidden"  name="eski_yol" value="<?php echo $kullanicicek['kullanici_resim']; ?>"></input>
     <input type="hidden"  name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>"></input>
     <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Resim Seç : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="file" id="first-name"  name="kullanici_resim"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit"  name="kresimduzenle" class="btn btn-primary"> Güncelle</button>
           
          </div>
      </form>
<hr>
 <form action="../nedting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
 
 <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Ad : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input disabled="" type="text" id="first-name" required="required" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'];?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Ad-Soyad : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name"  required="required" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'];?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kullanıcı Şifre : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="first-name"  required="required" name="kullanici_sifre" value="<?php echo $kullanicicek['kullanici_password'];?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <input type="hidden"  name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>"></input>

  
 
        
        </div>
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit"  name="profilkaydet" class="btn btn-primary">Güncelle</button>
           
          </div>
              </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /page content -->
<?php include'footer.php'; ?>
