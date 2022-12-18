<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class booking extends controller{
        static function default(){
            $roomType=$_GET['room'];
            //Gọi Model
            $room = self::model('roomModel');
            $user = self::model('userModel');
            
            $booking = self::model('bookingModel');

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
                // VAT: 8%
                $totalMoneyPaymentVAT= $totalMoneyPayment + $totalMoneyPayment*0.08;
                
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
                $booking -> addBooking($fullName, $phoneNumber, $email, $datefilter[0], $datefilter[1], $guest, $request, $dateBooking, $totalMoneyPaymentVAT);
                $booking -> addBookingService($services, $phoneNumber);
                $booking -> addRoomStatus($roomBooking, $phoneNumber, $datefilter[0], $datefilter[1]);


                // Create booking Code 
                $ID = json_decode($booking -> getNewBookingID($phoneNumber))[0]->bookingID;
                $prefix = str_replace("/", "", date("d/m/Y"));
                $bookingCode = $prefix.$ID;
                $booking -> insertBookingCode($ID, $bookingCode);

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
                    "totalVAT"  => $totalMoneyPaymentVAT,
                    "request"   => $request,
                    "dateBooking"=> $dateBooking,
                    "bookingId" => $bookingId,
                    "VAT"       => $totalMoneyPayment*0.08,
                    "bookingCode" => $bookingCode
                ]);
        }

        static function confirmBooking(){
            // Goi models
            $booking = self::model("bookingModel");
            $user = self::model('userModel');

            $email = $_GET['email'];
            $bookingCode = $_GET['bookingCode'];
            $result = $booking -> confirmBooking($bookingCode);


            if($result){
                include "./mvc/core/PHPMailer-master/src/PHPMailer.php";
                include "./mvc/core/PHPMailer-master/src/Exception.php";
                include "./mvc/core/PHPMailer-master/src/OAuthTokenProvider.php";
                include "./mvc/core/PHPMailer-master/src/OAuth.php";
                include "./mvc/core/PHPMailer-master/src/POP3.php";
                include "./mvc/core/PHPMailer-master/src/SMTP.php";
                
                $mail = new PHPMailer;   
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'lenguyentanthi1806@gmail.com';                 // SMTP username
                $mail->Password = 'bxbodkperbrhcdyn';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                //Recipients
                $mail->setFrom('lenguyentanthi1806@gmail.com', 'ADMIN');
                $mail->addAddress($email, 'Customer');     // Add a recipient
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Thanks for your booking Carlton Hotel!';
                $mail->Body    = $bookingCode.' is your booking code. You can use it for see you envoice.';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                
                

                header("Location: /notice?result=success");
            } else {
                header("Location: /notice?result=fail"); 
            }
        }
        
        static function yourBooking(){
            if($_GET['code']!=""){
                $code = $_GET['code'];
                $booking = self::model("bookingModel");
                $service = self::model("serviceModel");
                $checkCode = $booking -> checkCode($code);
                $guest = json_decode($booking -> getBookingByCode($code));

                // Date of stay
                $checkin = date_create(str_replace('/', '-', $guest->checkIn));
                $checkout = date_create(str_replace('/', '-', $guest->checkOut));
                $datesOfStay = date_diff($checkin, $checkout);
                //amount is number of day guest stay
                $datesOfStay = $datesOfStay->format("%a");

                if($checkCode){



                    $view = self::view("emptylayout",[
                        "page"      => "yourBooking",
                        "bookingCode" => $code,
                        "guest" => $booking -> getBookingByCode($code),
                        "dateOfStay" => $datesOfStay,
                        "room"      => $booking -> getproductRoom($code),
                        "quantityRoom" => $booking -> countQuantityRoom($code),
                        "services"  => $service -> getListServiceByCode($code)
                    ]);







                } else {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }
                    
            } else {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }

        
        static function processBooking(){
            
        }
    }
?>