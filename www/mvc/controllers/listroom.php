<?php 
    class listroom extends controller{
        static function default(){
            //Gọi Model
            $user = self::model('roomModel');

            //GỌi view
            $view =self::view("layoutmain",[
                "page"=>"home",
                "user"=> $user -> getUser()
            ]);
        }
    }
?>