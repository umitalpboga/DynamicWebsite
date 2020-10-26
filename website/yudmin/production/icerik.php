<?php include 'header.php'; 
 include '../nedting/baglan.php';


if(isset($_POST["arama"])){

  $aranan=$_POST["aranan"];

  $iceriksor = $db->prepare("select * from icerik  where icerik_ad LIKE '%$aranan%' order by 
                          icerik_id DESC limit 25 ");
  $iceriksor ->execute();

  $say = $iceriksor->rowCount();
}
else{

  $iceriksor = $db->prepare("select * from icerik order by icerik_id DESC limit 25 ");
  $iceriksor ->execute();
  $say = $iceriksor->rowCount();
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
                    <h2>İçerik İşlemleri

                    <small>

                   <?php 

                   if (@$_GET["durum"]=="ok") 
                   {?>

                     <b style="color:green;"> Ekleme Başarılı </b> 
                     
                    
                   <?php } elseif  (@$_GET["durum"]=="no") { ?>

                    <b style="color:red;"> Ekleme Başarısız!! </b> 

                   <?php }   ?>           
                   
                   
                </small>
                </h2>
                    <a style="float:right;" class="btn btn-danger" href="icerik-ekle.php"><i class="fa fa-plus" aria-hidden="true"></i> Yeni Ekle </a>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title text-center">İçerik Tarih </th>
                            <th class="column-title">İçerik Ad </th>
                            <th class="column-title">İçerik Durum </th>
                            
                            <th  width="80" class="column-title"></th>
                            <th width="80" class="column-title"></th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>

              <?php               
             
              while( $icerikcek =$iceriksor->fetch(PDO::FETCH_ASSOC) )
              { ?>


              <tr class="even pointer">
              <td class="text-center"> <?php echo $icerikcek['icerik_zaman']; ?></td>
                <td class=""> <?php echo $icerikcek['icerik_ad']; ?></td>
                
                <td class=""><?php 
                
               if(  $icerikcek['icerik_durum']=="1" )  
                    { echo "Aktif"; }
                else {echo "Pasif";}
                ?></td>
                <td class=""><a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id']; ?>"><button style="width:80px; height:30px;"  class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle </button></a></td>
               <td class=""> <a href="../nedting/islem.php?iceriksil=ok&icerik_id=<?php echo $icerikcek['icerik_id']; ?>" ><button style="width:80px; height:30px;" class="btn btn-danger btn-xs" ><i class="fa fa-warning" aria-hidden="true"></i> Sil </button></a></td>
          
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
