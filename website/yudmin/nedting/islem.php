<?php
ob_start();
session_start();

include 'baglan.php';


if(isset($_POST['loggin']))
{
    $kullaniciadi = $_POST['kullanici_ad'];
    $sifre = md5($_POST['kullanici_password']); 
    
    if($kullaniciadi && $sifre)
    {
           
   $kullanicisor=$db->prepare("select * from kullanici where kullanici_ad=? and kullanici_password=? ");
   $kullanicicek = $kullanicisor->execute(array($kullaniciadi,$sifre));
    $say = $kullanicisor->rowcount();
    
    if($say>0)
    {
        $_SESSION['kullanici_ad'] = $kullaniciadi;

        header('location:../production/index.php');

    }
    
    else
    {
        header('location:../production/login.php?durum=no');
    }

    }


   
}


if(isset($_POST['genelayarkaydet']))

{

    $ayarsite = $_POST['ayar_siteurl'];
    $ayartitle = $_POST['ayar_title'];
    $ayarkey = $_POST['ayar_keywords'];
    $ayardesc = $_POST['ayar_description'];
    $ayarauthor = $_POST['ayar_author'];

    $ayarkaydet = $db->prepare("update ayar set ayar_siteurl=? , ayar_title=? , ayar_keywords=? , ayar_description=? , ayar_author=? where ayar_id = 0 ");
    $update = $ayarkaydet->execute(array($ayarsite,$ayartitle,$ayarkey,$ayardesc,$ayarauthor));

    if($update){
        
        Header("Location:../production/genel-ayar.php?durum=ok");
    }

    else {

        Header("Location:../production/genel-ayar.php?durum=no");
    }

   /* $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_siteurl=:siteurl,ayar_title=:title,ayar_description=:descrip,ayar_keywords=:keywords,ayar_author=:authors
                             WHERE ayar_id = 0 ");

    $update=$ayarkaydet->execute(array('siteurl'=>$_POST['ayar_siteurl'], 'title'=>$_POST['ayar_title'],'descrip'=>$_POST['ayar_description'],'keywords'=>$_POST['ayar_keywords'],'authors'=>$_POST['ayar_author']));
    if($update){
        Header("Location:../production/genel-ayar.php?durum=ok");
               }
    else {
        Header("Location:../production/genel-ayar.php?durum=no");
         }
 */

}

if(isset($_POST['iletisimayarkaydet']))

{
    $ayartel = $_POST['ayar_tel'];
    $ayargsm = $_POST['ayar_gsm'];
    $ayarfax = $_POST['ayar_fax'];
    $ayarmail = $_POST['ayar_mail'];
    $ayaradres = $_POST['ayar_adres'];
    $ayarilce = $_POST['ayar_ilce'];  
    $ayaril = $_POST['ayar_il'];
    $ayarmesai = $_POST['ayar_mesai'];

    $ayarkaydet=$db->prepare ("update ayar set ayar_tel=? , ayar_gsm=? , ayar_fax=? , ayar_mail=? , ayar_adres=? , ayar_ilce=? , ayar_il=? , ayar_mesai=? where ayar_id = 0 ");
    $update = $ayarkaydet->execute(array($ayartel,$ayargsm,$ayarfax,$ayarmail,$ayaradres,$ayarilce,$ayaril,$ayarmesai));

    if($update){
        
        Header("Location:../production/iletisim-ayar.php?durum=ok");
    }

    else {

        Header("Location:../production/iletisim-ayar.php?durum=no");
    }


}

if(isset($_POST['apiayarkaydet']))

{

    $ayarcapthca = $_POST['ayar_recaptha'];
    $ayargmaps = $_POST['ayar_gmaps'];
    $ayaranalystic = $_POST['ayar_analystic'];

    $ayarkaydet = $db->prepare("update ayar set ayar_recaptha=? , ayar_gmaps=?, ayar_analystic=? where ayar_id= 0");
    $update = $ayarkaydet->execute(array($ayarcapthca,$ayargmaps,$ayaranalystic));

    if($update){  Header("Location:../production/api-ayarlari.php?durum=ok");  }

    else {   Header("Location:../production/api-ayarlari.php?durum=no");   }

}

