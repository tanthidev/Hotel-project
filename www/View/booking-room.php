<?php
//Khai báo sử dụng session
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
		<link rel="stylesheet" href="/style.css">
		<link rel="stylesheet" href="/dataweb/font/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.css">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
		<title>Carlton Hotel</title>
		<link rel="icon" type="image/x-icon" href="/dataweb/img/logo/logo-company.png">
	</head>

	<body>
		<btn onclick="topFunction()" id="btn-to-top" class="btn-to-top">
			<i class="fa-solid fa-arrow-up"></i>
		</btn>

		<div class="header" id="header">
			<div class="grid">
				<div class="grid__row header__container">
					<div class="header__container-logo">
						<a href="/index.php" class="header__container-logo--img">
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
						
						<?php
							if(isset($_SESSION['us'])&&($_SESSION['us']!="")){
								include('db.php');
								$a = $_SESSION['us'];
								$sql = "SELECT fullName, email FROM User where userID = $a";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
								echo '<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name">Welcome, '.$row["fullName"].'</p>
								<div id="user__opption" class="user__opption">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="./User/UserInfo.php" class="user__manager--link user__opption--item-link">
												<i class="fa-regular fa-user"></i>
												Quản lý tài khoản
											</a>
										</li>
										<li class="user__opption--item">
											<a href="#" class="user__databooking--link user__opption--item-link">
												<i class="fa-solid fa-suitcase"></i>
												Dữ liệu đặt chỗ
											</a>
										</li>
										<li class="user__opption--item">
											<a href="./admin/logout.php" class="user__logout--link user__opption--item-link">
												<i class="fa-solid fa-arrow-right-from-bracket"></i>
												Đăng xuất
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="header__user--register" class="header__user--register header__user-item "></div>
							<div id="header__user--login" class="header__user--login header__user-item "></div>';
							} else{
								?>
									<div id="header__user--register" class="header__user--register header__user-item ">Register</div>
									<div id="header__user--login" class="header__user--login header__user-item ">Log In</div>
								
							<?php } ?>


					</div>
				</div>
			</div>	
		</div>
        <!-- Main content -->
		<div class="container-content">
            <!--  -->
			<div class="home">
				<div class="home__backgound home__backgound--short">

                    <!-- Task Register -->
				<div class="header__user--container--register">
					<div class="container-register">
						<div id="wrap-register" class="wrap-register">
							<div id="register-cancel" class="cancel-btn">
								<i class="fa-solid fa-xmark"></i>
							</div>
			
							<form action="./admin/Xulydangki.php" method="POST" class="register-form validate-form">
								<span class="register-form-title">
									Member Register
								</span>
								<div class="wrap-input validate-input">
									<input class="register-form--input" type="text" name="fullName" placeholder="Full Name">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa-solid fa-user"aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input validate-input">
									<input class="register-form--input" type="tel" name="tel" placeholder="Phone Number">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa-sharp fa-solid fa-phone" aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input validate-input">
									<input class="register-form--input" type="email" name="email" placeholder="Email">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa-solid fa-envelope" aria-hidden="true"></i>
									</span>
								</div>
			
								<div class="wrap-input validate-input">
									<input class="register-form--input" type="password" name="pass" placeholder="Password">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input validate-input">
									<input class="register-form--input" type="password" name="repeat-pass" placeholder="Repeat Password">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa-solid fa-repeat" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-register-form-btn">
									<button class="register-form-btn">
										Register
									</button>
								</div>
			
			
								<div class="text-center register-form__login">
									<a id="register-form__to-login--text" class="txt2 register-form__to-login--text" href="#">
										
											Do you already have an account? Log in
										<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
									</a>
								</div>
							</form>
						</div> 
					</div>
				</div>

				<!-- Task Login -->
				<div class="header__user--container--login">
					<div class="container-login">
						<div id="wrap-login" class="wrap-login">
							<div id="login-cancel" class="cancel-btn">
								<i class="fa-solid fa-xmark"></i>
							</div>
			
							<form action="/admin/login.php" method="POST" class="login-form validate-form">
								<span class="login-form-title">
									Member Login
								</span>
			
								<div class="wrap-input validate-input">
									<input class="login-form--input" type="tel" name="tel" placeholder="Phone Number">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa-sharp fa-solid fa-phone" aria-hidden="true"></i>
									</span>
								</div>
			
								<div class="wrap-input validate-input">
									<input class="login-form--input" type="password" name="pass" placeholder="Password">
									<span class="focus-input"></span>
									<span class="symbol-input">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-login-form-btn">
									<button class="login-form-btn">
										Login
									</button>
								</div>
			
								<div class="text-center login-form__forgot">
									<span class="login-form__forgot--text">
										Forgot
									</span>
									<span id="login-form__to-forgot" class="txt2 login-form__forgot--link">
										Username / Password?
									</span>
								</div>
			
								<div class="text-center login-form__to-register">
									<a id="login-form__to-register--text"  class="txt2  login-form__to-register--text" href="#">
										Create your Account
										<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
									</a>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Task forgot password -->
				<div class="header__user--container--login">
					<div class="container-login">
						<div id="wrap-forgot" class="wrap-login">
							<div id="forgot-cancel" class="cancel-btn">
								<i class="fa-solid fa-xmark"></i>
							</div>

							<div id="forgot-back" class="cancel-btn back-btn">
								<i class="fa-sharp fa-solid fa-arrow-left"></i>
							</div>
			
							<form action="index.php" method="POST" class="login-form validate-form">
								<span class="login-form-title">
									Forgot Password
								</span>
			
								<div class="wrap-input validate-input">
									<input class="login-form--input" type="email" name="email" placeholder="Enter your email">
									<span class="focus-input"></span>
									<span class="symbol-input">
									<i class="fa-solid fa-envelope" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-login-form-btn">
									<button class="login-form-btn">
										Confirm
									</button>
								</div>
			
							</form>
						</div>
					</div>
				</div>
			</div>
            <!--  -->
            
            <div class="grid container-page-booking">
                <div class="grid__row page-booking__main">
                    <!--  -->
                    <div class="grid__column-10-6 slideshow-container page-booking__main--slide-img">
                            <div class="mySlides fade page-booking__main--slide--item">
                                <img src="/dataweb/img/room/A0101.jpg" style="width:100%">
                            </div>

                            <div class="mySlides fade page-booking__main--slide--item">
                                <img src="/dataweb/img/room/A0102.jpg" style="width:100%">
                            </div>

                            <div class="mySlides fade page-booking__main--slide--item">
                                <img src="/dataweb/img/room/A0103.jpg" style="width:100%">
                            </div>

                            <a class="prev prev--page-booking" onclick="plusSlides(-1)">❮</a>
                            <a class="next next--page-booking" onclick="plusSlides(1)">❯</a>
                    </div>
                    <!--  -->
                    <div class="grid__column-10-4 page-booking__main--selection">
                        <div class="page-booking__selection--header ">
                            <div class="grid__column-2 page-booking__selection--header-active">
                                <h2 class="page-booking__selection--title ">BOOKING</h2>
                            </div>
                            <!--  -->
                            <div class="grid__column-2 page-booking__selection--header-not-active">
                                <h2 class="page-booking__selection--title">REQUEST BOOKING</h2>
                            </div>
                        </div>
                        
                        <form action="" class="grid__row page-booking--selection-form">
                            <div class="grid__column-2 page-booking--selection-form-item">
                                <label for="datecheckin" class="page-booking--selection-text">
                                    Check-in
                                </label>
                                <input name="datecheckin" id="datecheckin" type="date" class="page-booking--selection-input">
                            </div>

                            <div class="grid__column-2 page-booking--selection-form-item">
                                <label for="datecheckout" class="page-booking--selection-text">
                                    Check-out
                                </label>
                                <input name="datecheckout" id="datecheckout" type="date" class="page-booking--selection-input">
                            </div>

                            <div class="grid__column-2 page-booking--selection-form-item">
                                <label for="guest" class="page-booking--selection-text">
                                    Guest
                                </label>
                                <input name="guest" id="guest" type="number" class="page-booking--selection-input">
                            </div>

                            <div class="grid__column-2 page-booking--selection-form-item">
                                <label for="rooms" class="page-booking--selection-text">
                                    Rooms
                                </label>
                                <input name="rooms" id="rooms" type="number" class="page-booking--selection-input">
                            </div>
                            
                            <div class="page-booking__extra-services">
                                <h1 class="page-booking__extra-services--title">
                                    Extra Services
                                </h1>
                                <ul class="page-booking__extra-services--list">
                                    <li class="page-booking__extra-services--item">
                                        <div class="page-booking__extra-service-container-input">
                                            <input id="driver" name="driver" type="checkbox" class="page-booking__extra-service--input">
                                            <label for="driver" class="page-booking__extra-service-label">
                                                <span class="page-booking__extra-service-name">Driver</span>
                                            </label>
                                        </div>
                                        <label for="driver" class="page-booking__extra-service-price">$10/ Day</label>
                                    </li>
                                    <li class="page-booking__extra-services--item">
                                        <div class="page-booking__extra-service-container-input">
                                            <input id="gym" name="gym" type="checkbox" class="page-booking__extra-service--input">
                                            <label for="gym" class="page-booking__extra-service-label">
                                                <span class="page-booking__extra-service-name">Gym & Spa</span>
                                            </label>
                                        </div>
                                        <label for="gym" class="page-booking__extra-service-price">$10/ Day</label>
                                    </li>
                                    <li class="page-booking__extra-services--item">
                                        <div class="page-booking__extra-service-container-input">
                                            <input id="breakfast" name="breakfast" type="checkbox" class="page-booking__extra-service--input">
                                            <label for="breakfast" class="page-booking__extra-service-label">
                                                <span class="page-booking__extra-service-name">Breakfast</span>
                                            </label>                                 
                                        </div>
                                        <label for="breakfast" class="page-booking__extra-service-price">$10/ Day</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="page-booking--selection-footer">
                                
                            </div>

                        </form>
                        
                    </div>
                </div>
                <!--  -->

                <div class="page-booking__container-overview grid__row">
                    <div class="page-booking__overview grid__column-10-6">

                    </div>
                </div>

                <!--  -->
                <div class="page-booking__container-amenities grid__row">
                    <div class="page-booking__amenities grid__column-10-6">

                    </div>
                </div>

            </div>



		</div>

		<div class="footer">
			<div class="grid">
				<div class="grid__row">
					<div class="grid__column-4">
						<img src="	/dataweb/img/logo/logo-company.png" alt="" class="footer__logo">
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
	




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
		
	</body>
</html>

					