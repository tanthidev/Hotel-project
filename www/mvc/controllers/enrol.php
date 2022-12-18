<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    ob_start();

class enrol extends controller{


        // LOGIN
        static function login(){
            //GỌi view
            $view =self::view("emptylayout",[
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
         
                //Kiểm tra tên đăng nhập có tồn tại không
                if (!($user -> checkExistphoneNumber($phoneNumber))) {
                    $textnotice="Phone number is incorrect!";
                        //GỌi view
                        $view =self::view("emptylayout",[
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
                        $view =self::view("emptylayout",[
                            "page"=>"login",
                            "notice" => $textnotice,
                            "check" => $checkLogin
                        ]);
                        exit;
                }
        
                //Lấy Id để tạo session
                $_SESSION['id'] = $user -> getID($phoneNumber);

                $roles = json_decode ($user ->getUser())->roles;
                if($roles=="2"){
                    header('Location: /admin/dashBoard');
                } else {
                    header('Location: /home');
                }

                //Lưu tên đăng nhập
                //Về Trang chủ
                exit;
            }

           
        }

        //REGISTER
        static function register(){
            //GỌi view
            $view =self::view("emptylayout",[
                "page"=>"register"
            ]);
        }

        //REGISTER PROCESSING
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
                
                

                // Mã hóa mật khẩu bằng BCrypt
                $pass = password_hash($pass, PASSWORD_DEFAULT);

                //Kiểm tra mật khẩu có trùng nhau không
                if(!password_verify($re_pass, $pass)){
                    $textnotice="Password không giống nhau!";
                    //GỌi view
                    $view =self::view("emptylayout",[
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
                    $view =self::view("emptylayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                }
                      

                //Lưu thông tin thành viên vào bảng
                $result = $user -> insertUser($fullName,$phoneNumber,$email,$pass);


                //Notice
                if($result){
                    $textnotice = "Đăng kí thành công";
                    $checkregister = true;
                    //GỌi view
                    $view =self::view("emptylayout",[
                        "page"=>"login",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                    exit;
                } else{
                    $textnotice = "Đăng kí thất bại";
                    //GỌi view
                    $view =self::view("emptylayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                        ]);
                    exit;
                }
            }
        }

        //LOGOUT
        static function logout(){
            if(isset($_SESSION['id'])&&($_SESSION['id']!="")){
                unset($_SESSION['id']);
                header('Location: /home');
            }
        }

        static function forgot(){
            $view = self::view("emptylayout",[
                "page" => "forgot"
            ]);
        }

        static function forgotprocessing(){
            //GỌI MODEL USER
            $user = self::model("userModel");
            //TEXT THÔNG BÁO LỖI
            $textnotice="";
            $check=false;
            if(isset($_POST['email'])){     
                //Lấy dữ liệu từ form
                $email  = addslashes($_POST['email']);

                //Kiểm tra mail định dạng mail
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $textnotice="Mail không đúng định dạng!";
                    //GỌi view
                    $view =self::view("emptylayout",[
                        "page"=>"forgot",
                        "notice" => $textnotice,
                        "check" => $check
                    ]);
                    exit;
                }
        
                //Kiểm tra mail có tồn tại không
                else{
                    if(!($user->checkExistEmail($email))){
                        // //Báo lỗi
                        $textnotice="Email không chính xác!";
                        //GỌi view
                        $view =self::view("emptylayout",[
                            "page"=>"forgot",
                            "notice" => $textnotice,
                            "check" => $check
                        ]);
                        exit;
                    }
                    else{      

                                    
                        include "./mvc/core/PHPMailer-master/src/PHPMailer.php";
                        include "./mvc/core/PHPMailer-master/src/Exception.php";
                        include "./mvc/core/PHPMailer-master/src/OAuthTokenProvider.php";
                        include "./mvc/core/PHPMailer-master/src/OAuth.php";
                        include "./mvc/core/PHPMailer-master/src/POP3.php";
                        include "./mvc/core/PHPMailer-master/src/SMTP.php";
                        //Get User
                        $row = json_decode($user -> getUserByEmail($email));
        
                        //Tiến hành gửi code confirm
                        $code = rand(100000,999999);
                        setcookie('code', $code, time() + 120);
                        setcookie('ID', $row->userID, time() + 120);
                        $mail = new PHPMailer;                              // Passing `true` enables exceptions
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'lenguyentanthi1806@gmail.com';                 // SMTP username
                            $mail->Password = 'bxbodkperbrhcdyn';                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to
                            //Recipients
                            $mail->setFrom('lenguyentanthi1806@gmail.com', 'ADMIN');
                            $mail->addAddress($email, 'Customer');     // Add a recipient
                            // $mail->addReplyTo('info@example.com', 'Information');
                            // $mail->addCC('cc@example.com');
                            // $mail->addBCC('bcc@example.com');
                        
                            //Attachments
                            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                        
                            //Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Carlton Hotel';
                            $mail->Body    = 'Code to reset password: '.$code.'';
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                            $mail->send();
                            
                            
                            //GỌi view
                            $textnotice = "Send code success!";
                            $view =self::view("emptylayout",[
                                "page"=>"confirmcode",
                                "notice" => $textnotice,
                                "check"=>true
                            ]);
                            exit;
                            }
        
                        catch (Exception $e) {
                            // echo '
                            // <div class="notice-task">
                            //     <span class="notice-text">Message could not be sent!</span>
                            // </div>';
                            echo $mail->ErrorInfo;
                            $textnotice = "Code could not be sent!";
                            $view =self::view("emptylayout",[
                                "page"=> "forgot",
                                "notice" => $textnotice,
                                "check" => $check
                            ]);
                            exit;
                        }
                    }
                }
            }
        }


        //Gọi view page conform code 
        static function confirmcode(){
            $view = self::view("simplelayout",[
                "page" => "confirmcode"
            ]);
        }

        static function confirmcodeprocessing(){
            $checkcodeinput=false;
            $check=false;
            

            if(!isset($_POST['code'])){
                $textnotice="Vui lòng nhập code!";
                //GỌi view
                $view =self::view("emptylayout",[
                    "page"=>"confirmcode",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;

                } else {

                    //Get code từ input
                    $codeinput  = addslashes($_POST['code']);

                    //Check code
                    if($codeinput==$_COOKIE['code']){
                        $checkcodeinput = true;
                        $ID = $_COOKIE['ID'];
                        // $sql = "SELECT * FROM User where userID = '$ID'";
                        // $result = $conn->query($sql);
                        // $row = $result->fetch_assoc();
                        //tạo lại cookie id để đăng nhập, có hiệu lực trong 2p
                        setcookie('ID', $ID, time() + 120);
                        //GỌi view
                        $view =self::view("emptylayout",[
                        "page"=>"confirmcode",
                        "checkcodeinput" => $checkcodeinput
                        ]);
                        exit;
                    } else{
                        $textnotice="Code không chính xác!";
                        //GỌi view
                        $view =self::view("emptylayout",[
                            "page"=>"confirmcode",
                            "notice" => $textnotice,
                            "check" => $check
                        ]);
                        exit;
                    }
            }
        }

        static function resetpass(){
            $textnotice="";
            $check = false;
            $user = self::model("userModel");

            if(!isset($_COOKIE['ID'])){
                $textnotice="Error when reset password!";
                $view = self::view("mainlayout",[
                    "page" => "home",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
            }
           
            //Khai báo utf-8 để hiển thị được tiếng việt
            // header('Content-Type: text/html; charset=UTF-8');
                  
          
            $userID = $_COOKIE['ID'];   
            $pass        = addslashes($_POST['newpass']);
            $re_pass      = addslashes($_POST['re-newpass']);
        
            // Mã khóa mật khẩu bằng BCrypt
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            //Kiểm tra mật khẩu có trùng nhau không
            if(!password_verify($re_pass, $pass)){
                $textnotice="Password không giống nhau!";
                //GỌi view
                $view =self::view("emptylayout",[
                    "page"=>"confirmcode",
                    "notice" => $textnotice,
                    "check" => $check,
                    "checkcodeinput" => true
                ]);
                exit;
            }
        
        
            //Cập nhật password
            $resultUpdate = $user -> updatePassword($userID, $pass);
            
            //Thông báo quá trình lưu
            if ($resultUpdate){
                // Update thành công
                $textnotice="Password was reset!";
                //GỌi view
                $view =self::view("mainlayout",[
                    "page"=>"home",
                    "notice" => $textnotice,
                    "check" => true
                ]);
                exit;
        
            }
            else{
                //Thất bại
                $textnotice="Error when reset password!";
                //GỌi view
                $view =self::view("mainlayout",[
                    "page"=>"home",
                    "notice" => $textnotice,
                    "check" => $check
                ]);
                exit;
            }
        }


    }
?>