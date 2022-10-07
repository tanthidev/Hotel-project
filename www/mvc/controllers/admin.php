<?php 
    ob_start();
    class admin extends controller{
        
        static function default(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard"
            ]);
        }
        
        static function dashBoard(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard"
            ]);
        }

        // 
        static function bookingManager(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"bookingManager"
            ]);
        }
        
        static function userManager(){
            
            $userPerPage=10;
            //Get page from url
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            //Gọi Model User
            $user = self::model("userModel");
            
            //Pagination
            $totalUser = count(json_decode($user->getAllUser()));
            $totalPage = ceil($totalUser/$userPerPage);
            $from = ($currentPage-1) * $userPerPage;
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"userManager",
                "users" => $user->getLimUser($from, $userPerPage),
                "totalPage"=> $totalPage
            ]);
        }

        static function roomManager(){
            $room = self::model("roomModel");
            
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"roomManager",
                "roomType" => $room -> getRoomType()
            ]);
        }

        static function serviceManager(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"serviceManager"
            ]);
        }

        static function addRoom(){
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
                        "roomType" => $room -> getRoomType(),
                        "notice" => $textnotice,
                        "check" => $check
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
                        "check" => $check
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
                        "check" => $check
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