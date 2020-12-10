<?php
include_once('Product.php');
$product=new Product();
if (isset($_POST['action'])) {
    if ($_POST['action']=='insertCategory') {
        $categoryname=$_POST['categoryname'];
        $link=$_POST['link'];
        $data=$product->insert_category($categoryname, $link);
        return true;
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
        $return_data['data'][]=array($row['id'],$row['prod_parent_id'],$row['prod_name'],$row['link'],$available,$row['prod_launch_date'],'<button type="button" class="btn btn btn-outline-success actioncategory" data-toggle="modal" data-target="#modal-form" data-action="edit" data-id="'.$row['id'].'">Edit</button>
        <button   data-id="'.$row['id'].'" data-action="delete" class="btn btn-outline-danger actioncategory">Delete</button>');
    }
    print_r(json_encode($return_data));
}


?>