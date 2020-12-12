<?php 
include_once('admin/config.php');
class User{
    public $db;
    function login($password,$email){
        $res= ("select * from `tbl_user` where `email`='$email' && `password`='$password' ");
        $db = new dbConnect();
        $data=$db->select($res);
        if($data->num_rows > 0){
            while ($row = mysqli_fetch_array($data)) {
                
                if($row['active']=='1' && $row['is_admin']=='0'){
                    $_SESSION['username']=array('email'=>$row['email'],'name'=>$row['name']);
                    header('Location:index.php');
                }
                else if($row['is_admin']=='1'&& $row['active']=='1'){
                    $_SESSION['admin']=array('email'=>$row['email'],'name'=>$row['name']);
                    header('Location:admin/index.php');
                }
                else{
                   return 'You are not an active user';
                }
            }    
        }
    }
    function register($email,$name,$mobile,$password,$question,$answer){
        $res=("INSERT INTO `tbl_user` (`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('$email', '$name', '$mobile', '0', '0', '0', '0', current_timestamp(), '$password', '$question', '$answer');");
        $db = new dbConnect();
        $db->insert($res);
        return "success";
    }
    function dublicateusername($email,$mobile){
        $querry=("select * from tbl_user where `email` LIKE '$email' || `mobile` LIKE '$mobile'" );
        $this->db = new dbConnect();
        $data=$this->db->select($querry);
        $rowcount=mysqli_num_rows($data);
        if($rowcount>0){
            return true;
        }
        else{
            return false;
        }
    }
    function makeActive($verification){
        $querry=("UPDATE `tbl_user` SET `active`='1' ,`email_approved`='1' WHERE  `email`='$verification' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    }
    function makeMobileActive($verification){
        $querry=("UPDATE `tbl_user` SET `active`='1' ,`mobile`='1' WHERE  `mobile`='$verification' ");
        $this->db = new dbConnect();
        return $data=$this->db->update($querry);
    }
}
?>