if(isset($_POST['sosyalayarkaydet']))

{
    $ayarface = $_POST['ayar_facebook'];
    $ayartwit = $_POST['ayar_twitter'];
    $ayaryutp = $_POST['ayar_youtube'];
    $ayargogl = $_POST['ayar_google'];

    $ayarkaydet = $db->prepare("update ayar set ayar_facebook=?, ayar_twitter=?, ayar_youtube=? , ayar_google=? where ayar_id=0");
    $update = $ayarkaydet->execute(array($ayarface,$ayartwit,$ayaryutp,$ayargogl));
  
    if($update){  Header("Location:../production/sosyal-ayar.php?durum=ok");  }

    else { Header("Location:../production/sosyal-ayar.php?durum=no");  }
}

if(isset($_POST['mailayarkaydet']))

{
    $ayarhost=$_POST['ayar_smtphost'];
    $ayaradres=$_POST['ayar_smtpuser'];
    $ayarpswrd=$_POST['ayar_smtppassword'];
    $ayarport=$_POST['ayar_smtpport'];
    
    $ayarkaydet = $db->prepare("update ayar set ayar_smtphost=?, ayar_smtpuser=?, ayar_smtppassword=? , ayar_smtpport=? where ayar_id=0");
    $update = $ayarkaydet->execute(array($ayarhost,$ayaradres,$ayarpswrd,$ayarport));

    if($update){ Header("Location:../production/mail-ayarlari.php?durum=ok"); }

    else { Header("Location:../production/mail-ayarlari.php?durum=no"); }
}

if(isset($_POST['hakkimizdakaydet']))

{
    $baslik=$_POST['hakkimizda_baslik'];
    $icerik=$_POST['hakkimizda_icerik'];
    $video=$_POST['hakkimizda_video'];
    $vizyon=$_POST['hakkimizda_vizyon'];
    $misyon=$_POST['hakkimizda_misyon'];

    $ayarkaydet=$db->prepare("update hakkimizda set hakkimizda_baslik=?,hakkimizda_icerik=?,hakkimizda_video=?,hakkimizda_vizyon=?,hakkimizda_misyon=? where hakkimizda_id= 0 ");
    $update =$ayarkaydet->execute(array($baslik,$icerik,$video,$vizyon,$misyon));

    if($update){  Header("Location:../production/hakkimizda.php?durum=ok"); }

    else {  Header("Location:../production/hakkimizda.php?durum=no"); }
}

if(isset($_POST['sliderkaydet']))

{

 $uploads_dir='../../dimg/slider';
 @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
 @$name = $_FILES['slider_resimyol']["name"];
 $ozelsayi=rand(20000,32000);
 $ozelsayi1=rand(20000,32000);
 $ozelsayi2=rand(20000,32000);
 $ozelsayi3=rand(20000,32000);
 $ozelad = $ozelsayi.$ozelsayi1.$ozelsayi2.$ozelsayi3 ;
 $refimgyol = substr($uploads_dir, 6)."/".$ozelad.$name;
 @move_uploaded_file($tmp_name, "$uploads_dir/$ozelad$name");


        $ad=$_POST['slider_ad'];
        $resim=$refimgyol;
        $link=$_POST['slider_link'];
        $sira=$_POST['slider_sira'];
        $durum=$_POST['slider_durum'];

        $ayarkaydet=$db->prepare("insert into slider set slider_ad=?,slider_resimyol=?,slider_link=?,slider_sira=?,slider_durum=? ");
        $insert=$ayarkaydet->execute(array($ad,$resim,$link,$sira,$durum));

   if($insert){  Header("Location:../production/slider.php?durum=ok");  }

    else {  Header("Location:../production/slider.php?durum=no");  }

}

 if($_GET['slidersil']== "ok")

