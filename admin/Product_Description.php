<?php 
include_once('config.php');

class Product_Description{
   function insert_Productdes($productid, $monthprice, $annualmonth, $sku, $Bandwidth, $freedomain, $language_tech, $mailbox,$webspace)
   {
       $discription=array('Bandwidth'=>$Bandwidth,'freedomain'=>$freedomain,'language_tech'=>$language_tech,'mailbox'=>$mailbox,'webspace'=>$webspace);
       $discription=json_encode($discription);
        $querry=("INSERT INTO `tbl_product_description` ( `prod_id`, `mon_price`, `annual_price`,`sku`,`description`)
        VALUES ('$productid','$monthprice','$annualmonth','$sku','$discription');");
        $db = new dbConnect();
        $db->insert($querry);
    } 
    function update_product_description($monthprice, $annualmonth, $sku, $Bandwidth, $freedomain, $language_tech, $mailbox, $webspace, $id){
        $discription=array('Bandwidth'=>$Bandwidth,'freedomain'=>$freedomain,'language_tech'=>$language_tech,'mailbox'=>$mailbox,'webspace'=>$webspace);
        $discription=json_encode($discription);
        $querry=("UPDATE `tbl_product_description` SET `prod_id`='$id',`description`='$discription',`mon_price`='$monthprice',`annual_price`='$annualmonth',`sku`='$sku' WHERE `prod_id`='$id' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    }
    function delete_product($id){
        $querry=("DELETE FROM `tbl_product_description` WHERE `prod_id`='$id'");
        $this->db = new dbConnect();
        $data=$this->db->delete($querry);
       
    }
    // function getprodid($id){
    //     $querry=("DELETE FROM `tbl_product_description` WHERE `prod_id`='$id'");
    //     $this->db = new dbConnect();
    //     $data=$this->db->delete($querry);
    // }
}
?>