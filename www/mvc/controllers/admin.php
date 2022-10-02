<?php 
    class admin extends controller{
        
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
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"userManager"
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