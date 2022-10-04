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
            //Users per page
            $userPerPage=10;

            //Get page from url
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            //Gọi Model User
            $user = self::model("userModel");
            $totalUser = count(json_decode($user->getAllUser()));
            $totalPage = ceil($totalUser/$userPerPage);

            $from = ($currentPage-1) * $userPerPage;


            
            //GỌi view
            $view =self::view("adminlayout",[
                "page"=>"userManager",
                "users" => $user->getLimUser($from, $userPerPage),
                "totalPage"=> $totalPage,
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