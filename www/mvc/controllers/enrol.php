<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ob_start();

class enrol extends controller{


        // LOGIN
        static function login(){
            //GỌi view
            $view =self::view("simplelayout",[
                "page"=>"login"
            ]);
        }

        static function loginprocessing(){
            //Gọi model User
            $user = self::model("userModel");

            //Get data from User's form
            if(isset($_POST['btnLogin'])){
                $phoneNumber= addslashes($_POST['tel']);
                $pass= addslashes($_POST['pass']);   
            
                $textnotice="";
                $checkLogin=false;
    
                //Check login 
                //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
                if (!$phoneNumber || !$pass) {
                    //Kiểm tra ng;ười dùng đã nhập liệu đầy đủ chưa
                    if ($phoneNumber || !$pass){
                        $textnotice="Vui lòng nhập đầy đủ thông tin.";
                        //GỌi view
                        $view =self::view("simplelayout",[
                            "page"=>"login",
                            "notice" => $textnotice,
                            "check" => $checkLogin
                        ]);
                        exit;
                    }
                }
    
         
                //Kiểm tra tên đăng nhập có tồn tại không
                if (!($user -> checkExistphoneNumber($phoneNumber))) {
                    $textnotice="Phone number is incorrect!";
                        //GỌi view
                        $view =self::view("simplelayout",[
                            "page"=>"login",
                            "notice" => $textnotice,
                            "check" => $checkLogin
                        ]);
                        exit;
                }
         
                //So sánh 2 mật khẩu có trùng khớp hay không
                if (!($user -> checkPass($phoneNumber, $pass))) {
                    $textnotice="Password is incorrect!";
                        //GỌi view
                        $view =self::view("simplelayout",[
                            "page"=>"login",
                            "notice" => $textnotice,
                            "check" => $checkLogin
                        ]);
                        exit;
                }
        
                //Lấy Id để tạo session
                $_SESSION['id'] = $user -> getID($phoneNumber);
                echo $_SESSION['id'];

                //Lưu tên đăng nhập
                //Về Trang chủ
                header('Location: /home');
                exit;
    
            
            }

           
        }

        //REGISTER
        static function register(){
            //GỌi view
            $view =self::view("simplelayout",[
                "page"=>"register"
            ]);
        }

        static function registerprocessing(){
            //Gọi Model User
            $user = self::model("userModel");

            //Get data from User's form
            if(isset($_POST['btnRegister'])){
                $fullName   = addslashes($_POST['fullName']);
                $phoneNumber= addslashes($_POST['tel']);
                $email      = addslashes($_POST['email']);
                $pass   = addslashes($_POST['pass']);
                $re_pass   = addslashes($_POST['repeat-pass']);
        
        
                //Check login
                $textnotice="";
                $checkregister=false;
                
                //Kiểm tra ng;ười dùng đã nhập liệu đầy đủ chưa
                if (!$fullName || !$phoneNumber || !$email || !$pass || !$re_pass){
                    $textnotice="Vui lòng nhập đầy đủ thông tin.";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }

                //Kiểm tra tên đăng nhập này đã có người dùng chưa
                if ($user -> checkExistphoneNumber($phoneNumber)){
                    //Nếu trả về true => đã tồn tại 
                    $textnotice="Số điện thoại đã được sử dụng!";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }
                

                // Mã khóa mật khẩu bằng BCrypt
                $pass = password_hash($pass, PASSWORD_DEFAULT);

                //Kiểm tra mật khẩu có trùng nhau không
                if(!password_verify($re_pass, $pass)){
                    $textnotice="Password không giống nhau!";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }


            
                //Kiểm tra mail có đúng định dạng không 
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $textnotice="Email không hợp lệ!";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }
                      
                //Kiểm tra email đã có người dùng chưa
                if ($user -> checkExistEmail($email)){              
                    $textnotice="Email đã được dụng!";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }
            

                
                //Xử lý userID
                $userID = $user -> userIDProcessing();

                //Lưu thông tin thành viên vào bảng
                $result = $user -> insertUser($userID,$fullName,$phoneNumber,$email,$pass);


                //Notice
                if($result){
                    $textnotice = "Đăng kí thành công";
                    $checkregister = true;
                } else{
                    $textnotice = "Đăng kí thất bại";
                }
                
                //GỌi view
                $view =self::view("simplelayout",[
                    "page"=>"register",
                    "notice" => $textnotice,
                    "check" => $checkregister
                ]);
                exit;
            }
        

        }

        static function logout(){
            if(isset($_SESSION['id'])&&($_SESSION['id']!="")){
                unset($_SESSION['id']);
                header('Location: /home');
            }
        }



    }
?>