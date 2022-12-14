<?php 
    ob_start();
    class admin extends controller{
        public function __construct(){
            $user = self::model("userModel");
            if(!isset($_SESSION['id']) || ((json_decode($user->getAdmin())->fullName==null))){
                header('Location: /home');         
            }
        }

        static function default(){
            //Gọi model user
            $user = self::model("userModel");
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard",
                "admin" => $user -> getAdmin()
            ]);
        }
        
        static function dashBoard(){
            //Gọi model user
            $user = self::model("userModel");
            $booking = self::model("bookingModel");
            $booking -> countBookings();

            
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard",
                "admin" => $user -> getAdmin(),
                "bookings" => $booking -> getLimitNewBooking(0, 10),
                "countBookings" => $booking -> countBookings(),
                "countUsers"    => $user -> countUsers(),
                "envenue"       => $booking -> revenue()
            ]);

        }

        // 
        static function bookingManager(){
            //Gọi model user
            $user = self::model("userModel");
            $booking = self::model("bookingModel");

            $bookingPerPage=12;
                //Get page from url
                if(isset($_GET['page'])){
                    $currentPage=$_GET['page'];
                }
                else {
                    $currentPage=1;
                }
                
                //Pagination
                $totalUser = count(json_decode($booking->getAllNewBooking()));
                $totalPage = ceil($totalUser/$bookingPerPage);
                $from = ($currentPage-1) * $bookingPerPage;
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"bookingManager",
                "admin" => $user -> getAdmin(),
                "totalPage"=> $totalPage,
                "bookings" => $booking -> getLimitNewBooking($from, $bookingPerPage),
            ]);
        }
        
        static function userManager(){
            //Gọi Model User
            $user = self::model("userModel");
            
                $userPerPage=12;
                //Get page from url
                if(isset($_GET['page'])){
                    $currentPage=$_GET['page'];
                }
                else {
                    $currentPage=1;
                }
                
                //Pagination
                $totalUser = count(json_decode($user->getAllUser()));
                $totalPage = ceil($totalUser/$userPerPage);
                $from = ($currentPage-1) * $userPerPage;
                //GỌi view
                $view =self::view("adminlayout",[
                    "page"=>"userManager",
                    "users" => $user->getLimUser($from, $userPerPage),
                    "totalPage"=> $totalPage,
                    "admin" => $user -> getAdmin(),

                ]);
            
            // 
            
        }

        static function roomManager(){
            //Gọi model user
            $user = self::model("userModel");
            //Gọi model room
            $room = self::model("roomModel");
            //
            $roomPerPage=12;
            //Get page from url
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            
            //Pagination
            $totalRoom = count(json_decode($room->getAllRoomType()));
            $totalPage = ceil($totalRoom/$roomPerPage);
            $from = ($currentPage-1) * $roomPerPage;
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"roomManager",
                "roomType" => $room -> getAllRoomType(),
                "users" => $user -> getUser(),
                "admin" => $user -> getAdmin(),
                "totalPage" => $totalPage,
                "rooms" => $room -> getLimitListRoom($from, $roomPerPage)
            ]);
        }

        static function serviceManager(){
            //Gọi model user
            $user = self::model("userModel");
            $sercice = self::model("serviceModel");
            $servicePerPage=8;
            //Get page from url
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            
            //Pagination
            $totalService = count(json_decode($sercice->getAllService()));
            $totalPage = ceil($totalService/$servicePerPage);
            $from = ($currentPage-1) * $servicePerPage;
            
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"serviceManager",
                "services" => $sercice->getLimitService($from, $servicePerPage),
                "totalPage"=> $totalPage,
                "admin" => $user -> getAdmin()
            ]);
        }

        static function addRoom(){
            //Gọi model user
            $user = self::model("userModel");
            
            if(isset($_POST['btn-add'])){
                $room = self::model("roomModel");
               
                //Get data from form
                $roomNumber     = addslashes($_POST['roomNumber']);
                $roomType       = addslashes($_POST['roomType']);
                $describe       = addslashes($_POST['roomDescribe']);
                
                // Kiểm tra Room Number
                if(($_POST['roomNumber']!=null)){
                    if($room -> checkExistRoomNumber($roomNumber)){
                        $textnotice="";
                        $check=false;
                        //Nếu trả về true => đã tồn tại 
                        $textnotice="Room number already in existence!";
                        //GỌi view
                        $view =self::view("adminlayout",[
                            "page"=>"roomManager",
                            "admin" => $user -> getAdmin(),
                            "roomType" => $room -> getRoomType(),
                            "notice" => $textnotice,
                            "check" => $check
                        ]);
                        exit;
                    }

                    $result = $room -> insertRoom($roomNumber, $roomType, $describe);
                    if(!$result){
                        $textnotice="";
                        $check=false;
                        //Nếu trả về true => đã tồn tại 
                        $textnotice="Error when add room!";
                        //GỌi view
                        $view =self::view("adminlayout",[
                            "page"=>"roomManager",
                            "admin" => $user -> getAdmin(),
                            "roomType" => $room -> getRoomType(),
                            "notice" => $textnotice,
                            "check" => $check
                        ]);
                        exit;
                    } else {
                        header("Location: /admin/roomManager");
                    }
                } 
                

                
                header("Location: /admin/roomManager");

            } else {
                header("Location: /admin/roomManager"); 
            }
        }

        static function addRoomType(){
            $user = self::model("userModel");

            if(isset($_POST['btn-add'])){
                $room = self::model("roomModel");

                $price      = addslashes($_POST['price']);
                $beds           = addslashes($_POST['beds']);
                $guest          = $beds *2;
                $area           = addslashes($_POST['area']);
                $roomType           = addslashes($_POST['roomtype']);
                $localImage= "./mvc/data/images/room/";
                $avatarName     = $_FILES["roomAvatar"]["name"];
                $tempAvatar     = $_FILES["roomAvatar"]["tmp_name"];
                $folderAvatar = $localImage . $avatarName;
                $roomImagesNames = $_FILES["roomImages"]["name"];
                $roomImagesTemps = $_FILES["roomImages"]["tmp_name"];
                $folderImages[]=null;
                $index=0;
                foreach($roomImagesNames as $roomImagesName){
                    $folderImages[$index] = $localImage . $roomImagesName;
                    $index++;
                }
                
                
                //Kiểm tra Avatar file
                if(($_FILES["roomAvatar"]['error'] != 0)){
                    $check=false;
                    $textnotice="Room Avatar can't empty!";
                    $view =self::view("adminlayout",[
                        "page"=>"roomManager",
                        "roomType" => $room -> getRoomType(),
                        "notice" => $textnotice,
                        "check" => $check,
                        "users" => $user -> getUser(),
                        "admin" => $user -> getAdmin()
                    ]);
                    exit;
                }
                

                //Kiểm tra room Image
                if(($_FILES["roomImages"]['error'][0]!=0)){
                    $check=false;
                    $textnotice="Room Image can't empty!";
                    $view =self::view("adminlayout",[
                        "page"=>"roomManager",
                        "roomType" => $room -> getRoomType(),
                        "notice" => $textnotice,
                        "check" => $check,
                        "users" => $user -> getUser(),
                        "admin" => $user -> getAdmin()
                    ]);
                    exit;
                }

                //Tiến hành insert vào bảng room type
                // $result = $room -> insertRoomType($roomType, $beds, $area, $guest, $price);
                
                // if(!$result){
                //     $check=false;
                //     $textnotice="Error when insert room type!";
                //     $view =self::view("adminlayout",[
                //         "page"=>"roomManager",
                //         "roomType" => $room -> getRoomType(),
                //         "notice" => $textnotice,
                //         "check" => $check,
                //         "users" => $user -> getUser(),
                //         "admin" => $user -> getAdmin()
                //     ]);
                //     exit;
                // }

                //Tiến hành lưu Avatar Image
                $room -> addRoomAvatar($avatarName, $roomType);
                if (!move_uploaded_file($tempAvatar, $folderAvatar)) {
                    //Báo lỗi
                    $check=false;
                        $textnotice="Error when save avatar!";
                        $view =self::view("adminlayout",[
                            "page"=>"roomManager",
                            "roomType" => $room -> getRoomType(),
                            "notice" => $textnotice,
                            "check" => $check,
                            "users" => $user -> getUser(),
                            "admin" => $user -> getAdmin()
                        ]);
                        exit;
                    //Xóa data vừa lưu vào Rooms 

                    //Xóa data vừa lưu vào RoomAvatar

                }

                //Tiến hành lưu Image Room[]
                $room -> addRoomImage($roomImagesNames, $roomType);
                for ($i = 0; $i < count($folderImages); $i++){
                    if (!move_uploaded_file($roomImagesTemps[$i], $folderImages[$i])) {
                        //Báo lỗi
                        $check=false;
                        $textnotice="Error when save image!";
                        $view =self::view("adminlayout",[
                            "page"=>"roomManager",
                            "roomType" => $room -> getRoomType(),
                            "notice" => $textnotice,
                            "check" => $check,
                            "users" => $user -> getUser(),
                            "admin" => $user -> getAdmin()
                        ]);
                        exit;
                        break;
                        //Xóa data vừa lưu vào Rooms 
    
                        //Xóa data vừa lưu vào RoomAvatar
    
                    }
                }

                header("Location: /admin/roomManager");

            }

        }

        static function settingRoom(){
            if(isset($_GET['room'])){
                 //Gọi model user
                $user = self::model("userModel");
                //Gọi model room
                $room = self::model("roomModel");


                //View
                $view =self::view("adminlayout",[
                    "page"=>"settingRoom",
                    "users" => $user -> getUser(),
                    "admin" => $user -> getAdmin(),
                    "room" => $room -> getRoomType($_GET['room']),
                    "avatarRoom" => $room -> getAvatarRoom($_GET['room']),
                    "imageRoom"  => $room -> getImageRoom($_GET['room']),
                    "roomNumbers" => $room -> getRoomNumbers($_GET['room']),
                    "roomTypes"  => $room -> getAllRoomType()
                ]);
            } else {
                header("Location: /admin/roomManager");
            }
        }

        static function changeInfoRoom(){
            $roomType = $_GET['room'];
            $newRoomType = $_POST['roomType'];
            $price = $_POST['price'];
            $beds = $_POST['beds'];
            $guest = $_POST['guest'];
            $area = $_POST['area'];
            $describe = $_POST['describe'];

            $room = self::model("roomModel");

            if(isset($_POST['save'])){
                $room -> changeInfoRoom($roomType, $newRoomType, $price, $beds, $guest, $area, $describe);
            }

            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
?>