<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    class userModel extends db{
        public function getUser(){
            if(isset($_SESSION['id'])){
                $id=$_SESSION['id'];
                $qr = "SELECT * from User where userID=$id";
                $rows = mysqli_query($this ->conn, $qr);
                $array = array();
                while($row = mysqli_fetch_array($rows)){
                    $array = $row;
                }
                return json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            }
            else   
                return "";
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

        
    }
?>