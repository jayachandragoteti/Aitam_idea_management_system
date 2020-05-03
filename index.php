<?PHP 
    include "db_connection.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--===========================================================================-->
    <link rel="shortcut icon" href="assets/images/logo.jpg" />
    <!--===========================================================================-->
    <title>Login/Register</title>
    <!--=============================Font Icon ==================================-->
    <link rel="stylesheet" href="assets/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!--===========================================================================-->
    <link rel="stylesheet" href="assets/css/login_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--===========================================================================-->
     <script src="assets/js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <!--===========================================================================-->
</head>
<body style="background-image: linear-gradient(to right, #1A2980 0%, #26D0CE 51%, #1A2980 100%)">
<!--===========================================================================-->
    <div class="main" style="background-image: linear-gradient(to right, #1A2980 0%, #26D0CE 51%, #1A2980 100%)">
        <!--========= login ==============-->
        <section class="sign-in" >
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/logo.jpg" alt="sing up image"></figure>
                        <h3 class="signup-image-link"> AIM SYSTEM</h3>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                         <!-- <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="register-form" id="login-form">-->
                         <form method="POST" action="login_data.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="user_name"><i class="fa fa-user"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="User Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="user_pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="user_pass" id="userr_pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <a href="#" id="register" style="color:#1565c0;text-decoration:none;">
                                    <b><i class="fa fa-dot-circle-o">&nbsp</i><u>Register </u></b>
                                </a>
                            </div>    
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--========= /login ============-->
        <!--========= Mail ==============-->
        <section class="mail" style="display:none;" >
            <div class="container">
                <div class="signup-content" >
                    <div class="signup-form" style="">
                        <h2 class="form-title">Enter Your Mail</h2>
                        <h5><i class="fa fa-dot-circle-o"></i> &nbsp Verification Code will send to your Mali</h5>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="register-form" id="register-form">
                           
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                           <div class="form-group">
                            <a href="#"  id="mail" style="color:#1565c0;text-decoration:none;">
                                <b><i class="fa fa-dot-circle-o">&nbsp</i><u> I am already member</u></b>
                            </a>
                                <!--<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span>
                                <span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>-->
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="mail"  id="mail" class="form-submit" value="Send"/>
                            </div>
                        </form>
                        </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/logo.jpg" alt="sing up image"></figure>
                        <h3 class="signup-image-link"> AIM SYSTEM</h3>
                    </div>
                </div>
            </div>
         </section>
         <!--========= /Mail ==============-->
        </div>
<!--===========================================================================-->
<?php
    //---------------- login ---------------
  /*  if(isset($_POST['login']) && isset($_POST['user_name'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['user_pass'];
        
        $_SESSION['user_name']=$user_name;
        
        $sql="SELECT *  FROM `user_details` WHERE  `id_number` = '$user_name' AND `password` = '$password'";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);

        if ($row) {
            

            if ($row['login_type'] == "student" || $row['login_type'] == "faculty" ) {
                
                 header("Location: stu_faculty_main_dashboard.php");

            } elseif ($row['login_type']=="department_admin") {
                echo "<script>alert('successfully logged in.')</script>";

            } elseif ($row['login_type']=="central_committee") {
                echo "<script>alert('successfully logged in.')</script>";

            }else {
                echo "<script>alert('Login faild Try again')</script>";
               # echo "<script>window.location='index.php';</script>";
                
            }
        } else {
            echo "<script>alert('Login faild Try again ')</script>";
           # echo "<script>window.location='index.php';</script>";
        }
        
    }*/
    //---------------- /login ---------------
    //---------------- /mail ---------------
    if(isset($_POST['mail'])){
        $email = $_POST['email'];
        $code="AIM".rand(1000,100000);
        # $_SESSION['code']=$code;$_SESSION['mail']=$email;
        
            
                       // -------------------Sending email------------
                        if ($email!="") {
                            $to1 = $email;
                            $subject1 = 'Your verification code';
                            $from ='jayachandramohan2001.@gmail.com';
                            // To send HTML mail, the Content-type header must be set
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            
                            // Create email headers
                            $headers .= 'From: '.$from."\r\n".
                                'Reply-To: '.$from."\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                            
                            // Compose a simple HTML email message
                                $body = '<html><body>';
                            $body .= "<center>";
                            $body .= "<div style='width:80%;background-color:#424949;color:white;'>";
                            $body .= "<div>";
                                $body .= "<br>";
                                $body .= "<h2>Your verification code</h2>";
                                $body .= "<h1 >".$code."</h1>";
                                $body .= "<hr style='background-color: white; width:75%;'>";
                                $body .= "<br>";
                            $body .= "</div>";
                            $body .= "</div>";
                            $body .= "</center>";
                            $body .= "</body></html>";

                            
                            
                                if (mail($to1, $subject1, $body,$headers)) {
                                    $_SESSION['code']=$code;
                                    $_SESSION['mail']=$email;
                                    echo "<script>alert('Verification Code will send to your Mali')</script>";
                                    echo "<script>window.location='stu_faculty_registration.php';</script>";
                                }else {
                                    echo "<script>alert('Request failed try again')</script>";
                                   echo "<script>window.location='index.php';</script>";
                                }
                               #  echo "<script>window.location='stu_faculty_registration.php';</script>";
                        }
                        
                            // --------------

    }
    //---------------- /mail ---------------
?> 
<!--===========================================================================-->
<script>
$(document).ready(function(){
 //-------------------------
 $("#register").click(function(){
    $(".sign-in").hide();
    $(".mail").show();
  });
//-----------------------------
$("#mail").click(function(){
    $(".mail").hide();
    $(".sign-in").show();
  });
//-------------confirm_password-----------------
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
//------------------------------
});      
</script>
<!--===========================================================================-->   
</body>
</html>