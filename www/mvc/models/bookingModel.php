<?php 
    class bookingModel extends db{
        public function addBooking($fullName, $phoneNumber, $email, $checkIn, $checkOut, $numberGuest, $specialReq, $dateBooking, $totalMoneyPaymentVAT){
            $result = false;
            $qr = "INSERT INTO Bookings (fullName, phoneNumber, email, checkIn, checkOut, numberGuest, dateBooking, specialReq, total) VALUES ('$fullName', '$phoneNumber', '$email', '$checkIn', '$checkOut', '$numberGuest', '$dateBooking', '$specialReq', '$totalMoneyPaymentVAT')";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }
            return $result;
        }

        public function addBookingService($services,$phoneNumber){
            // Get BookingiD
            $qr = "SELECT bookingID FROM Bookings WHERE phoneNumber = '$phoneNumber' ORDER BY bookingID DESC LIMIT 1";
            $rows = mysqli_query($this -> conn, $qr);
            $bookingID = mysqli_fetch_array($rows)['bookingID'];
            

            $result = true;
            foreach($services as $service){
                $nameService = $service["product"];
                $price = $service["price"];
                $total = $service["amount"];
                // Get ServiceID
                $qr = "SELECT serviceID FROM Services WHERE nameService = '$nameService'";
                $rows = mysqli_query($this -> conn, $qr);
                $serviceID = mysqli_fetch_array($rows)['serviceID'];
                               

                // Insert
                $qr = "INSERT INTO BookingService (bookingID, serviceID, price, total) VALUES ('$bookingID', '$serviceID', '$price', '$total')";
                $a = mysqli_query($this -> conn, $qr);

                if(!($a)){
                    $result = false;
                    return $result;
                }
            }

            return $result;
        }

        public function getBooking($phoneNumber){
            $qr = "SELECT * FROM Bookings WHERE phoneNumber = '$phoneNumber' ORDER BY bookingID DESC LIMIT 1";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_fetch_array($rows);
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getBookingByCode($code){
            $qr ="SELECT FullName, email, phoneNumber, checkIn, checkOut, dateBooking, numberGuest, total, specialReq FROM Bookings WHERE BookingCode = '$code'";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_fetch_array($rows);
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function addRoomStatus($rooms, $phoneNumber, $checkIn, $checkOut){
            // Get BookingiD
            $qr = "SELECT bookingID FROM Bookings WHERE phoneNumber = '$phoneNumber' ORDER BY bookingID DESC LIMIT 1";
            $rows = mysqli_query($this -> conn, $qr);
            $bookingID = mysqli_fetch_array($rows)['bookingID'];
            $result = true;
            foreach($rooms as $room){
                $roomNumber = $room["roomNumber"];
                $price =    $room["price"];
                $total = $room["total"];

                // Insert
                $qr = "INSERT INTO RoomStatus (bookingID, roomNumber, checkIn, checkOut, price, total) VALUES ('$bookingID', '$roomNumber', '$checkIn', '$checkOut','$price', '$total')";
                $a = mysqli_query($this -> conn, $qr);
                if(!($a)){
                    $result = false;

                    return $result;
                } else {
                }
            }
            
            return $result;
        }

        public function confirmBooking($bookingCode){
            $qr = "UPDATE Bookings SET confirmBooking = 'Yes' WHERE bookingCode = '$bookingCode'";
            $result = true;
            $a = mysqli_query($this -> conn, $qr);
            if(!$a){
                $result = false;
            }
            return $result;
        }

        public function getproductRoom($code){
            $qr ="SELECT RoomType.roomType,RoomType.view, RoomType.numberOfBed, RoomType.price 
                    FROM RoomType, Rooms 
                    WHERE (RoomType.roomType = Rooms.roomType) AND (Rooms.roomNumber = (SELECT RoomStatus.roomNumber 
                                                                                        FROM Bookings, RoomStatus 
                                                                                        WHERE (Bookings.bookingID = RoomStatus.bookingID)
                                                                                         AND (Bookings.BookingCode = '$code') 
                                                                                         LIMIT 1))";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function checkCode($code){
            $qr = "SELECT * FROM Bookings WHERE bookingCode='$code'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại Code ==> Trả về true
                return true;
            }
            return false;
        }

        public function getLimitNewBooking($from, $amount){
            $currentDate = date("d/m/Y");
            $qr = "SELECT * FROM Bookings ORDER BY dateBooking DESC limit $from, $amount";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getBookingByPhoneNumber($phoneNumber){
            $qr = "SELECT * FROM Bookings WHERE phoneNumber = '$phoneNumber'";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getAllNewBooking(){
            $currentDate = date("d/m/Y");
            $qr = "SELECT * FROM `Bookings` WHERE checkIn > '$currentDate'";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function getNewBookingID($phoneNumber){
            $qr = "SELECT bookingID FROM Bookings WHERE phoneNumber = '$phoneNumber' ORDER BY dateBooking DESC LIMIT 1";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        public function countBookings(){
            $qr = "SELECT * FROM Bookings";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_num_rows($rows);
            return $array;
        }

        public function countQuantityRoom($code){
            $qr="SELECT count(RoomStatus.roomNumber) 
                    FROM Bookings, RoomStatus 
                    WHERE (Bookings.bookingID = RoomStatus.bookingID)
                    AND (Bookings.BookingCode = '$code')";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_num_rows($rows);
            return $array;
        }

        public function revenue(){
            $qr = "SELECT sum(total) AS 'envenue' from Bookings ";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_fetch_array($rows);
            return $array['envenue'];
        }

        public function insertBookingCode($ID, $bookingCode){
            $result = false;
            $qr = "UPDATE Bookings SET BookingCode = '$bookingCode' WHERE bookingID = '$ID'";
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }
            return $result;
        }

    }
?>