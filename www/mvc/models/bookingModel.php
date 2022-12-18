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

        public function confirmBooking($bookingID){
            $qr = "UPDATE Bookings SET confirmBooking = 'Yes' WHERE bookingID = '$bookingID'";
            $result = true;
            $a = mysqli_query($this -> conn, $qr);
            if(!$a){
                $result = false;
            }
            return $result;
        }

        public function getLimitNewBooking($from, $amount){
            $currentDate = date("d/m/Y");
            $qr = "SELECT * FROM `Bookings` ORDER BY dateBooking DESC limit $from, $amount";
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