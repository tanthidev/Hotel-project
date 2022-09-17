<?php
//Khai báo sử dụng session
session_start();
ob_start();

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['tel'])) 
{
    //Kết nối tới database
    include('db.php');
     
    //Lấy dữ liệu nhập vào
    $phoneNumber = addslashes($_POST['tel']);
    $passWord = addslashes($_POST['pass']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$phoneNumber || !$passWord) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    $passWord = md5($passWord);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn,"SELECT userID, phoneNumber, passWord FROM User WHERE phoneNumber='$phoneNumber'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($passWord != $row['passWord']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lưu tên đăng nhập
    $_SESSION['us'] = $row['userID'];
    header('Location: index.php');
	exit;
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
	<link rel="stylesheet" href="/main.js">
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
							<a href="" class="header__menu--link">HOME</a>
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