<?php 
include_once('header.php');
require_once 'User.php';
$useractive=new User();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';

$error='';
$msg='';
$errorem='';
$errores='';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $mobile = $_GET['mobile'];
    $name = $_GET['name'];
}
  if (isset($_POST['submitEmail'])) {
    $data=$useractive->dublicateusername($_POST['email'], '12456');
    if($data){
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
          $msg = "Dear $name OTP has been sent please check your email !";
          // header('location: verification.php?email=' . $email);
      } catch (Exception $e) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      }
    }
    else{
      $errores='This Email is not register';
    }

 
}
if(isset($_POST['submitMobile'])){
  $data=$useractive->dublicateusername('asdsds@dnfj', $_POST['Mobileotp']);
  if($data){
    $MobileOtp = rand(1000,9999);
    $_SESSION['moblieOtp']=$MobileOtp;
    $fields = array(
      "sender_id" => "FSTSMS",
      "message" => "This is Test message" . $MobileOtp,
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
  else {
    $errorem='This Mobile is not register';
  }
}
if(isset($_POST['verifyEmail'])){
  if($_SESSION['otp']==$_POST['email']){
   
    $data=$useractive->makeActive($_GET['email']);
    if($data){
      $error="Your Email Is Successfully verified";
      echo '<script>window.location.href="login.php";</script>';
    }
  }
  else{
    $error="Incorrect OTP";
  }
}
if(isset($_POST['submitOtp'])){
  if($_SESSION['moblieOtp']==$_POST['Mobileotp']){
    
    $data=$useractive->makeMobileActive($_GET['mobile']);
    if($data){
      $errorms="Your Mobile Is Successfully verified";
      echo '<script>window.location.href="login.php";</script>';
    }
    
  }
  else{
    $error="Incorrect OTP";
  }
}

?>
<div class="content">
                <div class="main-1">
                    <div class="container">
                        <div class="login-page">
                            <div class="account_grid">
                                <div class="col-md-6 login-right">
                                    <h3>Verify Your Account Using Email</h3>
                                    <p>You can verify yourself through email</p>
                                    <form action="" method="post">
                                      <div>
                                        <span>Email Address<label>*</label></span>
                                        <input type="email" name="email" > 
                                      </div>
                                      <input type="submit" name ="submitEmail" value="Verify through Email">
                                      <p class="text-success"><?php echo $msg; ?></p>
                                    <span id="alertsuccess"><?php echo (isset($errores))?$errores:''; ?></span>
                                    <span id="alerterror"><?php echo (isset($errore))?$errore:''; ?></span>
                                    </form>
                                    <form action="" method="post">
                                      <div>
                                        <span>Enter OTP<label>*</label></span>
                                        <input type="text" name="email"> 
                                      </div>
                                      <input type="submit" name ="verifyEmail" id="verifyEmail" value="Validate OTP">
                                      <span id="success"><?php echo (isset($error))?$error:''; ?></span>
                                    </form>
                                </div>
                                <div class="col-md-6 login-right">
                                    <h3>Verify Your Account Using Mobile</h3>
                                    <p>You can verify yourself through mobile</p>
                                    <form action="" method="post">
                                      <div>
                                        <span>Mobile<label>*</label></span>
                                        <input type="text" name="Mobileotp" > 
                                      </div>                                
                                      <input type="submit" name ="submitMobile" value="Verify through Mobile">
                                      <span id="alertsuccess"><?php echo (isset($errorem))?$errorem:''; ?></span>
                                      <span id="success"><?php echo (isset($errorms))?$errorms:''; ?></span>
                                    </form>
                                    <form action="" method="post">
                                      <div>
                                        <span>Mobile<label>*</label></span>
                                        <input type="text" name="otp" > 
                                      </div>                                
                                      <input type="submit" name ="submitOtp" value="Validate OTP">
                                    </form>
                                </div>  
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- login -->
<?php include('footer.php'); ?>
<script src="script.js"></script>
			
</body>
</html>