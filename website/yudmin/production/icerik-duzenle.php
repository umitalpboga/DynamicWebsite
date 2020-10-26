<?php

include 'header.php'; 
include '../nedting/baglan.php';


$iceriksor=$db->prepare("select * from icerik where icerik_id=:icerik_id");
$iceriksor->execute(array('icerik_id' => @$_GET['icerik_id']));
$icerikcek =$iceriksor->fetch(PDO::FETCH_ASSOC);

?>
<head>
<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Genel Ayarlar </h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>İçerik İşlemleri 
                    
                <small>

                   <?php 

                   if (@$_GET["durum"]=="ok") 
                   {?>

                     <b style="color:green;"> Ekleme Başarılı </b> 
                    
                   <?php } elseif  (@$_GET["durum"]=="no") { ?>

                    <b style="color:red;"> Ekleme Başarısız </b> 

                   <?php }   ?>           
                   
                   
                </small>
                  </h2>

                    <ul class="nav navbar-right panel_toolbox">

                    <a style="float:right;" class="btn btn-warning" href="icerik.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Geri Dön </a>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <form action="../nedting/islem.php" method="POST"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
 
                    <input type="hidden"  name="icerik_id" value="<?php echo $icerikcek['icerik_id']; ?>"></input>
                    <input type="hidden"  name="icerik_resimsil" value="<?php echo $icerikcek['icerik_resimyol']; ?>"></input>
 
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Yüklü Resim : <span class="required"></span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">

    <img width="200" height="100" src="../../<?php echo $icerikcek['icerik_resimyol']; ?>" >

        </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Resim Seç : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="file" id="first-name"  name="icerik_resimyol"   class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> İçerik Tarih : <span class="required">*</span>
    </label>
   
         <div class="col-md-2">      
          <input type="date" id="first-name"  required="required" name="icerik_tarih" value="<?php 

                  $zaman=$icerikcek['icerik_zaman'];
                  $dizi=explode(" ", $zaman);
                  echo($dizi[0]); //Tarihi verir

                  ?>" class="form-control col-md-7 col-xs-12">
         </div>
         <div class="col-md-2" >  
         <input type="time" id="first-name" required="required" name="icerik_saat" value="<?php       
                  $zaman=$icerikcek['icerik_zaman'];
                  $dizi=explode(" ", $zaman);
                  echo($dizi[1]); //Saati verir ?>" class="form-control col-md-7 col-xs-12"> 
         </div>               
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> İçerik Ad : <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="first-name" required="required" name="icerik_ad" value="<?php echo $icerikcek['icerik_ad']; ?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">İçerik : <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
    
    <textarea class="ckeditor" id="editor1"  name="icerik_detay"><?php echo $icerikcek['icerik_detay']; ?></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> İçerik Keyword : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <input type="text" id="first-name" required="required" name="icerik_keyword"  value="<?php echo $icerikcek['icerik_keyword']; ?>" placeholder="anahtar kelime giriniz" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> İçerik Durum : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
    <select id="heard" class="form-control" name="icerik_durum" >
                          
                          <?php 
                          if($icerikcek['icerik_durum']== 1 ) { ?>
                                
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>

                          <?php }  else { ?>

                           <option value="0">Pasif</option>     
                           <option value="1">Aktif</option>

                          <?php }    ?>
                          
                          </select>
   </div>
  </div>
  
        <div align="right" class="col-md-4 col-sm-4 col-xs-12 col-md-offset-3">
            <button type="submit"  name="icerikduzenle" class="btn btn-primary">Kaydet</button>
           
          </div>
              </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /page content -->
  <script type="text/javascript">
    CKEDITOR.replace('editor1',
    {
        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        forcePasteAsPlainText:true
    });
</script>
<?php include'footer.php'; ?>
