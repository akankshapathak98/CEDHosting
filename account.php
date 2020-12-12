<?php 

include_once('commonheader.php');
include_once('User.php');
include_once('admin/Product.php');
$subcategory=new Product();
$data=$subcategory->show_category();
$user=new User();


if(isset($_POST['register'])){
	$email=$_POST['email'];
    $name=trim($_POST['name']);
    $mobile=trim($_POST['mobile']);
    $email=trim($email);
	$password=md5($_POST['password']);
	$question=trim($_POST['security']);
	$answer=trim($_POST['answer']);
	if($user->dublicateusername($email,$mobile)){
		echo"<script>alert('email and/or mobile already exist');</script>";
		//header('Location:login.php');
	}
	else{
		$data=$user->register($email,$name,$mobile,$password,$question,$answer);
		header('Location:verification.php?email='.$email.'&name='.$name.'&mobile='.$mobile);
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
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form method='post' action='account.php' onsubmit="return validateform();"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					<h6 id=info>*indicates mandatory Fields</h6>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name='name' id='name' > 
					 </div>
					 <div>
						<span>Mobile(Minimum 10 digit are allowed)<label>*</label></span>
						<input type="text" name='mobile' id='mobile'> 
					 </div>
					 
					 <div>
						 <span>Security Question<label>*</label></span>
						 <select name="security" id="security" >
							<option value='Select Security question'>Select Security question</option>
							<option value='What was your childhood nickname?'>What was your childhood nickname?</option>
							<option value='What is the name of your favourite childhood friend?'>What is the name of your favourite childhood friend?</option>
							<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
							<option value='What was your dream job as a child?'>What was your dream job as a child?</option>
							<option value="What is your favourite teacher's nickname">What is your favourite teacher's nickname?</option>
						 </select> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name='email' id='email'> 
					 </div>
					 <div>
						 <span>Answer<label>*</label></span>
						 <input type="text" name='answer' id='answer'> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name='password' id='password'>
								<span id='passwordvalidation'>password must be in 8 to 16 charecter contain at least one numeric digit,one uppercase and one lowercase letter,one special charecter</span>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name='cpassword' id='cpassword'>
							 </div>
					 </div>
				<!-- </form> -->
				<div class="clearfix"> </div>
				<div class="register-but">
				   <!-- <form> -->
					   <input type="submit" name='register' id='register' value="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
				<?php include_once('footer.php');?>
			<!---footer--->
			<script src="script.js"></script>
			
</body>
</html>