{
    $slider_id = $_GET['slider_id'];
    
     $sil=$db->prepare("delete from slider where slider_id=?");
     $kontrol = $sil->execute(array($slider_id));
     
     if($kontrol) {  Header("Location:../production/slider.php?slidersil=ok"); }
     
     else { Header("Location:../production/slider.php?slidersil=no"); }

}

if(isset($_POST['sliderduzenle']))
{
    $id=$_POST['slider_id'];
    
    if ($_FILES['slider_resimyol']["size"] > 0) 
      {
       
         
        $uploads_dir='../../dimg/slider';
        @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
        @$name = $_FILES['slider_resimyol']["name"];
        $ozelsayi=rand(20000,32000);
        $ozelsayi1=rand(20000,32000);
        $ozelsayi2=rand(20000,32000);
        $ozelsayi3=rand(20000,32000);
        $ozelad = $ozelsayi.$ozelsayi1.$ozelsayi2.$ozelsayi3 ;
        $refimgyol = substr($uploads_dir, 6)."/".$ozelad.$name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$ozelad$name");

        $ad = $_POST['slider_ad'];
        $link = $_POST['slider_link'];
        $sira = $_POST['slider_sira'];
        $durum = $_POST['slider_durum']; 
        $resimyol = $refimgyol;

    $sliderduzenle = $db->prepare("UPDATE slider SET  slider_ad=?,slider_link=?,slider_sira=?,slider_durum=?,slider_resimyol=? where slider_id=$id ");
    $update=$sliderduzenle->execute(array($ad,$link,$sira,$durum,$resimyol));  

   if($update)
   {
       $resimsil=$_POST['slider_resimsil'];
       unlink("../../$resimsil");   // eski resmi silip güncelllenen resmi kaydediyor
       header("location:../production/slider-duzenle.php?slider_id=$id&durum=ok");
   }

  else
  {
    header("location:../production/slider-duzenle.php?durum=no");   
  }

  }

    else
    {
    $ad = $_POST['slider_ad'];
    $link = $_POST['slider_link'];
    $sira = $_POST['slider_sira'];
    $durum = $_POST['slider_durum'];
     
    $sliderduzenle = $db->prepare("UPDATE slider SET slider_ad=?,slider_link=?,slider_sira=?,slider_durum=? where slider_id = $id");
    $update=$sliderduzenle->execute(array($ad,$link,$sira,$durum));
        
     if($update) { header("location:../production/slider-duzenle.php?slider_id=$id&durum=ok");  }
  
     else { header("location:../production/slider-duzenle.php?durum=no");   }
    
      }
}



if(isset($_POST['icerikkaydet']))

    {
    
     $uploads_dir='../../dimg/icerik';
     @$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
     @$name = $_FILES['icerik_resimyol']["name"];
     $ozelsayi=rand(20000,32000);
     $ozelsayi1=rand(20000,32000);
     $ozelsayi2=rand(20000,32000);
     $ozelsayi3=rand(20000,32000);
     $ozelad = $ozelsayi.$ozelsayi1.$ozelsayi2.$ozelsayi3 ;
     $refimgyol = substr($uploads_dir, 6)."/".$ozelad.$name;
     @move_uploaded_file($tmp_name, "$uploads_dir/$ozelad$name");
    
     
     $tarih = $_POST['icerik_tarih'];
     $saat = $_POST['icerik_saat'];
     $zaman = $tarih." ".$saat;
    
            $ad=$_POST['icerik_ad'];
            $resim=$refimgyol;
            $detay=$_POST['icerik_detay'];
            $keyword=$_POST['icerik_keyword'];
            $durum=$_POST['icerik_durum'];
    
            $ayarkaydet=$db->prepare("insert into icerik set icerik_zaman=?,icerik_ad=?,icerik_resimyol=?,icerik_detay=?,icerik_keyword=?,icerik_durum=? ");
            $insert=$ayarkaydet->execute(array($zaman,$ad,$resim,$detay,$keyword,$durum));
    
     if($insert){  Header("Location:../production/icerik.php?durum=ok");  }
    
     else {  Header("Location:../production/icerik.php?durum=no");  }
    
    }
    
