<?php 
    class booking extends controller{
        static function default(){
            $roomType=$_GET['room'];
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            
            

            //Gọi view
            $view =self::view("simplelayout",[
                "page"      =>"booking",
                "user"      => $user -> getUser(),
                "avatarRoom" => $room -> getAvatarRoom($roomType),
                "imageRoom" => $room -> getImageRoom($roomType),
                "room"      => $room -> getRoomType($roomType), 
                "roomStatus"=> $room -> getStatusRoom($roomType),
            ]);
        }

        static function completeBooking(){
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            $service = self::model('serviceModel');
            $booking = self::model('bookingModel');
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

                $services = array();
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
                        array_push($services, $gym);
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
                        array_push($services, $breakfast);

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
                        array_push($services, $laundry);

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
                        array_push($services, $carrental);
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
                        array_push($services, $airport);
                    }
                }
                
                //Get room from database
                $roomNumbers = json_decode($room -> getRoomAvailble($roomType, $numberOfRooms, $datefilter[0], $datefilter[1]));    
                

                $totalMoneyRoom = (int)(json_decode($room -> getRoomType($roomType))[0] -> price) * $datesOfStay * $numberOfRooms;

                $totalMoneyPayment = $totalMoneyRoom + $totalMoneyPayment;
                
                
                $bill["room"]["product"] = $roomType;
                $bill["room"]["description"] = "View ".ucwords(json_decode($room -> getRoomType($roomType))[0]->view)." view<br>".json_decode($room -> getRoomType($roomType))[0]->numberOfBed." King Bed";
                $bill["room"]["quantity"] = $numberOfRooms;
                $bill["room"]["guest"] = $guest;
                $bill["room"]["price"] = (json_decode($room -> getRoomType($roomType))[0]->price);
                $bill["room"]["amount"] = $totalMoneyRoom;
                
                $roomBooking = array();
                foreach($roomNumbers as $roomNumber){
                    $a = array(
                        "roomNumber" => $roomNumber-> roomNumber,
                        "price"      => json_decode($room -> getRoomByPhoneNumber($phoneNumber))[0]->price,
                        "total"      => json_decode($room -> getRoomByPhoneNumber($phoneNumber))[0]->price * $datesOfStay,
                    );
                    array_push($roomBooking, $a);
                    
                }

                //Get time booking
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $dateBooking = date("H:i:s d-m-Y");


                //Save into database
                // $booking -> addBooking($fullName, $phoneNumber, $email, $datefilter[0], $datefilter[1], $guest, $request, $dateBooking);
                // $booking -> addBookingService($services, $phoneNumber);
                // $booking -> addRoomStatus($roomBooking, $phoneNumber, $datefilter[0], $datefilter[1]);



                // Info guest
                $infoGuest = array(
                    "fullName" => $fullName,
                    "email"    => $email,
                    "phoneNumber"=> $phoneNumber,
                    "checkin"   => $datefilter[0],
                    "checkout"  => $datefilter[1],
                    "datesOfStay"=> $datesOfStay.' Night'
                );
                $booking = json_decode($booking -> getBooking($phoneNumber));
                $bookingId = $booking -> bookingID;
                $dateBooking = $booking -> dateBooking;
                //Gọi view
                $view = self::view("emptylayout",[
                    "page"      => "completeBooking",
                    "user"      => $user->getUser(),
                    "checkin"   => $datefilter[0],
                    "checkout"  => $datefilter[1],
                    "bill"      => $bill,
                    "infoGuest" => $infoGuest,
                    "TotalPayment"  => $totalMoneyPayment,
                    "request"   => $request,
                    "dateBooking"=> $dateBooking,
                    "bookingId" => $bookingId,

                ]);
        }

        static function confirmBooking(){
            // Goi models
            $booking = self::model("bookingModel");
            $user = self::model('userModel');


            $bookingId = $_GET['bookingId'];
            $result = $booking -> confirmBooking($bookingId);
            if($result){
                header("Location: /notice?result=success");
            } else {
                // View
                $view = self::view("emptylayout",[
                    "page"      => "noticePage",
                    "user"      => $user->getUser(),
                    "result"    => "fail"
                ]); 
            }
        }
        

        
        static function processBooking(){
            
        }
    }
?>