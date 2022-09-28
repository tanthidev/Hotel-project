<?php 

    class enrol extends controller{

        // LOGIN
        static function login(){
            //GỌi view
            $view =self::view("simplelayout",[
                "page"=>"login"
            ]);
        }

        static function loginprocessing(){
            //Get data from User's form


            //Check login 


            //Notice
        }

        //REGISTER
        static function register(){
            //GỌi view
            $view =self::view("simplelayout",[
                "page"=>"register"
            ]);
        }

        static function registerprocessing(){
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
                if (!$fullName || !$phoneNumber || !$email || !$pass || !$re_pass)
                {
                    $textnotice="Vui lòng nhập đầy đủ thông tin.";
                    //GỌi view
                    $view =self::view("simplelayout",[
                        "page"=>"register",
                        "notice" => $textnotice,
                        "check" => $checkregister
                    ]);
                }
                      
                // Mã khóa mật khẩu
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
                }

                //Kiểm tra tên đăng nhập này đã có người dùng chưa
                if (mysqli_num_rows(mysqli_query($conn,"SELECT phoneNumber FROM User WHERE phoneNumber='$phoneNumber'")) > 0){
                    echo "Số điện thoại đã được sử dụng!. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
            
            
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                      
                //Kiểm tra email đã có người dùng chưa
                if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM User WHERE email='$email'")) > 0)
                {
                    echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
            

                
            
            
                //Xử lý userID
                $sql = "SELECT * FROM User WHERE userID = (SELECT max(userID) FROM User)";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $userID = $row['userID']+1;
                //Lưu thông tin thành viên vào bảng
                @$addmember = mysqli_query($conn,"
                    INSERT INTO User (userID,fullName,phoneNumber,email,passWord)
                    VALUE ('$userID','$fullName','$phoneNumber','$email','$pass')");
        
                    //Notice
            }
        

        }



    }
?>