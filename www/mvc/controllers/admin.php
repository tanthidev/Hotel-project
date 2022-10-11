<?php 
    ob_start();
    class admin extends controller{
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
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard",
                "admin" => $user -> getAdmin()
            ]);
        }

        // 
        static function bookingManager(){
            //Gọi model user
            $user = self::model("userModel");
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"bookingManager",
                "admin" => $user -> getAdmin()
            ]);
        }
        
        static function userManager(){
            //Gọi Model User
            $user = self::model("userModel");
            // 
            $userPerPage=8;
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
                "admin" => $user -> getAdmin()
            ]);
        }

        static function roomManager(){
            //Gọi model user
            $user = self::model("userModel");
            //Gọi model room
            $room = self::model("roomModel");
            //
            $roomPerPage=6;
            //Get page from url
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            
            //Pagination
            $totalRoom = count(json_decode($room->getAllRoom()));
            $totalPage = ceil($totalRoom/$roomPerPage);
            $from = ($currentPage-1) * $roomPerPage;
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"roomManager",
                "roomType" => $room -> getRoomType(),
                "users" => $user -> getUser(),
                "admin" => $user -> getAdmin(),
                "totalPage" => $totalPage,
                "rooms" => $room -> getLimitListRoom($from, $roomPerPage)
            ]);
        }

        static function serviceManager(){
            //Gọi model user
            $user = self::model("userModel");
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"serviceManager",
                "users" => $user -> getUser(),
                "admin" => $user -> getAdmin()
            ]);
        }

        static function addRoom(){
            //Gọi model user
            $user = self::model("userModel");
            
            if(isset($_POST['btn-add'])){
                $room = self::model("roomModel");
                $localImage= "./mvc/data/images/";
                //Get data from form
                $roomNumber     = addslashes($_POST['roomNumber']);
                $roomType       = addslashes($_POST['roomType']);
                $priceRoom      = addslashes($_POST['priceRoom']);
                $avatarName     = $_FILES["roomAvatar"]["name"];
                $tempAvatar     = $_FILES["roomAvatar"]["tmp_name"];
                $folderAvatar = $localImage . $avatarName;
                $roomImagesNames = $_FILES["roomImages"]["name"];
                $roomImagesTemps = $_FILES["roomImages"]["tmp_name"];
                $describe       = addslashes($_POST['roomDescribe']);
                $folderImages[]=null;
                $index=0;
                foreach($roomImagesNames as $roomImagesName){
                    $folderImages[$index] = $localImage . $roomImagesName;
                    $index++;
                }

                
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
                } else {
                    $check=false;
                    $textnotice="Room number can't empty!";
                    $view =self::view("adminlayout",[
                        "page"=>"roomManager",
                        "admin" => $user -> getAdmin(),
                        "roomType" => $room -> getRoomType(),
                        "notice" => $textnotice,
                        "check" => $check
                    ]);
                    exit;
                }
                

                //Kiểm tra Room Type
                if ($roomType==""){
                    $textnotice="";
                    $check=false;
                    //Nếu trả về true => đã tồn tại 
                    $textnotice="Room type can't empty!";
                    //GỌi view
                    $view =self::view("adminlayout",[
                        "page"=>"roomManager",
                        "admin" => $user -> getAdmin(),
                        "roomType" => $room -> getRoomType(),
                        "notice" => $textnotice,
                        "check" => $check,
                        "users" => $user -> getUser()
                    ]);
                    exit;
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
                        "users" => $user -> getUser()
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
                        "users" => $user -> getUser()
                    ]);
                    exit;
                }

                //Tiến hành Insert vào table Rooms
                $result = $room -> insertRoom($roomNumber, $roomType, $describe, $priceRoom);
                

                //Tiến hành lưu Avatar Image
                $room -> addRoomAvatar($avatarName, $roomNumber);
                if (!move_uploaded_file($tempAvatar, $folderAvatar)) {
                    //Báo lỗi
                    echo "Error Image Room!";
                    //Xóa data vừa lưu vào Rooms 

                    //Xóa data vừa lưu vào RoomAvatar

                }
                //Tiến hành lưu Image Room[]
                $room -> addRoomImage($roomImagesNames, $roomNumber);
                for ($i = 0; $i < count($folderImages); $i++){
                    
                    if (!move_uploaded_file($roomImagesTemps[$i], $folderImages[$i])) {
                        //Báo lỗi
                        echo "Error Image Room!";
                        break;
                        //Xóa data vừa lưu vào Rooms 
    
                        //Xóa data vừa lưu vào RoomAvatar
    
                    }
                }

                header("Location: /admin/roomManager");

            }


            
        }
    }
?>