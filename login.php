<?php 
include_once('commonheader.php');
include_once('User.php');
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
								<h1><a href="index.html"><img src="images/logi1.jpeg" id='logo' alt="logo" ></a></h1>
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
									echo '<li class="active"><a href="login.php">Login</a></li>';
								}?>
								
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
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