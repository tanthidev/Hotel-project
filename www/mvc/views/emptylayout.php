<?php
//Khai báo sử dụng session
    if(!isset($_SESSION)){ 
        session_start(); 
        ob_start();
    } 
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
	<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/tailwind.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="/mvc/data/font/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
	<title>Carlton Hotel</title>
	<link rel="icon" type="image/x-icon" href="/mvc/data/images/logo/logo-company.png">
</head>

<body>
	<div class="header" id="header">
		<div class="grid">
			<div class="grid__row header__container">
				<div class="header__container-logo">
					<a href="/home" class="header__container-logo--img">
						<img src="/mvc/data/images/logo/logo-company.png" alt="" class="header__logo">

					</a>
				</div>

				<div class="header__menu">
					<ul id="header__menu--list" class="header__menu--list">
						<li class="header__menu--item">
							<a href="/home" class="header__menu--link">HOME</a>
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
						if(isset($data['user'])){
                            $row = json_decode($data['user']);
							// echo($row -> fullName);
							if($row -> roles ==1){
								echo '<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name">Welcome, '.$row->fullName.'</p>
								<div id="user__opption" class="user__opption">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="/user/" class="user__manager--link user__opption--item-link">
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
											<a href="/enrol/logout" class="user__logout--link user__opption--item-link">
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

							if($row->roles==2){
								echo '<div class="header__user-opption">
								<p id="header_user-name" class="header_user-name">Welcome, '.$row->fullName.'</p>
								<div id="user__opption" class="user__opption">
									<ul class="user__opption--list">
										<li class="user__opption--item">
											<a href="./admin" class="user__manager--link user__opption--item-link">
												<i class="fa-regular fa-user"></i>
												Quản lý khách sạn
											</a>
										</li>
										<li class="user__opption--item">
											<a href="/enrol/logout" class="user__logout--link user__opption--item-link">
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
								<a href="/enrol/register" id="header__user--register" class="header__user--register header__user-item ">Register</a>
								<a href="/enrol/login" id="header__user--login" class="header__user--login header__user-item ">Log In</a>

						<?php } 
					?>



				</div>
			</div>
		</div>

	</div> 

	<div class="container-content">
		<div class="home">
            
            <!--  -->
            <?php 
            require_once "./mvc/views/pages/".$data['page'].".php";
            ?>
		    <!--  -->
		</div>
    </div>



	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>						
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<!-- html2canvas library -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

	<!-- jsPDF library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
	<script src="main.js"></script> 
</body>


</html>