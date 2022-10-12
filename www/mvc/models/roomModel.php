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

        public function addRoomAvatar($filename, $roomNumber){
            $result = false;
            $qr = "INSERT INTO AvatarRoom (localAvatar, roomNumber) VALUES ('$filename', '$roomNumber')";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }
            return $result;
        }

        public function addRoomImage($roomImagesNames, $roomNumber){
            foreach($roomImagesNames as $roomImagesName){
                $qr = "INSERT INTO ImageRoom (localImage, roomNumber) VALUES ('$roomImagesName', '$roomNumber')";
                $a = mysqli_query($this -> conn, $qr);
            }
        }

        public function insertRoom($roomNumber, $roomType, $describe, $priceRoom){
            $qr ="INSERT INTO Rooms (roomNumber, roomType, describeRoom, price)
                    VALUE ('$roomNumber','$roomType','$describe', '$priceRoom')";
            $result = "false";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = "true";
            }
            return $result;
        }

        public function getLimitListRoom($from, $amount){
            $qr = " SELECT Rooms.roomNumber, Rooms.price, Rooms.roomType, AvatarRoom.localAvatar, RoomType.guest, roomType.area, roomType.numberOfBed, Rooms.describeRoom
                    FROM Rooms, AvatarRoom, roomType
                    WHERE (Rooms.roomNumber = AvatarRoom.roomNumber) AND (Rooms.roomType = RoomType.roomType)
                    limit $from, $amount";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

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