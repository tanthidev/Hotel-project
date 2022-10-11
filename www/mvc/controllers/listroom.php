<?php 
    class listroom extends controller{
        static function default(){
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            //
            if(isset($_GET['page'])){
                $currentPage=$_GET['page'];
            }
            else {
                $currentPage=1;
            }
            //Rooms per page
            $roomPerPage=4;

            //Pagination
            $totalRoom= count(json_decode($room->getAllRoom()));
            $totalPage = ceil($totalRoom/$roomPerPage);
            $from = ($currentPage-1) * $roomPerPage;

            //GỌi view
            $view =self::view("sublayout",[
                "page"=>"listroom",
                "user"=> $user -> getUser(),
                "totalPage" => $totalPage,
                "rooms" => $room -> getLimitListRoom($from, $roomPerPage)
            ]);
        }
    }
?>