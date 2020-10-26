<?php include 'header.php'; 
 include '../nedting/baglan.php';


if(isset($_POST["arama"])){

  $aranan=$_POST["aranan"];

  $slidersor = $db->prepare("select * from slider  where slider_ad LIKE '%$aranan%' order by 
                          slider_durum DESC , slider_sira ASC limit 25 ");
  $slidersor ->execute();

  $say = $slidersor->rowCount();
}
else{

  $slidersor = $db->prepare("select * from slider   order by slider_durum DESC , slider_sira ASC limit 25 ");
  $slidersor ->execute();
  $say = $slidersor->rowCount();
}

?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
             
            

            </div>
            <div class="col-md-12">
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        
                  <form action="" method="post">
                  <div class="input-group">
                    <input type="text" class="form-control" name="aranan" placeholder="anahtar kelime giriniz...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="arama">ara!</button>
                    </span>
                  </div>
                </form>
                </div>
              </div>
             </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider İşlemleri

                    <small>

                   <?php 

                   if (@$_GET["durum"]=="ok") 
                   {?>

                     <b style="color:green;"> Güncelleme Başarılı </b> 
                     
                    
                   <?php } elseif  (@$_GET["durum"]=="no") { ?>

                    <b style="color:red;"> Güncelleme Başarısız!! </b> 

                   <?php }   ?>           
                   
                   
                </small>
                </h2>
                    <a style="float:right;" class="btn btn-danger" href="slider-ekle.php"><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle </a>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title">Slider Resim </th>
                            <th class="column-title">Slider Ad </th>
                            <th class="column-title">Slider Sıra </th>
                            <th class="column-title">Slider Durum </th>
                            <th  width="80" class="column-title"></th>
                            <th width="80" class="column-title"></th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>

              <?php               
             
              while( $slidercek =$slidersor->fetch(PDO::FETCH_ASSOC) )
              { ?>


              <tr class="even pointer">
                
                <td class=""><img width="200" height="70" src="../../<?php echo $slidercek['slider_resimyol']; ?>"></td>
                <td class=""> <?php echo $slidercek['slider_ad']; ?></td>
                <td class=""><?php echo $slidercek['slider_sira']; ?></td>
                <td class=""><?php 
                
               if(  $slidercek['slider_durum']=="1" )  
                    { echo "Aktif"; }
                else {echo "Pasif";}
                ?></td>
                <td class=""><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button style="width:80px; height:30px;"  class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle </button></a></td>
               <td class=""> <a href="../nedting/islem.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id']; ?>" ><button style="width:80px; height:30px;" class="btn btn-danger btn-xs" ><i class="fa fa-warning" aria-hidden="true"></i> Sil </button></a></td>
          
              </tr>
            <?php }    ?>
            </tbody>
          </table>
          <?php echo $say."  kayıt listelendi." ?>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       <?php include'footer.php'; ?>