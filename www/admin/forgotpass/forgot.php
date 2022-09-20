<?php
    session_start();
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="/style.css"> <!-- Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
	<link rel="stylesheet" href="/dataweb/font/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
	<title>Carlton Hotel</title>
	<link rel="icon" type="image/x-icon" href="./dataweb/img/logo/logo-company.png">
</head>
<body>
    <?php
    $checkmail = false;
    if(isset($_POST['email'])){
        $email  = addslashes($_POST['email']);
        
        //Kiểm tra mail hợp lệ
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '
                <div class="notice-task">
                    <span class="notice-text">Mail format is not valid</span>
                </div>';
        }
        else 
            $checkmail = true;
    }

    include "PHPMailer-master/src/PHPMailer.php";
    include "PHPMailer-master/src/Exception.php";
    include "PHPMailer-master/src/OAuthTokenProvider.php";
    include "PHPMailer-master/src/OAuth.php";
    include "PHPMailer-master/src/POP3.php";
    include "PHPMailer-master/src/SMTP.php";

     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'lenguyentanthi1806@gmail.com';                 // SMTP username
    $mail->Password = 'iechkjufdgisngrv';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('lenguyentanthi1806@gmail.com', 'ADMIN');
    $mail->addAddress('lenguyentanthi2002@gmail.com', 'Tấn Thi');     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Carlton Hotel';
    $mail->Body    = 'Reset password';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    // $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>






    <div class="container-content">
        <div class="grid container-content-forgot">
            <div class="container-form-forgotpass">
                <div class="warning-forgot">
                        <div class="warning-forgot--logo">
                            <a href="/index.php" class="warning-forgot--link-back-home">
                                <img src="/dataweb/img/logo/logo-company.png" alt="" class="warning-forgot--img">
                            </a>
                        </div>

                        <div class="warning-forgot-content">
                            <h1 class="warning-forgot-content--title">Forgot your password?</h1>
                            <p class="warning-forgot-content--text">
                                Follow these simple steps to reset your account:
                            </p>
                            <ol class="warning-forgot-content--list">
                                <li class="warning-forgot-content--item">
                                    Enter your username or email.
                                </li>
                                <li class="warning-forgot-content--item">
                                    Visit your email account, open the email sent by Carlton Hotel.
                                </li>
                                <li class="warning-forgot-content--item">
                                    Follow the instruction in the mail to change password.
                                </li>
                            </ol>
                        </div>
                </div>

                <?php
                    if($checkmail == false){
                        echo '
                        <form action="forgot.php" method=POST class="form-forgot">
                            <h1 class="form-forgot--title">Your email</h1>
                            <input name="email" type="text" class="forgot-input-code" placeholder="Your email">
                            <button class="btn-submit forgot__btn-confirm">Send</button>
                        </form>';
                    } 
                ?> 
                        <!-- <form action="" method=POST class="form-confirm">
                            <h1 class="form-confirm--title">Your email</h1>
                            <input name="code" type="text" class="confirm-input-code" placeholder="Code">
                            <button class="btn-submit confirm__btn-confirm">Confirm</button>
                        </form> -->
            </div>
        </div>
    </div>

	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
    
</body>
</html>