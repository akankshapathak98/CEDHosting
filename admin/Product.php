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
        $querry=("INSERT INTO `tbl_product` ( `prod_name`, `link`, `prod_available`,`prod_parent_id`,`prod_launch_date`)
        VALUES ('$categoryname','$link','1','1',NOW());");
        $db = new dbConnect();
        $db->insert($querry);
        return true;
    }
    function show_category(){
        $res= ("select * from `tbl_product` where   prod_parent_id=1");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function show_products(){
        $res= ("SELECT `tbl_product`.*,`tbl_product_description`.* FROM tbl_product JOIN tbl_product_description ON `tbl_product`.`id` = `tbl_product_description`.`prod_id`");
        $db = new dbConnect();
        $data=$db->select($res);
        return $data;
    }
    function delete_Sub_Category($id)
    {
        $querry=("DELETE FROM `tbl_product` WHERE `id`='$id'");
        $this->db = new dbConnect();
        $data=$this->db->delete($querry);
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
        return $data=$this->db->select($querry);  
    }
    function update_Category($categoryname, $link, $isavail, $id)
    {
        $querry=("UPDATE `tbl_product` SET `prod_name`='$categoryname',`link`='$link',`prod_available`='$isavail' WHERE `id`='$id' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    }
    function insert_Product($categeoryid, $productname, $pageurl){
        $querry=("INSERT INTO `tbl_product` ( `prod_name`, `link`, `prod_available`,`prod_parent_id`,`prod_launch_date`)
        VALUES ('$productname','$pageurl','1','$categeoryid',NOW());");
        $db = new dbConnect();
        $last_id=$db->get_last_id($querry);
        return $last_id;
    }
    

}