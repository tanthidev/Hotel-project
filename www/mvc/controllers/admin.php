<?php 
    class admin extends controller{
        
        static function default(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard"
            ]);
        }
        
        static function dashBoard(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"dashBoard"
            ]);
        }

        // 
        static function bookingManager(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"bookingManager"
            ]);
        }
        
        static function userManager(){
            $user = self::model("userModel");
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"userManager",
                "fullUser" => $user->getAllUser()
            ]);
        }

        static function roomManager(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"roomManager"
            ]);
        }

        static function serviceManager(){
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"serviceManager"
            ]);
        }
    }
?>