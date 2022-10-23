<?php 
    class roomModel extends db{

        public function getAllRoom(){
            $qr = "SELECT roomNumber from Rooms";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoomType(){
            $qr = "SELECT roomType from RoomType";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function checkExistRoomNumber($roomNumber){
            $qr = "SELECT * FROM Rooms WHERE roomNumber='$roomNumber'";
            $result = false;
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại room number ==> Trả về true
                $result = true;
            }

            return $result;
            
        }

        public function checkExistRoomType($roomType){
            $qr = "SELECT * FROM RoomType WHERE roomType='$roomType'";
            $result = false;
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại room type ==> Trả về true
                $result = true;
            }

            return $result;
            
        }

        public function addRoomAvatar($filename, $roomType){
            $result = false;
            $qr = "INSERT INTO AvatarRoom (fileName, roomType) VALUES ('$filename', '$roomType')";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }
            return $result;
        }

        public function addRoomImage($fileNames, $roomType){
            foreach($fileNames as $fileName){
                $qr = "INSERT INTO ImageRoom (fileName, roomType) VALUES ('$fileName', '$roomType')";
                $a = mysqli_query($this -> conn, $qr);
            }
        }

        public function insertRoom($roomNumber, $roomType, $describe){
            $qr ="INSERT INTO Rooms (roomNumber, roomType, describeRoom)
                    VALUE ('$roomNumber','$roomType','$describe')";
            $result = "false";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = "true";
            }
            return $result;
        }

        public function insertRoomType($roomType, $beds, $area, $guest, $price){
            $qr ="INSERT INTO RoomType (roomType, numberOfBed, area, guest, price)
                    VALUE ('$roomType','$beds','$area', '$guest', '$price')";
            $result = "false";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = "true";
            }
            return $result;
        }

        // public function getLimitListRoom($from, $amount){
        //     $qr = " SELECT Rooms.roomNumber, Rooms.price, Rooms.roomType, AvatarRoom.localAvatar, RoomType.guest, roomType.area, roomType.numberOfBed, Rooms.describeRoom
        //             FROM Rooms, AvatarRoom, roomType
        //             WHERE (Rooms.roomNumber = AvatarRoom.roomNumber) AND (Rooms.roomType = RoomType.roomType)
        //             limit $from, $amount";
        //     $rows = mysqli_query($this ->conn, $qr);
        //     $array = array();
        //     while($row = mysqli_fetch_assoc($rows)){
        //         $array[] = $row;
        //     }
        //     return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        // }

        public function getAvatarRoom($roomNumber){
            $qr = "SELECT localAvatar from AvatarRoom where roomNumber='$roomNumber'";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getImageRoom($roomNumber){
            $qr = "SELECT localImage from ImageRoom where roomNumber = '$roomNumber'";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoom($roomNumber){
            $qr = " SELECT Rooms.roomNumber, Rooms.price, Rooms.roomType, RoomType.guest, roomType.area, roomType.numberOfBed, Rooms.describeRoom 
                FROM Rooms, roomType 
                WHERE (Rooms.roomNumber = '$roomNumber') AND (Rooms.roomType = RoomType.roomType);";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }



    }   

?>