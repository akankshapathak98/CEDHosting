<?php 
include_once('commonheader.php');
include_once('User.php');
include_once('admin/Product.php');
$subcategory=new Product();
$data=$subcategory->show_category();
$user= new User();
$error='';
 if(isset($_POST['login'])){
     $email=$_POST['email'];
     $password=trim($_POST['password']);
     $password=md5($_POST['password']);
     $email=trim($email);
     $data=$user->login($password,$email);
     if($data=='You are not an active user'){
        $error='Please verify your email/mobile';
     }
     else{
        $error='email and password not matched';
     }
     
 }
 
 ?>
<link rel="stylesheet" href="css/swipebox.css">
            <script src="js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
                </script>
<!--script-->
</head>
<body>
    <!---header--->
    <?php include_once('commonnavfile.php');?>
    <!---header--->

    <!---header--->
        <!---login--->
            <div class="content">
                <div class="main-1">
                    <div class="container">
                        <div class="login-page">
                            <div class="account_grid">
                                <div class="col-md-6 login-left">
                                     <h3>new customers</h3>
                                     <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                     <a class="acount-btn" href="account.php">Create an Account</a>
                                </div>
                                <div class="col-md-6 login-right">
                                    <h3>registered</h3>
                                    <p>If you have an account with us, please log in.</p>
                                    <form method='post'>
                                      <div>
                                        <span>Email Address<label>*</label></span>
                                        <input type="text" name='email' id='email' required> 
                                      </div>
                                      <div>
                                        <span>Password<label>*</label></span>
                                        <input type="password" name='password' id='password' required> 
                                      </div>
                                      <a class="forgot" href="#">Forgot Your Password?</a>
                                      <input type="submit" name='login'   value="Login">
                                      <span id=error><?php echo (isset($error))?$error:'';?></span>
                                    </form>
                                </div>	
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- login -->
                <!---footer--->
                <?php include_once('footer.php');?>
            <!---footer--->
            <script src="script.js"></script>
</body>
</html>