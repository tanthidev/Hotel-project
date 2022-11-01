<?php 
    class booking extends controller{
        static function default(){
            $roomType=$_GET['room'];
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            //GỌi view
            $view =self::view("simplelayout",[
                "page"      =>"booking",
                "user"      => $user -> getUser(),
                "avatarRoom" => $room -> getAvatarRoom($roomType),
                "imageRoom" => $room -> getImageRoom($roomType),
                "room"      => $room -> getRoomType($roomType)
            ]);
        }

        static function completeBooking(){
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            $service = self::model('serviceModel');

            if(isset($_POST['btn-next'])){
                //Get data from form
            $datefilter = explode(" - ", addslashes($_POST['datefilter']));
            $checkin = date_create(str_replace('/', '-', $datefilter[0]));
            $checkout = date_create(str_replace('/', '-', $datefilter[1]));
            // Calculates the difference between DateTime objects
            $amount = date_diff($checkin, $checkout);
            //amount is number of day guest stay
            $amount = $amount->format("%a");

            $guest= addslashes($_POST['guest']);
            $numberOfRooms = addslashes($_POST['numberOfRooms']);

            //Special request
            $request= addslashes($_POST['request']);

            // Number of room
            $numberOfRooms = addslashes($_POST['numberOfRooms']);

            // Room Type
            $roomType = addslashes($_GET['room']);

            // Process Service
            $services [] = null;
            $totalMoneyService=0;
            if(isset($_POST['btn-next'])){
                if(isset($_POST['gym'])){
                    array_unshift($services, json_decode($service -> getService('1')));
                    $totalMoneyService += (int)(json_decode($service-> getService('1')) -> price);
                }
                
                if(isset($_POST['breakfast'])){
                    array_unshift($services, json_decode($service -> getService('2')));
                    $totalMoneyService += (int)(json_decode($service-> getService('2')) -> price)* $amount;
                }
                
                if(isset($_POST['laundry'])){
                    array_unshift($services, json_decode($service -> getService('3')));
                    $totalMoneyService += (int)(json_decode($service-> getService('3')) -> price)* $amount;
                }
    
                if(isset($_POST['carrental'])){
                    array_unshift($services, json_decode($service -> getService('4')));
                    $totalMoneyService += (int)(json_decode($service-> getService('4')) -> price) * $amount;
                }
    
                if(isset($_POST['airport'])){
                    array_unshift($services, json_decode($service -> getService('5')));
                    $totalMoneyService += (int)(json_decode($service-> getService('5')) -> price);
                }
            }
            
            //Get room from database
            $roomNumbers = $room -> getRoomNumber($roomType, $numberOfRooms);

            $totalMoneyRoom = (int)(json_decode($room -> getRoomType($roomType))[0] -> price) * $amount;

            $totalMoneyPayment = $totalMoneyRoom + $totalMoneyService;


            //Gọi view
            $view =self::view("emptylayout",[
                "page"      =>"completeBooking",
                "user"      => $user -> getUser(),
                "checkin"   => $datefilter[0],
                "checkout"  => $datefilter[1],
                "amount"    => $amount,
                "services"  => $services,
                "request"   => $request,
                "roomNumbers"=> json_decode($roomNumbers),
                "roomType"  => $room -> getRoomType($roomType),
                "moneyRoom" => $totalMoneyRoom,
                "moneyService"=> $totalMoneyService,
                "moneyPayment"=> $totalMoneyPayment
            ]);

        }

            
            


            
        }
    }
?>