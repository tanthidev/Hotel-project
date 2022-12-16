<?php 
    if(!isset($_SESSION)){
        session_start();
        
    }
    ob_start();
    
    class user extends controller{
        public function __construct(){
            $user = self::model("userModel");
            if(!isset($_SESSION['id'])){
                header('Location: /home');         
            }
        }

        static function default(){
            //Gọi Model
            $user = self::model('userModel');
            //GỌi view
            $view =self::view("emptylayout",[
                "page"=>"user",
                "user"=> $user -> getUser()
            ]);
        }

        //CHANGE INFOMATION
        static function changeInfo(){
            $user = self::model("userModel");
            $check = false;
            $textnotice = "";
            //Nếu không phải là sự kiện đăng ký thì không xử lý
            if(!isset($_POST['btn-change-info'])){
                header('Location: /home');
                exit;
            }
        
            //Khai báo utf-8 để hiển thị được tiếng việt
            // header('Content-Type: text/html; charset=UTF-8');
                
            //Lấy dữ liệu từ file dangky.php
            $userID     = addslashes($_SESSION['id']);
            $fullName   = addslashes($_POST['fullName']);
            $phoneNumber= addslashes($_POST['phoneNumber']);
            $email      = addslashes($_POST['email']);
            $gender     = addslashes($_POST['gender']);
            $pass       = addslashes($_POST['password']);   
            //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
            if (!$fullName)
            {
                $textnotice="Full Name is require!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }

            //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
            if (!$phoneNumber)
            {
                $textnotice="Phone number is require!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }

            //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
            if (!$email)
            {
                $textnotice="Email is require!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
    
                
            //Kiểm tra email có đúng định dạng hay không
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email))
            {
                $textnotice="Email không đúng định dạng!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
            
            //Kiểm tra password

            if(!($user->checkPassByID($userID, $pass))){
                $textnotice="Password is incorrect!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
            

            //Lưu thông tin thành viên vào bảng
            $resultupdate=$user -> updateUser($userID,$fullName,$phoneNumber,$email,$gender);
                                
            //Thông báo quá trình lưu
            if ($resultupdate){
                $textnotice="Update thành công";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => true
                ]);
                exit;
            } else{
                $textnotice="Update thất bại";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
        }

        //CHANGE PASSWORD
        static function changePass(){
            $user = self::model("userModel");

            if(!isset($_POST['btn-change-pass'])){
                header('Location: /home');
                exit;
            }

            $check=false;
            $textnotice="";
           
            //Khai báo utf-8 để hiển thị được tiếng việt
            // header('Content-Type: text/html; charset=UTF-8');
                  
            //Lấy dữ liệu từ file dangky.php
          
            $userID = $_SESSION['id'];   
            $currentpass    = addslashes($_POST['currentpass']);
            $newpass        = addslashes($_POST['newpass']);
            $re_newpass      = addslashes($_POST['re-newpass']);
        

            // Mã khóa mật khẩu       
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);
        
          
            //Kiểm tra currentpass có chính xác không
        
            if (!($user->checkPassByID($userID, $currentpass))){
                $textnotice="Password is incorrect!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
        
        
             //Kiểm tra mật khẩu có trùng nhau không
             if(!(password_verify($re_newpass, $newpass))){
                $textnotice="Password is incorrect!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
        
            //Cập nhật password
            $resultupdate = $user->updatePassword($userID, $newpass);
                                  
            //Thông báo quá trình lưu
            if ($resultupdate){
                $textnotice="Update was success!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => true
                ]);
                exit;
        
            }
            else{
                $textnotice="Error when update!";
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"user",
                    "user"=> $user -> getUser(),
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
        }
    }
?>