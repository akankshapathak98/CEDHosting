<?php 

include_once('commonheader.php');
include_once('User.php');
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
		echo"<script>alert('registration successfully');</script>";
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
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.html"><img src="images/logi1.jpeg" id='logo' alt="logo" srcset=""></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li ><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li ><a href="about.php">About</a></li>
								<li ><a href="services.php">Services</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
										<li><a href="linuxhosting.php">Linux hosting</a></li>
										<li><a href="wordpresshosting.php">WordPress Hosting</a></li>
										<li><a href="windowshosting.php">Windows Hosting</a></li>
										<li><a href="cmshosting.php">CMS Hosting</a></li>
									</ul>			
								</li>
								<li ><a href="pricing.php">Pricing</a></li>
								<li ><a href="blog.php">Blog</a></li>
                                <li ><a href="contact.php">Contact</a></li>
                                <li><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
								<?php if(isset($_SESSION['username'])){ 
									echo '<li><a href="logout.php">Logout</a></li>';
								}
								else {
									echo '<li ><a href="login.php">Login</a></li>';
								}?>
								
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
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