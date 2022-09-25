<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    class userModel extends db{
        public function getUser(){
            if(isset($_SESSION['id'])){
                $id=$_SESSION['id'];
                $qr = "SELECT roles, fullName, phoneNumber from User where userID=$id";
                return mysqli_query($this ->conn, $qr);
            }
            else   
                return "";
        }
    }
?>