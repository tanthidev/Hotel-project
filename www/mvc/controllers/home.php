<?php 

    class home extends controller{
        static function default(){
            //Gọi Model
            $user = self::model('userModel');
            $room = self::model('roomModel');
            //GỌi view
            $view =self::view("mainlayout",[
                "page"=>"home",
                "user"=> $user -> getUser(),
                "favorateRoom" => $room -> getRandomRoom()
            ]);
        }
    }
?>