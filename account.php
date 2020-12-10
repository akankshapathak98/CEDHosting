<?php 

include_once('commonheader.php');
include_once('User.php');
include_once('admin/Product.php');
$subcategory=new Product();
$data=$subcategory->show_category();
$user=new User();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';

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
		// echo"<script>alert('registration successfully');</script>";
		$otp = rand(1000,9999);
    $_SESSION['otp']=$otp;
    $mail = new PHPMailer();
    try {
        $mail->isSMTP(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cedcossarjun1023@gmail.com';
        $mail->Password = 'Cedcoss@1023';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setfrom('cedcossarjun1023@gmail.com', 'CedHosting');
        $mail->addAddress($email);
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Account Verification';
        $mail->Body = 'Hi User,Here is your otp for account verification: '.$otp;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        // header('location: verification.php?email=' . $email);
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }


	// mobile otp 

	$fields = array(
		"sender_id" => "FSTSMS",
		"message" => "This is Test message" . $otp,
		"language" => "english",
		"route" => "p",
		"numbers" => "$mobile",
	);
	
	$curl = curl_init();
	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($fields),
	  CURLOPT_HTTPHEADER => array(
		"authorization: kb1YNOlwIxFVvrMsySQD6etE3JARPpu87fZj9Gz0g5m4cdTLiqV8f9WTbqFodk3PIOpXMDRlzmKLCE10",
		"accept: */*",
		"cache-control: no-cache",
		"content-type: application/json"
	  ),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}




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