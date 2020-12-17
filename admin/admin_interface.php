<?php
include_once('Product.php');
include_once('Product_Description.php');
$product_description=new Product_Description();
$product=new Product();
if (isset($_POST['action'])) {
    if ($_POST['action']=='insertCategory') {
        $categoryname=$_POST['categoryname'];
        $link=$_POST['link'];
        $valid=$product->dublicatecategory($categoryname);
        if ($valid){
            $data=$product->insert_category($categoryname, $link);
            
        }
        else{
            echo 'error';
        }
       
    }
    if ($_POST['action']=='delete') {
        $id=$_POST['id'];
        $data=$product->delete_Sub_Category($id);
        return true;
        
    }
    if ($_POST['action']=='edit') {
        $id=$_POST['id'];
        $data=$product->edit_category($id);
        $return_data=array();
        while ($row = $data->fetch_assoc()) {
            $return_data[]=$row;
        }
        print_r(json_encode($return_data)); 

    }
    if ($_POST['action']=='updateCategory') {
        $categoryname=$_POST['categoryname'];
        $link=$_POST['link'];
        $isavail=$_POST['isavail'];
        $id=$_POST['id'];
        $data=$product->update_Category($categoryname, $link, $isavail, $id);
    }
    if ($_POST['action']=='createproduct') {
        $categeoryid=$_POST['categeoryid'];
        $productname=$_POST['productname'];
        $pageurl=$_POST['pageurl'];
        $monthprice=$_POST['monthprice'];
        $annualmonth=$_POST['annualmonth'];
        $sku=$_POST['sku'];
        $Bandwidth=$_POST['Bandwidth'];
        $freedomain=$_POST['freedomain'];
        $language_tech=$_POST['language_tech'];
        $mailbox=$_POST['mailbox'];
        $webspace=$_POST['webspace'];
        $productid=$product->insert_Product($categeoryid, $productname, $pageurl);
        $product_description->insert_Productdes($productid, $monthprice, $annualmonth, $sku, $Bandwidth, $freedomain, $language_tech, $mailbox, $mailbox,$webspace);
    
        return true;
    }
    if ($_POST['action']=='editproduct') {
        $id=$_POST['id'];
        $data=$product->edit_product($id);
        $return_data=array();
        while ($row = $data->fetch_assoc()) {
            $return_data[]=$row;
        }
        print_r(json_encode($return_data)); 
       
        

    }
    if ($_POST['action']=='updateProduct') {
        $categeoryid=$_POST['categeoryid'];
        $productname=$_POST['productname'];
        $pageurl=$_POST['pageurl'];
        $monthprice=$_POST['monthprice'];
        $annualmonth=$_POST['annualmonth'];
        $sku=$_POST['sku'];
        $Bandwidth=$_POST['Bandwidth'];
        $freedomain=$_POST['freedomain'];
        $language_tech=$_POST['language_tech'];
        $mailbox=$_POST['mailbox'];
        $webspace=$_POST['webspace'];
        $id=$_POST['id'];
        $data=$product->update_Product($categeoryid, $productname, $pageurl, $id);
        $product_description->update_product_description($monthprice, $annualmonth, $sku, $Bandwidth, $freedomain, $language_tech, $mailbox, $webspace, $id);
    }
    if ($_POST['action']=='deleteproduct') {
        $id=$_POST['id'];
        $product_description->delete_product($id);
        $product->delete_product($id);
        echo true;
    }
   
} 
if (isset($_GET['getProduct'])) {
    $data=$product->show_category();
    $return_data['data']=array();
    while ($row = $data->fetch_assoc()) {
        if ($row['prod_available']==1) {
            $available='available';
        } else {
            $available='unavailable';
        }
        $parent_name=$product->getparentname($row['prod_parent_id']);
        $return_data['data'][]=array($parent_name,$row['prod_name'],$row['html'],$available,$row['prod_launch_date'],'<button type="button" class="btn btn btn-outline-success " id="editcategory" data-toggle="modal" data-target="#modal-form" data-action="edit" data-id="'.$row['id'].'">Edit</button>
        <button   data-id="'.$row['id'].'" data-action="delete" class="btn btn-outline-danger actioncategory">Delete</button>');
    }
    print_r(json_encode($return_data));
}
if (isset($_GET['getProducts'])) {
    $data=$product->show_products();
    $return_data['data']=array();
    while ($row = $data->fetch_assoc()) {
        if ($row['prod_available']==1) {
            $available='available';
        } else {
            $available='unavailable';
        }
        $description=json_decode($row['description']);
        $Bandwidth=$description->{'Bandwidth'};
        $freedomain=$description->{'freedomain'};
        $language_tech=$description->{'language_tech'};
        $mailbox=$description->{'mailbox'};
        $webspace=$description->{'webspace'};
        $parent_name=$product->getparentname($row['prod_parent_id']);
        $return_data['data'][]=array($parent_name,$row['prod_name'],$row['html'],$available,$row['prod_launch_date'],$Bandwidth,$freedomain,$language_tech,$mailbox,$webspace,$row['mon_price'],$row['annual_price'],$row['sku'],'<button type="button" class="btn btn-info " id="editproduct" data-toggle="modal" data-target="#modal-form" data-action="editproduct" data-id="'.$row['prod_id'].'">Edit</button>
        <button  class="btn btn-danger " data-id="'.$row['prod_id'].'" id="deleteproduct" >Delete</button>');
    }
    print_r(json_encode($return_data));
}


?>