<?php
	session_start();
	ob_start();
	include('db.php');
	$a = $_SESSION['id'];
	$sql = "SELECT *  FROM User where userID = $a";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
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
<body class="body-userInfo">
    <div class="header" id="header">
		<div class="grid">
			<div class="grid__row header__container">
				<div class="header__container-logo">
					<a href="http://localhost:8080/" class="header__container-logo--img">
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
						
						if(isset($_SESSION['id'])&&($_SESSION['id']!="")){
							echo '
							<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name">Welcome, '.$row["fullName"].'</p>
								<div id="user__opption" class="user__opption">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="#" class="user__manager--link user__opption--item-link">
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
											<a href="/admin/logout.php" class="user__logout--link user__opption--item-link">
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
    
    
    <div class="container">
        <div class="grid">
		<div class="grid__row">
			<div class="grid__column-4 ">
					<div class="profile-left profile__area-content">
						<ul class="profile__control">
							<li class="profile__control--item">
								<span id="to-page-info" class="profile__control--item-text">
									User information
								</span>
							</li>
							<li class="profile__control--item">
								<span id="to-page-change-pass" class="profile__control--item-text">
									Change password
								</span>
							</li>
						</ul>
					</div>			
				</div>	
				
				<div class="grid__column-3-4">
					<div class="profile-right profile__area-content">
						<form action="/admin/changeInfo.php" method="POST" id="profile__container-info" class="profile__container-info">
							<div class="profile__container-info--header">
								<h2 class="profile__title">
									Information
								</h2>
								<i id="btn-change-info" class="fa-solid fa-pen btn-change-info"></i>
							</div>

							<div class="profile__main">
								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="" class="profile__main--title">User ID:</label>
									</div>

									<div class="profile__main--container-info">
										<?php 
											echo '<p class="profile__main--info-text profile__main--info-text-cannot-change">'.$row['userID'].'</p>'
										?>

									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-fullName" class="profile__main--title">Full Name:</label>
									</div>

									<div class="profile__main--container-info">
										<?php 
											echo '<p class="profile__main--info-text">'.$row['fullName'].'</p>'
										?>

										<input id="profile__main--info-fullName" class="profile__change-input-change-info" type="text" name="fullName" value=<?php echo '"'.$row['fullName'].'"'?>>
									</div>
								</div>

								<hr>

							
								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-phoneNumber" class="profile__main--title">Phone number:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['phoneNumber'].'</p>'
											?>
											<input id="profile__main--info-phoneNumber" class="profile__change-input-change-info" type="tel" name="phoneNumber" value=<?php echo '"'.$row['phoneNumber'].'"'?>>
									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-email" class="profile__main--title">Email:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['email'].'</p>'
											?>
											<input id="profile__main--info-email" class="profile__change-input-change-info" type="text" name="email" value=<?php echo '"'.$row['email'].'"'?>>
									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="" class="profile__main--title">Gender:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['gender'].'</p>'
											
											?>

											<select class="profile__change-input-change-info" name="gender" id="gender" value="AAA">
												<option value="null">--Choose gender--</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
									</div>
								</div>


								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
									</div>
									<button id="cancel-change-info" class="btn-cancel cancel-change-info">Cancel</button>
									<input id="btn-submit-change-info" type="submit" class="btn-submit btn-submit-change-info" value="Change">
								</div>

							</div>
						</form>


						<!-- Change password -->
						<div id="profile__container-change-pass" class="profile__container-change-pass">
							<h2 class="profile__title">
								Change password:
							</h2>
							<form action="/admin/changePassword.php" method="POST" class="profile__form-change-pass">
								<!-- Current password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="currentpass" class="profile__change-pass--title">Current password:</label>
									</div>
									<input id="currentpass" name="currentpass" type="password" class="change-pass--input">
								</div>

								<!-- New password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="newpass" class="profile__change-pass--title">New password:</label>
									</div>
										<input id="newpass" name="newpass" type="password" class="change-pass--input">
								</div>

								<!-- Repeat New password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="re-newpass" class="profile__change-pass--title">Repeat new password:</label>
									</div>
										<input id="re-newpass" name="re-newpass" type="password" class="change-pass--input">
								</div>
								

								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										
									</div>
									<input id="btn-submit-change-password" type="submit" class="btn-submit btn-submit-change-password" value="Change">
								</div>
								
							</form>
						</div>

					</div>	
				</div>
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
	<script src="main.js"></script> 
</body>
</html>