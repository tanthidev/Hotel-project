<?php 
    class roomModel extends db{

        public function getAllRoomType(){
            $qr = "SELECT roomType from RoomType";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoomByPhoneNumber($phoneNumber){
            $qr = "SELECT roomNumber, Rooms.roomType, view, numberOfBed, area, guest, price, describeRoom 
                    FROM Rooms, RoomType 
                    WHERE Rooms.roomNumber = 'A0101' 
                    AND Rooms.roomType = RoomType.roomType;";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoomNumber($roomType, $numberOfRooms){
            $qr = " SELECT Rooms.roomNumber, RoomType.guest
                    FROM   Rooms, RoomType
                    WHERE  (Rooms.roomType = '$roomType') AND (RoomType.roomType = '$roomType')
                    LIMIT $numberOfRooms";
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
                mysqli_query($this -> conn, $qr);
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

        public function getLimitListRoom($from, $amount){
            $qr = " SELECT RoomType.roomType, RoomType.price, AvatarRoom.fileName, RoomType.guest, roomType.area, roomType.numberOfBed, roomType.describeRoom 
                    FROM   AvatarRoom, roomType 
                    WHERE (AvatarRoom.roomType = RoomType.roomType)
                    LIMIT $from, $amount";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getAvatarRoom($roomType){
            $qr = "SELECT fileName from AvatarRoom where roomType='$roomType'";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getImageRoom($roomType){
            $qr = "SELECT fileName from ImageRoom where roomType = '$roomType'";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoomType($roomType){
            $qr = "SELECT roomType, view, price, guest, area, numberOfBed, describeRoom 
                FROM roomType 
                WHERE (roomType = '$roomType')";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getFavoritesRoom(){
            $qr = "SELECT RoomType.roomType, RoomType.numberOfBed, RoomType.area, RoomType.guest, RoomType.price, AvatarRoom.fileName 
                    FROM RoomType, AvatarRoom
                    WHERE (RoomType.roomType = AvatarRoom.roomType) AND (RoomType.favorite='1')";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getRoomAvailble($roomType, $amount, $checkIn, $checkOut){
            // Get list room was booking 
            $qr = "SELECT roomNumber FROM RoomStatus WHERE ('$checkIn' BETWEEN checkIn AND checkOut) or ('$checkOut' BETWEEN checkIn AND checkOut) or (('$checkIn' < checkIn) and ('$checkOut' > checkOut))";
            $rows = mysqli_query($this -> conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }

            print_r($array);

            if($array!=null){
                // Neu co phong da duoc book
                $roomBooked = "'".$array[0]["roomNumber"]."'";
                foreach($array as $item){
                    $roomBooked = $roomBooked . ", '".$item["roomNumber"]."'";
                }
                $qr = "SELECT roomNumber 
                        FROM Rooms
                        WHERE (roomNumber not in ($roomBooked)) and (roomType = '$roomType') 
                        ORDER BY roomNumber 
                        LIMIT $amount";
            } else {
                //Lay thoai mai vi tat ca phong deu con trong
                $qr = "SELECT roomNumber 
                        FROM Rooms
                        WHERE (roomType = '$roomType') 
                        ORDER BY roomNumber 
                        LIMIT $amount";
            }

            $rows = mysqli_query($this -> conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }


        // get status room for show calendar
        public function getStatusRoom($roomType){
            $currentDate = date("d/m/Y");
            $qr = "SELECT roomNumber, checkIn, checkOut 
                    FROM RoomStatus 
                    WHERE (roomNumber in (SELECT roomNumber FROM Rooms WHERE RoomType = '$roomType')) AND (checkIn > '$currentDate')";
            $rows = mysqli_query($this -> conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    }


    }   

?>