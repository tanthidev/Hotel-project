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


            $bill = array(
                "room"=> [
                    "product" =>"",
                    "description" => "",
                    "quantity"  => "",
                    "guest"     => "",
                    "price"     =>"",
                    "unit"      =>"",
                    "amount"    =>""
                ],);

                
                

                //Get data from form
                $datefilter = explode(" - ", addslashes($_POST['datefilter']));
                $checkin = date_create(str_replace('/', '-', $datefilter[0]));
                $checkout = date_create(str_replace('/', '-', $datefilter[1]));
                // Calculates the difference between DateTime objects
                $datesOfStay = date_diff($checkin, $checkout);
                //amount is number of day guest stay
                $datesOfStay = $datesOfStay->format("%a");

                $guest= addslashes($_POST['guest']);
                $numberOfRooms = addslashes($_POST['numberOfRooms']);

                //Special request
                $request= addslashes($_POST['request']);

                // Number of room
                $numberOfRooms = addslashes($_POST['numberOfRooms']);

                // Room Type
                $roomType = addslashes($_GET['room']);

                // Get info guest
                $fullName = addslashes($_POST['fullName']);
                $email    = addslashes($_POST['email']);
                $phoneNumber = addslashes($_POST['phoneNumber']);

                // Process Service

                $totalMoneyPayment = 0;
                if(isset($_POST['btn-next'])){
                    if(isset($_POST['gym'])){
                        // array_unshift($services, json_decode($service -> getService('1')));
                        // $totalMoneyService += (int)(json_decode($service-> getService('1')) -> price);
                        $product = (json_decode($service -> getService('1'))-> nameService);
                        // $quantity = $guest;
                        $price = (int)(json_decode($service-> getService('1')) -> price);
                        $unit = (json_decode($service -> getService('1'))-> unit);
                        $amount = $price * $guest;
                        $totalMoneyPayment = $amount + $totalMoneyPayment;

                        $gym = array(
                            "product" =>"",
                            "description" => "",
                            "quantity"  => "",
                            "guest"     =>"",
                            "price"     => "",
                            "unit"      =>"",
                            "amount"    =>"",
                        );

                        $gym["product"] = $product;
                        // $gym["quantity"] = $quantity;
                        $gym["price"] = $price;
                        $gym["unit"] = $unit;
                        $gym["amount"] = $amount;  
                        $gym["guest"] = $guest;  
                        array_push($bill, $gym);
                    }
                    
                    if(isset($_POST['breakfast'])){
                        $product = (json_decode($service -> getService('2'))-> nameService);
                        // $quantity = $guest;
                        $price = (int)(json_decode($service-> getService('2')) -> price);
                        $unit = (json_decode($service -> getService('2'))-> unit);
                        $amount = $price * $guest * $datesOfStay;
                        $totalMoneyPayment = $totalMoneyPayment + $amount;
                        $breakfast = array(
                            "product" =>"",
                            "description" => "",
                            "quantity"  => "",
                            "guest"     =>"",
                            "price"     => "",
                            "unit"      =>"",
                            "amount"    =>"",
                        );

                        $breakfast["product"] = $product;
                        // $breakfast["quantity"] = $quantity;
                        $breakfast["price"] = $price;
                        $breakfast["unit"] = $unit.'/ Guest';
                        $breakfast["amount"] = $amount;  
                        $breakfast["guest"] = $guest;  
                        array_push($bill, $breakfast);
                         
                        // print_r($bill);

                    }
                    
                    if(isset($_POST['laundry'])){
                        $product = (json_decode($service -> getService('3'))-> nameService);
                        // $quantity = $guest;
                        $price = (int)(json_decode($service-> getService('3')) -> price);
                        $unit = (json_decode($service -> getService('3'))-> unit);
                        $amount = $price * $guest * $datesOfStay;
                        $totalMoneyPayment =  $totalMoneyPayment + $amount;

                        $laundry = array(
                            "product" =>"",
                            "description" => "",
                            "quantity"  => "",
                            "guest"     => "",
                            "price"     => "",
                            "unit"      =>"",
                            "amount"    =>"",
                        );

                        $laundry["product"] = $product;
                        // $laundry["quantity"] = $quantity;
                        $laundry["price"] = $price;
                        $laundry["unit"] = $unit.'/ Guest';
                        $laundry["amount"] = $amount; 
                        $laundry["guest"] = $guest; 
                        array_push($bill, $laundry);
                    }
        
                    if(isset($_POST['carrental'])){
                        $product = (json_decode($service -> getService('4'))-> nameService);
                        // $quantity = $guest;
                        $price = (int)(json_decode($service-> getService('4')) -> price);
                        $unit = (json_decode($service -> getService('4'))-> unit);
                        $amount = $price * $datesOfStay;
                        $totalMoneyPayment = $totalMoneyPayment + $amount;

                        $carrental = array(
                            "product" =>"",
                            "description" => "",
                            "quantity"  => "",
                            "guest"     => "",
                            "price"     => "",
                            "unit"      =>"",
                            "amount"    =>"",
                        );

                        $carrental["product"] = $product;
                        // $carrental["quantity"] = $quantity;
                        $carrental["price"] = $price;
                        $carrental["unit"] = $unit;
                        $carrental["amount"] = $amount;  
                        array_push($bill, $carrental);
                    }
        
                    if(isset($_POST['airport'])){
                        $product = (json_decode($service -> getService('5'))-> nameService);
                        // $quantity = $guest;
                        $price = (int)(json_decode($service-> getService('5')) -> price);
                        $unit = (json_decode($service -> getService('5'))-> unit);
                        $amount = $price;
                        $totalMoneyPayment = $totalMoneyPayment + $amount;
                        $airport = array(
                            "product" =>"",
                            "description" => "",
                            "quantity"  => "",
                            "guest"  =>"",
                            "price"     => "",
                            "unit"      =>"",
                            "amount"    =>"",
                        );

                        $airport["product"] = $product;
                        // $airport["quantity"] = $quantity;
                        $airport["price"] = $price;
                        $airport["unit"] = $unit;
                        $airport["amount"] = $amount;  
                        array_push($bill, $airport);
                    }
                }
                
                //Get room from database
                $roomNumbers = $room -> getRoomNumber($roomType, $numberOfRooms);

                $totalMoneyRoom = (int)(json_decode($room -> getRoomType($roomType))[0] -> price) * $datesOfStay * $numberOfRooms;

                $totalMoneyPayment = $totalMoneyRoom + $totalMoneyPayment;

                // $bill = array();
                
                
                $bill["room"]["product"] = $roomType;
                $bill["room"]["description"] = "View ".ucwords(json_decode($room -> getRoomType($roomType))[0]->view)." view<br>".json_decode($room -> getRoomType($roomType))[0]->numberOfBed." King Bed";
                $bill["room"]["quantity"] = $numberOfRooms;
                $bill["room"]["guest"] = $guest;
                $bill["room"]["price"] = (json_decode($room -> getRoomType($roomType))[0]->price);
                $bill["room"]["amount"] = $totalMoneyRoom;
                
                // Info guest

                $infoGuest = array(
                    "fullName" => $fullName,
                    "email"    => $email,
                    "phoneNumber"=> $phoneNumber,
                    "checkin"   => $datefilter[0],
                    "checkout"  => $datefilter[1],
                    "datesOfStay"=> $datesOfStay.' Night'
                );

                


                //Gọi view
                $view = self::view("emptylayout",[
                    "page"      => "completeBooking",
                    "user"      => $user -> getUser(),
                    "checkin"   => $datefilter[0],
                    "checkout"  => $datefilter[1],
                    "bill"      => $bill,
                    "infoGuest" => $infoGuest,
                    "TotalPayment"  => $totalMoneyPayment,
                    "request"   => $request,
                ]);

            
        }

        
        static function processBooking(){
            
        }
    }
?>