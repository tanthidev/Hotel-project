<?php 
    class booking extends controller{
        static function default(){
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            //GỌi view
            $view =self::view("sublayout",[
                "page"=>"booking",
                "user"=> $user -> getUser()

            ]);
        }
    }
?>