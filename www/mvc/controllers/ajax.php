<?php
    class ajax extends controller{
        public function __construct(){
            $room = self::model("roomModel");
        }

        public function checkRoomNumber(){
            $room = self::model("roomModel");
            $roomNumber = $_POST['roomNumber'];
            if($room -> checkExistRoomNumber($roomNumber)==true){
                echo "Room number already in existence!";
            }
        }
    }
?>