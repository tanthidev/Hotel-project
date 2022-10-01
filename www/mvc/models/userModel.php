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

        //GET USER BY EMAIL
        public function getUserByEmail($email){
            $qr = "SELECT userID, fullName, email from User where email='$email'";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
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
            $qr = "SELECT * FROM User WHERE email='$email'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //Tồn tại email ==> Trả về true
                return true;
            }

            return false;
        
        }


        //Insert new User
        public function insertUser($fullName,$phoneNumber,$email,$pass){
            $qr ="INSERT INTO User (fullName, phoneNumber, email, passWord)
                    VALUE ('$fullName','$phoneNumber','$email','$pass')";
            $result = false;
            $a = mysqli_query($this -> conn, $qr);
            if($a){
                $result = true;
            }

            return $result;
        }

        //Update password
        public function updatePassword($userID, $pass){
            $qr = "UPDATE User SET passWord='$pass' WHERE userID='$userID'";
            $a = mysqli_query($this -> conn, $qr);
            $result = false;
            if($a){
                $result = true;
            }

            return $result;
        }

        //Kiểm tra mật khẩu đăng nhập bằng sđt
        public function checkPass($phoneNumber, $pass){
            $qr = "SELECT passWord, phoneNumber from User where phoneNumber=$phoneNumber";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            $check = password_verify($pass, $row['passWord']);
            return $check;
        }
        
        //Kiểm tra mật khẩu đăng nhập bằng ID
        public function checkPassByID($userID, $pass){
            $qr = "SELECT passWord, phoneNumber from User where userID='$userID'";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            $check = password_verify($pass, $row['passWord']);
            return $check;
        }

        //Update User
        public function updateUser($userID,$fullName,$phoneNumber,$email,$gender){
            $qr="UPDATE User
                SET fullName = '$fullName', 
                    phoneNumber = '$phoneNumber', 
                    email='$email', 
                    gender='$gender' 
                WHERE userID='$userID'";
            $a = mysqli_query($this -> conn, $qr);
            $result = false;
            if($a){
                $result = true;
            }
            return $result;
        }
    }
?>