<?php
//Khai báo sử dụng session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        ob_start();
    } 
    $admin = json_decode($data['admin']);
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
		<link rel="stylesheet" href="/style.css">
		<link rel="stylesheet" href="/dataweb/font/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.css">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;700&family=Qwitcher+Grypen:wght@700&display=swap" rel="stylesheet">
		<title>Carlton Hotel</title>
		<link rel="icon" type="image/x-icon" href="/dataweb/img/logo/logo-company.png">
	</head>

	<body>

		<!-- <div class="header" id="header">
			<div class="grid">
				<div class="grid__row header__container">
					<div class="header__container-logo">
						<a href="/home" class="header__container-logo--img">
							<img src="/dataweb/img/logo/logo-company.png" alt="" class="header__logo">
						</a>
					</div>


					<div id="header__user" class="header__user">
                                <div class="header__user-opption">
									<p id="header_user-name" class="header_user-name">Welcome, '.$row->fullName.'</p>
									<div id="user__opption" class="user__opption">
										<ul class="user__opption--list">
											<li class="user__opption--item">
												<a href="./User/UserInfo.php" class="user__manager--link user__opption--item-link">
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

					</div>
				</div>
			</div>	
		</div> -->
        <!-- Main content -->
		<div class="container-content">
            <!--  -->
            <div class="grid__row">
                <div id="admin__container-categories" class="admin__container-categories grid__column-5-1">
                    <div class="container-btn-sidebar">
                        <!-- btn hidden sidebar -->
                        <a id="btn-collapse-sidebar" href="javascript:void(0)" class="btn-collapse-sidebar">
                            &times;
                        </a>
                        <!-- btn show sidebar -->
                        <a id="btn-show-sidebar" href="javascript:void(0)" class="btn-show-sidebar">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </div>
                    <!-- Logo -->
                    <div id="admin__container-logo" class="admin__container-logo">
						<a href="/home">
							<img id="admin__logo" src="/dataweb/img/logo/logo-company.png" alt="" class="header__logo">
						</a>
					</div>
                    <!-- Category -->
                    <ul class="admin__categoies--list">
                        <!-- DashBoard -->
                        <a href="/admin/dashBoard" class="admin__categories--link">
                            <li id="admin-dashboard" class="admin__categories--item">
                                <span class="admin__categories--item-icon">
                                    <i class="fa-brands fa-windows"></i>
                                </span>
                                <span class="admin__catogories--item-text">
                                    DashBoard
                                </span>
                            </li>
                        </a>
                        <!-- Booking Manager -->
                        <a href="/admin/bookingManager" class="admin__categories--link">
                            <li id="admin-booking" class="admin__categories--item">
                                <span class="admin__categories--item-icon">
                                    <i class="fa-sharp fa-solid fa-database"></i>
                                </span>
                                <span class="admin__catogories--item-text">
                                    Booking Manager
                                </span>
                            </li>
                        </a>
                        <!-- User Manager -->
                        <a href="/admin/userManager" class="admin__categories--link">
                            <li id="admin-user" class="admin__categories--item">
                                <span class="admin__categories--item-icon">
                                    <i class="fa-solid fa-people-roof"></i>
                                </span>
                                <span class="admin__catogories--item-text">
                                    User Manager
                                </span>
                            </li>
                        </a>
                        <!-- Room Manager -->
                        <a href="/admin/roomManager" class="admin__categories--link">
                            <li id="admin-room" class="admin__categories--item">
                                <span class="admin__categories--item-icon">
                                    <i class="fa-solid fa-hotel"></i>
                                </span>
                                <span class="admin__catogories--item-text">
                                    Room Manager
                                </span>
                            </li>
                        </a>
                        <!-- Service Manager -->
                        <a href="/admin/serviceManager" class="admin__categories--link">
                            <li id="admin-service" class="admin__categories--item">
                                <span class="admin__categories--item-icon">
                                    <i class="fa-solid fa-bell-concierge"></i>
                                </span>
                                <span class="admin__catogories--item-text">
                                    Service Manager
                                </span>
                            </li>                        
                        </a>
                    </ul>
                    <!-- Admin -->
                    <div id="admin-setting" class="admin-setting admin__categories--item">
                        <div class="admin-container ">
                            <?php echo '<p id="admin-container-name" class="admin-container-name">Admin '.$admin->fullName.'</p>';?>
                            <img class="admin-container-img" src="/mvc/data/images/admin.png" alt="">
                        </div>
                        
                        <a href="/enrol/logout" class="admin__logout">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Đăng xuất
                        </a>
					</div>
                </div>
    
                <div id="admin__container-content" class="admin__container-content grid__column-5-4">
                    <?php 
                        require_once "./mvc/views/pages/".$data['page'].".php";
                    ?>
                </div>
            </div>





            <?php 
                // require_once "./mvc/views/pages/".$data['page'].".php";
            ?>
            <!--  -->

		</div>

	




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>	
	<script src="/main.js"></script>
		
	</body>
</html>