<?php
try {

    $db = new PDO("mysql:host=localhost;dbname=tamamla", "root", "");
      $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'"); 
    
     } catch ( PDOException $e ){
    
      print $e->getMessage();
    
    }
//Post isteği var ise
if (isset($_POST['arama']) ) {

$liste = "";
//metin kutusundan alınan veri
$arama = $_POST["arama"];
/* ------- Metni arayacak bir sql sorgusu. Kendinize göre düzenleyin */
$sorgu = $db->prepare("SELECT * FROM kategoriler where katadi like '%$arama%' limit 5");
$sorgu->execute(); 
$sonuc = $sorgu->fetchAll(PDO::FETCH_ASSOC); 

$liste = '<ul class="list-unstyled">';        

if ($sonuc) {
     foreach( $sonuc as $row ){ 
        $liste .= '<li>'.$row['katadi'].'</li>';
    }
}/* Veritabanında yoksa bu kodu aktif edebilirsin.
 else{
      $liste .= '<li> Bulunamadı.</li>';
}
*/

$liste .= '</ul>';
echo $liste;
} 


