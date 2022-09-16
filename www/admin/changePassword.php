<?php
    ob_start();
    include "db.php";
    //Nếu không phải là sự kiện đăng ký thì không xử lý
    if(!isset($_POST['fullName'])){
        die('');
    }
   
    //Khai báo utf-8 để hiển thị được tiếng việt
    // header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $userID
    $currentpass    = addslashes($_POST['currentpass']);
    $newpass        = addslashes($_POST['newpass']);
    $renewpass      = addslashes($_POST['re-newpass']);


    //Kiểm tra pass có chính xác không
    if (mysqli_num_rows(mysqli_query($conn,"SELECT passWord FROM User WHERE email='$email'")) > 0)

    //Lưu thông tin thành viên vào bảng
    @$updatemember = mysqli_query($conn," 
        UPDATE User
        SET fullName = '$fullName', 
            phoneNumber = '$phoneNumber', 
            birthDay='$birthDay', 
            email='$email', 
            gender='$gender' 
        WHERE userID='$userID'");
                          
    //Thông báo quá trình lưu
    if ($updatemember)
        // echo 'Ok!';     
        header('Location: /User/UserInfo.php');
    else{
        echo mysqli_error($conn);
        echo "Có lỗi xảy ra trong quá trình update. <a href='/User/UserInfo.php'>Thử lại</a>";
    }
?>