if($_GET['iceriksil']== "ok")
    
    {
        $icerik_id = $_GET['icerik_id'];
        
         $sil=$db->prepare("delete from icerik where icerik_id=?");
         $kontrol = $sil->execute(array($icerik_id));
         
         if($kontrol) {  Header("Location:../production/icerik.php?iceriksil=ok"); }
         
         else { Header("Location:../production/icerik.php?iceriksil=no"); }
    
    }

 if(isset($_POST['icerikduzenle']))
    {
        $id=$_POST['icerik_id'];
        
        if ($_FILES['icerik_resimyol']["size"] > 0) 
          {
           
             
            $uploads_dir='../../dimg/icerik';
            @$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
            @$name = $_FILES['icerik_resimyol']["name"];
            $ozelsayi=rand(20000,32000);
            $ozelsayi1=rand(20000,32000);
            $ozelsayi2=rand(20000,32000);
            $ozelsayi3=rand(20000,32000);
            $ozelad = $ozelsayi.$ozelsayi1.$ozelsayi2.$ozelsayi3 ;
            $refimgyol = substr($uploads_dir, 6)."/".$ozelad.$name;
            @move_uploaded_file($tmp_name, "$uploads_dir/$ozelad$name");
    
            $tarih = $_POST['icerik_tarih'];
            $saat = $_POST['icerik_saat'];
            $zaman = $tarih." ".$saat;
           
            $ad=$_POST['icerik_ad'];
            $resim=$refimgyol;
            $detay=$_POST['icerik_detay'];
            $keyword=$_POST['icerik_keyword'];
            $durum=$_POST['icerik_durum'];
    
        $icerikduzenle = $db->prepare("UPDATE icerik SET  icerik_zaman=?,icerik_resimyol=?,icerik_ad=?,icerik_detay=?,icerik_keyword=?,icerik_durum=? where icerik_id=$id ");
        $update=$icerikduzenle->execute(array($zaman,$resim,$ad,$detay,$keyword,$durum));  
    
       if($update)
       {
           $resimsil=$_POST['icerik_resimsil'];
           unlink("../../$resimsil");   // eski resmi silip güncelllenen resmi kaydediyor
           header("location:../production/icerik-duzenle.php?icerik_id=$id&durum=ok");
       }
    
      else
      {
        header("location:../production/icerik-duzenle.php?durum=no");   
      }
    
      }
    
        else
        {
            $tarih = $_POST['icerik_tarih'];
            $saat = $_POST['icerik_saat'];
            $zaman = $tarih." ".$saat;
           
            $ad=$_POST['icerik_ad'];
            $detay=$_POST['icerik_detay'];
            $keyword=$_POST['icerik_keyword'];
            $durum=$_POST['icerik_durum'];
    
        $icerikduzenle = $db->prepare("UPDATE icerik SET  icerik_zaman=?,icerik_ad=?,icerik_detay=?,icerik_keyword=?,icerik_durum=? where icerik_id=$id ");
        $update=$icerikduzenle->execute(array($zaman,$ad,$detay,$keyword,$durum));  

         if($update) { header("location:../production/icerik-duzenle.php?icerik_id=$id&durum=ok");  }
      
         else { header("location:../production/icerik-duzenle.php?durum=no");   }
        
          }
    }
    
 if(isset($_POST['menukaydet']))

        {

                $ust=$_POST['menu_ust'];
                $ad=$_POST['menu_ad'];
                $url=$_POST['menu_url'];
                $detay=$_POST['menu_detay'];
                $sira=$_POST['menu_sira'];
                $durum=$_POST['menu_durum'];
        
                $ayarkaydet=$db->prepare("insert into menu set menu_ust=?,menu_ad=?,menu_url=?,menu_detay=?,menu_sira=?,menu_durum=? ");
                $insert=$ayarkaydet->execute(array($ust,$ad,$url,$detay,$sira,$durum));
        
          if($insert){  Header("Location:../production/menu.php?durum=ok");  }
        
         else {  Header("Location:../production/menu.php?durum=no");  }
        
        }

 if(isset($_POST['menuduzenle']))
        
    {
            $id=$_POST['menu_id'];

              $ust=$_POST['menu_ust'];
              $ad=$_POST['menu_ad'];
              $url=$_POST['menu_url'];
              $detay=$_POST['menu_detay'];
              $sira=$_POST['menu_sira'];
              $durum=$_POST['menu_durum'];
    
        $icerikduzenle = $db->prepare("UPDATE menu SET   menu_ust=?,menu_ad=?,menu_url=?,menu_detay=?,menu_sira=?,menu_durum=?  where menu_id=$id ");
        $update=$icerikduzenle->execute(array($ust,$ad,$url,$detay,$sira,$durum));  

         if($update) { header("location:../production/menu-duzenle.php?icerik_id=$id&durum=ok");  }
      
         else { header("location:../production/menu-duzenle.php?durum=no");   }
        
    }
    
