<?php 
    class notice extends controller{
        static function default(){
            $user = self::model('userModel');
            $view = self::view("emptylayout",[
                "page"      => "noticePage",
                "user"      => $user->getUser()]);
        }
    }
?>