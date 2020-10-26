<?php

include 'header.php'; 
include '../nedting/baglan.php';



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
                    <h2>Menü İşlemleri 
                    
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
                      
                      
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 <form action="../nedting/islem.php" method="POST"   id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
 
 <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Üst Menü Seçimi</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select class="select2_single form-control"  required="" name="menu_ust" tabindex="-1">
                          <option value="0">Üst Menü</option>

                    <?php 
                     $menusor = $db->prepare("select * from menu where menu_ust =:menu_ust order by menu_sira ASC  ");
                     $menusor ->execute(array('menu_ust' => 0 ));
                    ?>
                    <?php  while( $menucek =$menusor->fetch(PDO::FETCH_ASSOC) )
                     { ?>

                            <option value="<?php echo $menucek['menu_id']; ?>"><?php echo $menucek['menu_ad'];  ?></option>
                     <?php } ?>  
                            
                          </select>
                        </div>
                      </div>
 

  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Menü Ad : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <input type="text" id="first-name" required="required" name="menu_ad" placeholder="menü adını giriniz"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Menü Url : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <input type="text" id="first-name" name="menu_url" placeholder="menü url giriniz.."  class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Menü Detay : <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
    
    <textarea class="ckeditor" id="editor1" name="menu_detay"></textarea>

    </div>
  </div>
 

  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Menü Sıra : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <input type="text" id="first-name" required="required" name="menu_sira" value="0"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"> Menü Durum : <span class="required">*</span>
    </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
                          <select  class="form-control" name="menu_durum" >
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          </select>
   </div>
  </div>
  
        <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
            <button type="submit"  name="menukaydet" class="btn btn-primary">Kaydet</button>
           
          </div>
              </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- /page content -->
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
