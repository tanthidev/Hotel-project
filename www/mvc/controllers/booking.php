<?php 
    class booking extends controller{
        static function default(){
            $roomType=$_GET['room'];
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            //GỌi view
            $view =self::view("simplelayout",[
                "page"      =>"booking",
                "user"      => $user -> getUser(),
                "avatarRoom" => $room -> getAvatarRoom($roomType),
                "imageRoom" => $room -> getImageRoom($roomType),
                "room"      => $room -> getRoomType($roomType)
            ]);
        }

        static function completeBooking(){
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');

            //Gọi view
            $view =self::view("emptylayout",[
                "page"      =>"completeBooking",
                "user"      => $user -> getUser()
            ]);
        }
    }
?>