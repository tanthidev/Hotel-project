<?php
    ob_start();
    session_start();
    include "db.php";
    //Nếu không phải là sự kiện đăng ký thì không xử lý
    if(!isset($_POST['fullName'])){
        die('');
    }
   
    //Khai báo utf-8 để hiển thị được tiếng việt
    // header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $userID     = addslashes($_SESSION['id']);
    $fullName   = addslashes($_POST['fullName']);
    $birthDay   = addslashes($_POST['birthDay']);
    $phoneNumber= addslashes($_POST['phoneNumber']);
    $email      = addslashes($_POST['email']);
    $gender     = addslashes($_POST['gender']);

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$fullName || !$phoneNumber || !$email)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

          
    //Kiểm tra email có đúng định dạng hay không
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


    //Lưu thông tin thành viên vào bảng
    @$updatemember = mysqli_query($conn," 
        UPDATE User
        SET fullName = '$fullName', 
            phoneNumber = '$phoneNumber', 
            email='$email', 
            gender='$gender' 
        WHERE userID=$userID");
                          
    //Thông báo quá trình lưu
    if ($updatemember)
        // echo 'Ok!';     
        header('Location: /User/UserInfo.php');
    else{
        echo mysqli_error($conn);
        echo "Có lỗi xảy ra trong quá trình update. <a href='/User/UserInfo.php'>Thử lại</a>";
    }
?>