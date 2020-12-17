<?php 
include_once('config.php');

class Product{
    function getParent(){
        $res= ("select * from `tbl_product` where id='1' ");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function insert_category($categoryname,$link)
    {
        $querry=("INSERT INTO `tbl_product` ( `prod_name`, `html`, `prod_available`,`prod_parent_id`,`prod_launch_date`)
        VALUES ('$categoryname','$link','1','1',NOW());");
        $db = new dbConnect();
        $db->insert($querry);
        return true;
    }
    function dublicatecategory($categoryname){
        $res= ("select * from `tbl_product` where   `prod_name` Like '$categoryname' && `prod_parent_id`=1");
        $db = new dbConnect();
        $data=$db->select($res);
        $rowcount=mysqli_num_rows($data);
        if($rowcount>0){
            return false;
        }
        else{
            return true;
        }
       
    }
    function show_category(){
        $res= ("select * from `tbl_product` where   prod_parent_id=1 && `prod_available`=1");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function getcategoryname($id){

        $res= ("select * from `tbl_product` where `id`='$id'");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function getProduct($id){
        $res= ("SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` where `prod_parent_id`='$id'");
        $db = new dbConnect();
        $data=$db->select($res);
        $rowcount=mysqli_num_rows($data);
        if($rowcount>0){
        while ($row = mysqli_fetch_array($data)) {
            $description=json_decode($row['description']);
            $Bandwidth=$description->{'Bandwidth'};
            $freedomain=$description->{'freedomain'};
            $language_tech=$description->{'language_tech'};
            $mailbox=$description->{'mailbox'};
            $webspace=$description->{'webspace'};
            $return_data[]=array(
                'product_name'=>$row['prod_name'],
                'html'=>$row['html'],
                'date'=>$row['prod_launch_date'],
                'Bandwidth'=>$Bandwidth,
                'freedomain'=>$freedomain,
                'language_tech'=>$language_tech,
                'mailbox'=>$mailbox,
                'webspace'=>$webspace,
                'mon_price'=>$row['mon_price'],
                'annual_price'=>$row['annual_price'],
                'sku'=>$row['sku']);
     
        }   
        return $return_data;
    } else {
        return false;
    }
}
    function show_products(){
        $res= ("SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id`");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function delete_Sub_Category($id)
    {
        $res= ("select id from `tbl_product` where   prod_parent_id=$id");
        $db = new dbConnect();
        $data=$db->select($res);
        
        while ($row = $data->fetch_assoc()) {
            $prod_id=$row['id'];
        }

        $querry=("DELETE FROM `tbl_product_description` WHERE `prod_id`='$prod_id'");
        $this->db = new dbConnect();
        $this->db->delete($querry);
        $querry=("DELETE FROM `tbl_product` WHERE `id`='$prod_id'");
        $this->db = new dbConnect();
        $this->db->delete($querry);
        $querry=("DELETE FROM `tbl_product` WHERE `id`='$id'");
        $this->db = new dbConnect();
        $this->db->delete($querry);
        return true;
    }
    function edit_category($id)
    {
        $querry=("select * from tbl_product where `id`='$id'");
        $this->db = new dbConnect();
        return $data=$this->db->select($querry);  
    } 
    function edit_product($id)
    {
        $querry=("SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id` where `prod_id`='$id'");
        $this->db = new dbConnect();
        $data=$this->db->select($querry);  
        return $data;
    }
    function getparentname($id){
        $querry=("select `prod_name` from tbl_product where `id`='$id'");
        $this->db = new dbConnect();
        $data=$this->db->select($querry);
        while ($row = $data->fetch_assoc()) {
            return $row['prod_name'];
        }
       
    }
    function update_Category($categoryname, $link, $isavail, $id)
    {
        $querry=("UPDATE `tbl_product` SET `prod_name`='$categoryname',`html`='$link',`prod_available`='$isavail' WHERE `id`='$id' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    } 
    function update_Product($categeoryid, $productname, $pageurl,$id)
    {
        $querry=("UPDATE `tbl_product` SET `prod_parent_id`='$categeoryid',`prod_name`='$productname',`html`='$pageurl' WHERE `id`='$id' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    }
    function insert_Product($categeoryid, $productname, $pageurl){
        $querry=("INSERT INTO `tbl_product` ( `prod_name`, `html`, `prod_available`,`prod_parent_id`,`prod_launch_date`)
        VALUES ('$productname','$pageurl','1','$categeoryid',NOW());");
        $db = new dbConnect();
        $last_id=$db->get_last_id($querry);
        return $last_id;
    }
    function delete_product($id){
        $querry=("DELETE FROM `tbl_product` WHERE `id`='$id'");
        $this->db = new dbConnect();
        $data=$this->db->delete($querry);
    }
    

}