if($_GET['menusil']== "ok")
    
        {
            $menu_id = $_GET['menu_id'];
            
             $sil=$db->prepare("delete from menu where menu_id=?");
             $kontrol = $sil->execute(array($menu_id));
             
             if($kontrol) {  Header("Location:../production/menu.php?iceriksil=ok"); }
             
             else { Header("Location:../production/menu.php?iceriksil=no"); }
        
        }

if(isset($_POST['logoduzenle']))
    {
      
       
         
           
          $uploads_dir='../../img/umg';
          @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
          @$name = $_FILES['ayar_logo']["name"];
        
          $ozelsayi3=rand(20000,32000);
        
          $refimgyol = substr($uploads_dir, 6)."/".$ozelsayi3.$name;
          @move_uploaded_file($tmp_name, "$uploads_dir/$ozelsayi3$name");
  
     
         
      $ayarlogoduzenle = $db->prepare("UPDATE ayar SET  ayar_logo=:logo where ayar_id= 0 ");
      $update=$ayarlogoduzenle->execute(array('logo'=>$refimgyol));  

     
  
        if($update)
        {
            $resimsil=$_POST['eski_yol'];
            unlink("../../$resimsil");   // eski resmi silip güncelllenen resmi kaydediyor
            header("location:../production/genel-ayar.php?durum=ok");
        }
  
         else
         {
           header("location:../production/genel-ayar.php?durum=no");   
         }
  
   
    }

 if(isset($_POST['kresimduzenle']))
    {
      
       
         
           
          $uploads_dir='../../img/avatars';
          @$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
          @$name = $_FILES['kullanici_resim']["name"];
        
          $ozelsayi3=rand(20000,32000);
        
          $refimgyol = substr($uploads_dir, 6)."/".$ozelsayi3.$name;
          @move_uploaded_file($tmp_name, "$uploads_dir/$ozelsayi3$name");
  
     
         
      $kullaniciresimduzenle = $db->prepare("UPDATE kullanici SET  kullanici_resim=:resim where kullanici_id={$_POST['kullanici_id']} ");
      $update=$kullaniciresimduzenle->execute(array('resim'=>$refimgyol));  

     
  
        if($update)
        {
            $resimsil=$_POST['eski_yol'];
            unlink("../../$resimsil");   // eski resmi silip güncelllenen resmi kaydediyor
            header("location:../production/kullanici-profil.php?durum=ok");
        }
  
         else
         {
           header("location:../production/kullanici-profil.php?durum=no");   
         }
    }
  
if(isset($_POST['profilkaydet']))

{
    
    $yeniadsoyad = $_POST['kullanici_adsoyad'];
    $kullanicipassword = md5($_POST['kullanici_sifre']);


    $ayarkaydet = $db->prepare("update kullanici set kullanici_adsoyad=? , kullanici_password=? where kullanici_id ={$_POST['kullanici_id']} ");
    $update = $ayarkaydet->execute(array($yeniadsoyad,$kullanicipassword));

    if($update){
        
        Header("Location:../production/kullanici-profil.php?durum=ok");
        }

    else {

        Header("Location:../production/kullanici-profil.php?durum=no");
        }
}






?>