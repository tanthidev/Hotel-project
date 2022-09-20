<?php
    ob_start();
    session_start();
    include "../db.php";
    //Nếu không phải là sự kiện đăng ký thì không xử lý
    if(!isset($_COOKIE['ID'])){
        header('Location: /index.php');
    }
   
    //Khai báo utf-8 để hiển thị được tiếng việt
    // header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
  
    $userID = $_COOKIE['ID'];   
    $newpass        = addslashes($_POST['newpass']);
    $re_newpass      = addslashes($_POST['re-newpass']);

    // Mã khóa mật khẩu

    $newpass = md5($newpass);
    $re_newpass = md5($re_newpass);

    $sql = "SELECT * FROM User where userID = '$userID' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    //Kiểm tra pass có chính xác không


     //Kiểm tra mật khẩu có trùng nhau không
     if($newpass != $re_newpass){
        echo "Mật khẩu không giống nhau! <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Cập nhật password
    @$updatemember = mysqli_query($conn," 
        UPDATE User
        SET passWord = '$newpass'
        WHERE userID='$userID'");
                          
    //Thông báo quá trình lưu
    if ($updatemember){
        // echo 'Ok!'; 
        header('Location: /index.php');

    }
    else{
        echo mysqli_error($conn);
        echo "Có lỗi xảy ra trong quá trình update. <a href='/User/UserInfo.php'>Thử lại</a>";
    }
?>