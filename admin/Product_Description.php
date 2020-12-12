<?php 
include_once('config.php');

class Product_Description{
   function insert_Productdes($productid, $monthprice, $annualmonth, $sku, $Bandwidth, $freedomain, $language_tech, $mailbox,$webspace)
   {
       $discription=array('Bandwidth'=>$Bandwidth,'freedomain'=>$freedomain,'language_tech'=>$language_tech,'mailbox'=>$mailbox,'mailbox'=>$mailbox,'webspace'=>$webspace);
       $discription=json_encode($discription);
        $querry=("INSERT INTO `tbl_product_description` ( `prod_id`, `mon_price`, `annual_price`,`sku`,`description`)
        VALUES ('$productid','$monthprice','$annualmonth','$sku','$discription');");
        $db = new dbConnect();
        $db->insert($querry);
    }
}
?>