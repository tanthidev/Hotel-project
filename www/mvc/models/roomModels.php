<?php 
    class roomModel extends db{
        public function getRoom(){
            static function default(){
                //Gọi Model
                $room = self::model('userModel');
    
                //GỌi view
                $view =self::view("layoutmain",[
                    "page"=>"home",
                    "user"=> $user -> getUser()
                ]);
            }
        }
    }

?>