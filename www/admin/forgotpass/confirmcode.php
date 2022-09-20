<?php
    session_start();
    ob_start();
    include "../db.php";
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
	<link rel="icon" type="image/x-icon" href="/dataweb/img/logo/logo-company.png">
</head>
<body>

    <?php
        $checkcodeinput=false;
        if(!isset($_POST['code'])){
            echo '    
                <div class="notice-task notice-task--success">
                    <span class="notice-text notice-text--success">Send Success!</span>
                </div>';
        } else {
            $codeinput  = addslashes($_POST['code']);
            if($codeinput==$_COOKIE['code']){
                $checkcodeinput = true;
                $ID = $_COOKIE['ID'];
                $sql = "SELECT * FROM User where userID = '$ID'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                setcookie('ID', $ID, time() + 120);
            }
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
                    if($checkcodeinput == true){
                        echo '
                        <form action="resetpass.php" method="POST" class="form-confirm">
                            <h1 class="form-confirm--title">New password</h1>
                            <input name="newpass" type="password" class="confirm-input-code" placeholder="New password">
                            <h1 class="form-confirm--title">Repeat new password</h1>
                            <input name="re-newpass" type="password" class="confirm-input-code" placeholder="Repeat new password">
                            <button class="btn-submit confirm__btn-confirm">Confirm</button>
                        </form>
                        ';
                    } else {?>
                        <form action="confirmcode.php" method="POST" class="form-confirm">
                            <h1 class="form-confirm--title">Enter code</h1>
                            <input name="code" type="text" class="confirm-input-code" placeholder="Code">
                            <button class="btn-submit confirm__btn-confirm">Confirm</button>
                        </form>
                    <?php } ?>
            </div>
        </div>
    </div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
    
</body>
</html>