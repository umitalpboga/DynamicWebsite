<?php


try {

    $db = new PDO("mysql:host=localhost;dbname=pdofirma",'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "veritabanı bağlantısı başarılı";

}

catch(PDOException $e ){

    echo $e->getMessage();
}


?>