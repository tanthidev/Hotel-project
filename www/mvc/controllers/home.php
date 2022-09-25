<?php 

    class home extends controller{
        static function default(){
            //Gọi Model
            $user = self::model('userModel');

            //GỌi view
            $view =self::view("mainlayout",[
                "page"=>"home",
                "user"=> $user -> getUser()
            ]);
        }
    }
?>