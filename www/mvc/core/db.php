<?php
    class db{
        public $conn;
        protected $host = 'mysql-server'; // tên mysql server
        protected $user = 'root';
        protected $pass = 'root';
        protected $db = 'CarltonHotelDatabase'; 
        
        function __construct(){    
            $this->conn = mysqli_connect($this -> host, $this -> user, $this -> pass);
            mysqli_select_db($this->conn, $this ->db);
            mysqli_query($this->conn, "SET NAMES 'utf8'");
        }
    }



?>
