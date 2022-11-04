<?php 
	ob_start();

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
?>
<?php 
    if(isset($data['notice'])){
        if($data['check']){
            $text= "notice-text--success";
            $task= "notice-task--success";
        }
        else{
            $text= "notice-text";
            $task= "notice-task";
        }

        echo '
        <div class="'.$task.' notice-task">
            <span class="'.$text.' notice-text">
            '.$data['notice'].'
            </span>
        </div>
        ';      
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/tailwind.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="/mvc/data/font/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
	<title>Carlton Hotel</title>
	<link rel="icon" type="image/x-icon" href="/mvc/data/images/logo/logo-company.png">
</head>

<body>
	<btn onclick="topFunction()" id="btn-to-top" class="btn-to-top">
		<i class="fa-solid fa-arrow-up"></i>
	</btn>
	<div class="bg-main h-20 flex items-center" id="header">
		<div class="grid">
			<div class="flex justify-between">
				<div class="">
					<a href="/home" class="">
						<img src="/mvc/data/images/logo/logo-company.png" alt="" class="w-32">

					</a>
					
					<btn id="header__btn-menu--mobile" class="header__btn-menu--mobile" onclick="">
						<i class="fa-solid fa-bars"></i>
					</btn>
				</div>

				<div class="flex items-center">
					<ul id="header__menu--listl" class="flex">
						<li class="header__menu--item">
							<a href="/home" class="flex h-full items-center text-white font-light mx-3 text-xl">HOME</a>
						</li>
						<li class="header__menu--item">
							<a href="#room" class="flex h-full items-center text-white font-light mx-3 text-xl">ROOM</a>
						</li>
						<li class="header__menu--item">
							<a href="#about" class="flex h-full items-center text-white font-light mx-3 text-xl">ABOUT</a>
						</li>
						<li class="header__menu--item">
							<a href="#services" class="flex h-full items-center text-white font-light mx-3 text-xl">SERVICE</a>
						</li>
					</ul>
				</div>

				<div id="header__user" class="flex items-center">
					
                	<?php
						if(isset($data['user'])){
                            $row = json_decode($data['user']);
							// echo($row -> fullName);
							if($row -> roles ==1){
								echo '<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name text-white">Welcome, '.$row->fullName.'</p>
								<div id="user__opption" class="user__opption z-10 hidden">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="/user/" class="text-white">
												<i class="fa-regular fa-user"></i>
												Quản lý tài khoản
											</a>
										</li>
										<li class="user__opption--item">
											<a href="#" class="text-white">
												<i class="fa-solid fa-suitcase"></i>
												Dữ liệu đặt chỗ
											</a>
										</li>
										<li class="user__opption--item">
											<a href="/enrol/logout" class="text-white">
												<i class="fa-solid fa-arrow-right-from-bracket"></i>
												Đăng xuất
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="header__user--register"></div>
							<div id="header__user--login"></div>';
							}

							if($row->roles==2){
								echo '<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name text-white">Welcome, '.$row->fullName.'</p>
								
								<div id="user__opption" class="user__opption z-10 hidden">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="./admin" class="text-white">
												<i class="fa-regular fa-user"></i>
												Quản lý khách sạn
											</a>
										</li>
										<li class="user__opption--item">
											<a href="/enrol/logout" class="text-white">
												<i class="fa-solid fa-arrow-right-from-bracket"></i>
												Đăng xuất
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="header__user--register" class="header__user--register header__user-item "></div>
							<div id="header__user--login" class="header__user--login header__user-item "></div>';
							}


						
					
					
						} else{
							?>
								<a href="/enrol/register" id="header__user--register" class=" text-white border-r-2 px-2">Register</a>
								<a href="/enrol/login" id="header__user--login" class="text-white px-2">Log In</a>
							
						<?php } 
					?>
				</div>
			</div>
		</div>
	</div> 

	<div class="container-content">
		<div class="home">
			<div class="home__backgound">
				<div class="flex justify-center">
					<form action="/listroom/default" method="GET" id="form-search" class="flex absolute bottom-1/4 bg-black bg-opacity-50 w-5/12 py-4 pl-5 rounded text-white  overflow-hidden">
					<!-- <form action="/listroom/default" method="GET" id="form-search" class="home__taskbar-booking grid__row"> -->
						
						<div class="w-1/2">
							<label for="booking-input-checkout" class="taskbar-booking--text">
								<i class="fa-regular fa-inbox-out"></i>
								Check in - Check out
							</label>

							<input id="booking-input-checkout" type="text" name="datefilter"  class="bg-transparent w-10/12 cursor-pointer" value="dd/mm/yyyy">
						</div>
					
						<div class="w-1/4">
							<label for="booking-input-guest" class="taskbar-booking--text">
								<i class="fa-solid fa-users"></i>
								Guest
							</label>
							<input id="booking-input-guest" type="number" name="guest" value="1" min="1"  class="bg-transparent w-10/12 cursor-pointer ">
						</div>
						<input type="submit" name="search" value="search" class="w-1/4 absolute h-full top-0 right-0 bg-orange-main hover:bg-orange-main-dark">
					</form>
				</div>
			</div>
            
            <!--  -->
            <?php 
            require_once "./mvc/views/pages/".$data['page'].".php";
            ?>
		    <!--  -->
		</div>
    </div>

	<div class="footer">
		<div class="grid-cols-4 gap-x-5 grid max-w-7xl mx-auto">
			<div>
				<a href="/home">
					<img src="/mvc/data/images/logo/logo-company.png" alt=""  class="w-9/12 mx-auto">
				</a>
				<p class="footer__sologan">
					We started building our hotel in 1995. Since then, we've grown in to the
					hotel with the best client service in our country
				</p>
			</div>
				

			<div>
				<h2 class="mb-2 text-xl">Useful Links</h2>
				<ul class="pl-2 text-sm">
					<li>About Us</li>
					<li>Contact Us</li>
					<li>Help desk</li>
					<li>Term & condition</li>
				</ul>
			</div>

			<div>
				<h2 class="mb-2 text-xl">Address</h2>
				<ul class="pl-2 text-sm">
					<li class="mb-2">19 Nguyen Huu Tho, Tan Phong, Distric 7, HCM city, Viet Nam</li>
					<li>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.026434686444!2d106.69792991488471!3d10.732444492351362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f97d6e91901%3A0x32814f812b209bc1!2zMTkgxJAuTmd1eeG7hW4gSOG7r3UgVGjhu40sIFTDom4gSMawbmcsIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1662765788758!5m2!1svi!2s" width="80%" style="border:0; border-radius: 2px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</li>
				</ul>
			</div>

			<div>
				<h2 class="mb-2 text-xl">Contact Us</h2>
				<ul class="pl-2 text-sm">
					<li>
						<i class="fa-sharp fa-solid fa-phone"></i> 
						0123456789
					</li>
					<li>
						<i class="fa-regular fa-envelope"></i>
						email@gmail.com
					</li>
					<li>
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

	



	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>						
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="main.js"></script> 
</body>

</html>