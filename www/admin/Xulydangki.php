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
    $fullName   = addslashes($_POST['fullName']);
    $phoneNumber= addslashes($_POST['tel']);
    $email      = addslashes($_POST['email']);
    $pass   = addslashes($_POST['pass']);
    $re_pass   = addslashes($_POST['repeat-pass']);

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$fullName || !$phoneNumber || !$email || !$pass || !$re_pass)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
        $pass = md5($pass);
        $re_pass = md5($re_pass);
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT phoneNumber FROM member WHERE phoneNumber='$phoneNumber'")) > 0){
        echo "Số điện thoại đã được sử dụng!. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email có đúng định dạng hay không
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
    {
        echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Kiểm tra email đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM member WHERE email='$email'")) > 0)
    {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Kiểm tra mật khẩu có trùng nhau không
    if($pass != $re_pass){
        echo "Mật khẩu không giống nhau! <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lưu thông tin thành viên vào bảng
    @$addmember = mysqli_query($conn,"
        INSERT INTO member (fullName,phoneNumber,email,passWord)
        VALUE ('$fullName','$phoneNumber','$email','$pass')");
                          
    //Thông báo quá trình lưu
    if ($addmember)
        header('Location: /index.php');
    else{
        echo mysqli_error($conn);
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='http://localhost:8080/'>Thử lại</a>";
    }
?>