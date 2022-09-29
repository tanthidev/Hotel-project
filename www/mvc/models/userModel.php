<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    ob_start();

    class userModel extends db{

        public function getUser(){
            if(isset($_SESSION['id'])){
                $id=$_SESSION['id'];
                $qr = "SELECT userID, fullName, phoneNumber, roles, email, gender from User where userID=$id";
                $rows = mysqli_query($this ->conn, $qr);
                $row = mysqli_fetch_array($rows);
                // echo $row['fullName'];
                // $array = array();
                // while($row = mysqli_fetch_array($rows)){
                //     $array = $row;
                // }
                return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            }
        }

        public function getAllUser(){
            $qr = "SELECT * from User";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_array($rows)){
                $array = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        //Get UserID 
        public function getID($phoneNumber){
            $qr = "SELECT userID from User where phoneNumber=$phoneNumber";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            $Id = $row['userID'];
            return $Id;
        }

        //Kiểm tra số điện thoại có tồn tại trong database
        public function checkExistphoneNumber($phoneNumber){
            $qr = "SELECT * FROM User WHERE phoneNumber='$phoneNumber'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại SDT ==> Trả về true
                return true;
            }

            return false;
        }

        //Kiểm tra email có tồn tại trong database
        public function checkExistEmail($email){
            $qr = "SELECT * FROM User WHERE phoneNumber='$email'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại email ==> Trả về true
                return true;
            }

            return false;
        }

        //Xử lý userID
        public function userIDProcessing(){
            $qr = "SELECT * FROM User WHERE userID = (SELECT max(userID) FROM User)";
            $result = $this ->conn->query($qr);
            $row = $result->fetch_assoc();
            $Id= $row['userID']+1;
            return $Id;
        }

        //Insert new User
        public function insertUser($userID,$fullName,$phoneNumber,$email,$pass){
            $qr ="INSERT INTO User (userID, fullName, phoneNumber, email, passWord)
                    VALUE ('$userID','$fullName','$phoneNumber','$email','$pass')";
            $result = false;
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }

            return $result;
        }

        //Kiểm tra mật khẩu đăng nhập
        public function checkPass($phoneNumber, $pass){
            $qr = "SELECT passWord, phoneNumber from User where phoneNumber=$phoneNumber";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            $check = password_verify($pass, $row['passWord']);
            return $check;
        }

    }
?>