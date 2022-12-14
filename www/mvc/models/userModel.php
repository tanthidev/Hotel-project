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

        public function countUsers(){
            $qr = "SELECT * FROM User";
            $rows = mysqli_query($this -> conn, $qr);
            $array = mysqli_num_rows($rows);
            return $array;
        }

        public function getAdmin(){
            if(isset($_SESSION['id'])){
                $id=$_SESSION['id'];
                $qr = "SELECT userID, fullName, phoneNumber, roles, email, gender from User where userID=$id && roles=2";
                $rows = mysqli_query($this ->conn, $qr);
                $row = mysqli_fetch_array($rows);
                return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            }
        }

        public function getAllUser(){
            $qr = "SELECT userID, fullName, phoneNumber, email, country, gender, passPort from User";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        // GET LIMIT USERS

        public function getLimUser($from, $amount){
            $qr = "SELECT userID, fullName, phoneNumber, email, country, gender, passPort from User limit $from, $amount";
            $rows = mysqli_query($this ->conn, $qr);
            $array = array();
            while($row = mysqli_fetch_assoc($rows)){
                $array[] = $row;
            }
            return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

        //Get UserID 
        public function getID($phoneNumber){
            $qr = "SELECT userID from User where phoneNumber='$phoneNumber'";
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

        //Ki???m tra s??? ??i???n tho???i c?? t???n t???i trong database
        public function checkExistphoneNumber($phoneNumber){
            $qr = "SELECT * FROM User WHERE phoneNumber='$phoneNumber'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //T???n t???i SDT ==> Tr??? v??? true
                return true;
            }

            return false;
        }

        //Ki???m tra email c?? t???n t???i trong database
        public function checkExistEmail($email){
            $qr = "SELECT * FROM User WHERE email='$email'";
            if (mysqli_num_rows(mysqli_query($this ->conn,$qr)) > 0){
                //T???n t???i email ==> Tr??? v??? true
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

        //Ki???m tra m???t kh???u ????ng nh???p b???ng s??t
        public function checkPass($phoneNumber, $pass){
            $qr = "SELECT passWord, phoneNumber from User where phoneNumber='$phoneNumber'";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            $check = password_verify($pass, $row['passWord']);
            return $check;
        }
        
        //Ki???m tra m???t kh???u ????ng nh???p b???ng ID
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