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
    header('Location: /index.php');
	exit;
}
?>