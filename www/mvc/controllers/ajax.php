<?php
    class ajax extends controller{
        public function __construct(){
            $room = self::model("roomModel");
        }

        //Check Exist room number
        public function checkRoomNumber(){
            $room = self::model("roomModel");
            $roomNumber = $_POST['roomNumber'];
            if($room -> checkExistRoomNumber($roomNumber)==true){
                echo "Room number already in existence!";
            } else 
                echo "";
        }

        //Check exist phone number
        public function checkPhoneNumber(){
            $user = self::model("userModel");
            $phoneNumber = $_POST['phoneNumber'];
            if($user -> checkExistphoneNumber($phoneNumber)==true){
                echo "Phone number already in existence!";
            }
        }

        //Check exist email
        public function checkEmail(){
            $user = self::model("userModel");
            $email = $_POST['email'];
            if($user -> checkExistEmail($email)==true){
                echo "Email already in existence!";
            }
        }
        //Check Exist room type
        public function checkRoomType(){
            $room = self::model("roomModel");
            $roomType = $_POST['roomType'];
            if($room -> checkExistRoomType($roomType)==true){
                echo "Room type already in existence!";
            }  else 
                echo "";
        }
    }
?>