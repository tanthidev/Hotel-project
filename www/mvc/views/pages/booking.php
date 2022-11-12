<?php 
    $nameAvatar = json_decode($data['avatarRoom']) -> fileName;
    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
    $imageRoom = json_decode($data['imageRoom']);
    $countImageRoom = count($imageRoom);
    $room = json_decode($data['room'])[0];

    //GET data
    $datefilter = "";
	$guestRequire="";

	if(isset( $_GET['datefilter'])){
		$datefilter = $_GET['datefilter'];
	}
	if(isset( $_GET['guest'])){
		$guestRequire = $_GET['guest'];
	}
    if(isset($data['user'])){
        $user = json_decode($data['user']);
        $fullName = $user -> fullName;
        $email = $user -> email;
        $phoneNumber= $user -> phoneNumber;
    } else {
        $fullName="";
        $email="";
        $phoneNumber="";
    }
?>

<div>
    
</div>
<div class="grid container-page-booking">
    <!-- MAIN -->
    <div class="grid__row page-booking__main">
        <!--  -->
        <div id="slide-show__container" class="grid__column-10-6 slideshow-container page-booking__main--slide-img">
                <div class="slide-show page-booking__main--slide--item">
                    <img class="page-booking__main--slide--image" <?php echo $localImage; ?> style="width:100%">
                </div>
                
                <?php 
                    for($index=0;$index<$countImageRoom;$index++){
                        $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> fileName. '"';
                        echo '
                        <div class="slide-show page-booking__main--slide--item" style="background-image:">
                            <img class="page-booking__main--slide--image" '.$localImage.' style="width:100%">
                        
                        </div>
                        ';
                    }
                    
                    ?>
                <a id="prev-pic" class="prev-pic prev--page-booking">❮</a>
                <a id="next-pic" class="next-pic next--page-booking">❯</a>    
                <div class="grid__row page-booking__container-amenities">
                    <div class="grid__column-3 page-booking__amenities-item">
                        <i class="fa-solid fa-wifi"></i>
                        <span class="page-booking__amenities-text">Free Wifi</span>
                    </div>
                    <div class="grid__column-3 page-booking__amenities-item">
                        <i class="fa-solid fa-square-parking"></i>
                        <span class="page-booking__amenities-text">Free parking</span>
                    </div>
                    <div class="grid__column-3 page-booking__amenities-item">
                        <i class="fa-solid fa-snowflake"></i>
                        <span class="page-booking__amenities-text">Air conditioning</span>
                    </div>
                    <div class="grid__column-3 page-booking__amenities-item">
                        <i class="fa-solid fa-shower"></i>
                        <span class="page-booking__amenities-text">Private bathroom</span>
                    </div>
                    <div class="grid__column-3 page-booking__amenities-item">
                    <i class="fa-solid fa-ban-smoking"></i>
                        <span class="page-booking__amenities-text">No-smoking</span>
                    </div>
                    <div class="grid__column-3 page-booking__amenities-item">
                        <i class="fa-solid fa-dog"></i>
                        <span class="page-booking__amenities-text">Pet-friendly</span>
                    </div>
                </div>        
        </div>

        <!-- Form booking -->
        <div id="form-booking" class="grid__column-10-4 page-booking__main--selection">
            <div class="page-booking__selection--header ">
                <div class=" page-booking__selection--header grid__row">
                    <h2 id="btn-info-booking" class="page-booking__selection--title grid__column-2 booking-title__active">BOOKING</h2>
                    <h2 id="btn-info-guest" class="page-booking__selection--title grid__column-2">GUEST</h2>
                    <div id="booking-title__action-active"></div>
                </div>
            </div>
            
            <form id="form-search" action="/booking/completeBooking/?room=<?php echo $room -> roomType; ?>" method="post" class=" page-booking--selection-form">
                <!-- First form booking -->
                <div id="info-booking" class="grid__row page-booking__info-room page-booking__active">
                    <!-- Date check in -->
                    <div class="page-booking--selection-form-item page-booking--selection-form-item--date">
                        <label for="date" class="page-booking--selection-text">
                            Date from - Date to
                        </label>
                        <!-- <input name="datecheckin" id="datecheckin" type="date" class="page-booking--selection-input"> -->
                        <input value="<?php echo $datefilter; ?>" placeholder="Date from - Date to" id="date" class="page-booking--selection-input page-booking--selection-input-date" type="text" name="datefilter" value="" />
                    </div>
                    
                    <div class="grid__row">
                        <!-- Guest -->
                        <div class="grid__column-2 page-booking--selection-form-item">
                            <label for="guest" class="page-booking--selection-text">
                                Guest
                            </label>
                            <input value="<?php echo $guestRequire; ?>" name="guest" id="guest" min="1" type="number" class="page-booking--selection-input" placeholder="Number of Guests">
                        </div>

                        <!-- Number of room -->
                        <div class="grid__column-2 page-booking--selection-form-item">
                            <label for="numberOfRooms" class="page-booking--selection-text">
                                Number Of Rooms
                            </label>
                            <input min="1" name="numberOfRooms" id="numberOfRooms" type="number" class="page-booking--selection-input" placeholder="Number of Rooms">
                        </div>
                    </div>
                    
                    <!-- Service -->
                    <div class="page-booking__extra-services">
                        <h1 class="page-booking__extra-services--title">
                            Extra Services
                        </h1>
                        <ul class="page-booking__extra-services--list">
                            <!-- Car rental -->
                            <li class="page-booking__extra-services--item">
                                <div class="page-booking__extra-service-container-input">
                                    <input id="carrental" name="carrental" type="checkbox" class="page-booking__extra-service--input">
                                    <label for="carrental" class="page-booking__extra-service-label">
                                        <span class="page-booking__extra-service-name">Car rental</span>
                                    </label>
                                </div>
                                <label for="driver" class="page-booking__extra-service-price">$30/ Day</label>
                            </li>

                            <!-- Gym & Spa -->
                            <li class="page-booking__extra-services--item">
                                <div class="page-booking__extra-service-container-input">
                                    <input id="gym" name="gym" type="checkbox" checked="checked" class="page-booking__extra-service--input">
                                    <label for="gym" class="page-booking__extra-service-label">
                                        <span class="page-booking__extra-service-name">Gym & Spa</span>
                                    </label>
                                </div>
                                <label for="gym" class="page-booking__extra-service-price">Free</label>
                            </li>

                            <!-- Breakfast -->
                            <li class="page-booking__extra-services--item">
                                <div class="page-booking__extra-service-container-input">
                                    <input id="breakfast" name="breakfast" type="checkbox" class="page-booking__extra-service--input">
                                    <label for="breakfast" class="page-booking__extra-service-label">
                                        <span class="page-booking__extra-service-name">Breakfast</span>
                                    </label>                                 
                                </div>
                                <label for="breakfast" class="page-booking__extra-service-price">$10/ Day/ Guest</label>
                            </li>

                            <!-- Laundry -->
                            <li class="page-booking__extra-services--item">
                                <div class="page-booking__extra-service-container-input">
                                    <input id="laundry" name="laundry" type="checkbox" class="page-booking__extra-service--input">
                                    <label for="laundry" class="page-booking__extra-service-label">
                                        <span class="page-booking__extra-service-name">Laundry</span>
                                    </label>                                 
                                </div>
                                <label for="laundry" class="page-booking__extra-service-price">$5/ Day/ Guest</label>
                            </li>

                            <li class="page-booking__extra-services--item">
                                <div class="page-booking__extra-service-container-input">
                                    <input id="airport" name="airport" type="checkbox" class="page-booking__extra-service--input">
                                    <label for="airport" class="page-booking__extra-service-label">
                                        <span class="page-booking__extra-service-name">Airport pick up</span>
                                    </label>                                 
                                </div>
                                <label for="airport" class="page-booking__extra-service-price">$20/ Way</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Request -->
                    <div class="page-booking--selection-form-item page-booking--selection-form-item--request">
                        <label for="request" class="page-booking--selection-text">
                            Special request
                        </label>
                        <textarea placeholder="Check-in time, food allergies..." name="request" id="request" rows="3" cols="auto" class="page-booking--selection-input page-booking--selection-input--request"></textarea>
                    </div>
                </div>

                <!-- Second form booking -->
                <div id="info-guest" class="page-booking__info-guest">
                    <div class="container form-group">
                        <label class="complete__form-item" for="fullName">Full Name<span style="color:red;">*</span></label>
                        <input class="form-control complete__form-item" id="fullName" name="fullName" type="text" value="<?php echo $fullName; ?>">
                    </div>
                    <div class="container form-group">
                        <label class="complete__form-item" for="email">Email<span style="color:red;">*</span></label>
                        <input class="form-control complete__form-item" id="email" name="email" type="text" value="<?php echo $email; ?>">
                    </div>
                    <div class="container form-group">
                        <label class="complete__form-item" for="phoneNumber">Phone number<span style="color:red;">*</span></label>
                        <input class="form-control complete__form-item" id="phoneNumber" name="phoneNumber" type="tel" value="<?php echo $phoneNumber; ?>">
                    </div>
                    

                    <div class="container"> 
                        <label class="complete__payment-item">
                            <input type="radio" checked="checked">
                            Payment upon check-in
                        </label>
                        <label class="complete__payment-item complete__payment-item-disable flex">
                            <input type="radio" disabled="disabled">
                            <div class="complete__payment-container-img">
                                <img src="/mvc/data/images/payments/visa.png" alt="" class="complete__payment-img">
                                <img src="/mvc/data/images/payments/mastercard.png" alt="" class="complete__payment-img">
                                <img src="/mvc/data/images/payments/amex.png" alt="" class="complete__payment-img">
                                <img src="/mvc/data/images/payments/dinersclub.png" alt="" class="complete__payment-img">
                                <img src="/mvc/data/images/payments/visaelectron.png" alt="" class="complete__payment-img">
                                <img src="/mvc/data/images/payments/jcb.png" alt="" class="complete__payment-img">
                            </div>
                        </label>
                    </div>

                   
                </div>

                <div class="page-booking--selection-footer">
                    <div id="page-booking__btn-next" class="page-booking__btn-next btn-active">Next</div>
                    <input id="page-booking__btn-booking" type="submit" class="page-booking__btn-next" name="btn-next" value="BOOK">
                </div>

            </form>
            
        </div>
    </div>
    <!--  -->


    <!-- ROOM DETAIL -->
     <div id="page-booking__container-detail" class="page-booking__container-detail grid__row">
        <div class="grid__column-10-2">
            <ul class="page-booking__tab-header">
                <li id="page-booking--overview-btn" class="page-booking__tab-header--item active-menu">
                    <p>OVERVIEW</p>
                </li>
                <li id="page-booking--amenities-btn" class="page-booking__tab-header--item">
                    <p>AMENITIES</p>
                </li>
            </ul>
        </div>
        <!--  -->
        <div class="grid__column-10-8">
            <div id="page-booking__container--detail-content" class="page-booking__container--detail-content active-content">
                <p class="page-booking__detail--describe">
                    <?php echo $room -> describeRoom ?>
                </p>

                <table>
                    <tr>
                        <td class="page-booking__detail--table-content text-bold">View</td>
                        <td class="page-booking__detail--table-content"><?php echo ucfirst($room -> view);?> view</td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content text-bold">Area</td>
                        <td class="page-booking__detail--table-content"><?php echo $room -> area;?>&#x33A1; including balcony</td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content text-bold">Bed</td>
                        <td class="page-booking__detail--table-content"><?php echo $room -> numberOfBed;?> beds (L 2m W 2m)</td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content text-bold">Bathroom</td>
                        <td class="page-booking__detail--table-content">En suite bathroom with bathtub and overhead shower</td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content text-bold">Maximum Occupancy</td>
                        <td class="page-booking__detail--table-content">Maximum occupancy <?php echo $room -> guest ?> adults + 2 children </td>
                    </tr>
                </table>
                <p class="page-booking__detail--table-content">Wheelchair accessible room – available upon request</p>
            </div>

            <div id="page-booking__container--amenities-list" class="page-booking__container--detail-content">
                <table>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Individually controlled AC and heater
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Alarm clock
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Flat screen TV with 25 satellite international channels
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Tea/ coffee making facilities
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Individual safe deposit box
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Bathrobes and slippers
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            IDD telephone
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Daily flowers & fruit bowl
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Mini bar/ refrigerator
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            6:00 to 24:00 room service
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Writing desk
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Turn-down service
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Seating area
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            High-speed Wifi
                        </td>
                    </tr>
                    <tr>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Hairdryer
                        </td>
                        <td class="page-booking__detail--table-content">
                            <i class="fa-solid fa-square-check"></i>
                            Vanity with complete range of bath amenities.
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <!--
    <div class="page-booking__container-amenities grid__row">
        <div class="page-booking__amenities grid__column-10-6">

        </div>
    </div> -->

</div>

<script> 
    
        document.getElementById('guest').addEventListener('input', function() {
            var guest= ($("#guest").val());
            document.getElementById("numberOfRooms").setAttribute("min", Math.ceil(guest/<?php echo (int)($room -> guest) ?>))
        });
    

    

</script>