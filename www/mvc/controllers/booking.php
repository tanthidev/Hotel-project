<?php 
    class booking extends controller{
        static function default(){
            $roomNumber=$_GET['room'];
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            //GỌi view
            $view =self::view("simplelayout",[
                "page"=>"booking",
                "user"=> $user -> getUser(),
                "avatarRoom" => $room -> getAvatarRoom($roomNumber),
                "imageRoom"  => $room -> getImageRoom($roomNumber)
            ]);
        }
    }
?>