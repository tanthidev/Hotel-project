<?php
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
    <div class="header" id="header">
        <div class="grid">
            <div class="grid__row header__container">
                <div class="header__container-logo">
                    <a href="#" class="header__container-logo--img">
                        <img src="/dataweb/img/logo/logo-company.png" alt="" class="header__logo">

                    </a>
                    <!-- Btn use only mobile -->
                    <btn id="header__btn-menu--mobile" class="header__btn-menu--mobile" onclick="">
                        <i class="fa-solid fa-bars"></i>
                    </btn>
                </div>

                <div class="header__menu">
                    <ul id="header__menu--list" class="header__menu--list">
                        <li class="header__menu--item">
                            <a href="/index.php" class="header__menu--link">HOME</a>
                        </li>
                        <li class="header__menu--item">
                            <a href="#room" class="header__menu--link">ROOM</a>
                        </li>
                        <li class="header__menu--item">
                            <a href="#about" class="header__menu--link">ABOUT</a>
                        </li>
                        <li class="header__menu--item">
                            <a href="#services" class="header__menu--link">SERVICE</a>
                        </li>
                    </ul>
                </div>

                <div id="header__user" class="header__user">
                    <a href="/index.php" id="header__user--register" class="header__user--register header__user-item " style="color:#fff;">Register</a>
                    <a href="/index.php" id="header__user--login" class="header__user--login header__user-item ">Log In</a>
                </div>
            </div>
        </div>    
    </div>

    <div class="container-content">
        <div class="grid">
            <div class="container-forgotpass">
                
            </div>
        </div>
    </div>

    <div class="footer">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__column-4">
					<img src="./dataweb/img/logo/logo-company.png" alt="" class="footer__logo">
					<p class="footer__sologan">
						We started building our hotel in 1995. Since then, we've grown in to the
						hotel with the best client service in our country
					</p>
				</div>

			<div class="grid__column-4">
				<h2 class="footer__title">Useful Links</h2>
				<ul class="footer__list">
					<li class="footer__list--item">About Us</li>
					<li class="footer__list--item">Contact Us</li>
					<li class="footer__list--item">Help desk</li>
					<li class="footer__list--item">Term & condition</li>
				</ul>
			</div>

			<div class="grid__column-4">
				<h2 class="footer__title">Address</h2>
				<ul class="footer__list">
					<li class="footer__list--item">19 Nguyen Huu Tho, Tan Phong, Distric 7, HCM city, Viet Nam</li>
					<li class="footer__list--item">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.026434686444!2d106.69792991488471!3d10.732444492351362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f97d6e91901%3A0x32814f812b209bc1!2zMTkgxJAuTmd1eeG7hW4gSOG7r3UgVGjhu40sIFTDom4gSMawbmcsIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1662765788758!5m2!1svi!2s" width="80%" style="border:0; border-radius: 2px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</li>
				</ul>
			</div>

			<div class="grid__column-4">
				<h2 class="footer__title">Contact Us</h2>
				<ul class="footer__list">
					<li class="footer__list--item">
						<i class="fa-sharp fa-solid fa-phone"></i> 
						0123456789
					</li>
					<li class="footer__list--item">
						<i class="fa-regular fa-envelope"></i>
						email@gmail.com
					</li>
					<li class="footer__list--item">
						<i class="fa-solid fa-share">
							<i class="fa-brands fa-facebook"></i>
							<i class="fa-brands fa-twitter"></i>
							<i class="fa-brands fa-instagram"></i>
						</i>
					</li>
				</ul>
			</div>
			</div>

		</div>
	</div>
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
    
</body>
</html>