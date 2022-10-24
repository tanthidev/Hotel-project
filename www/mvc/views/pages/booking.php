<?php 
    
    $nameAvatar = json_decode($data['avatarRoom']) -> fileName;
    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
    $imageRoom = json_decode($data['imageRoom']) ;
    $countImageRoom = count( $imageRoom);
    $dateCheckin ="";
    $guest = "";
?>
<div class="grid container-page-booking">
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
        <div class="grid__column-10-4 page-booking__main--selection">
            <div class="page-booking__selection--header ">
                <div class=" page-booking__selection--header">
                    <h2 class="page-booking__selection--title ">REQUESTS BOOKING</h2>
                </div>
            </div>
            
            <form id="form-search" action="" class="grid__row page-booking--selection-form">
                <div class="page-booking--selection-form-item page-booking--selection-form-item--date">
                    <label for="date" class="page-booking--selection-text">
                        Date from - Date to
                    </label>
                    <!-- <input name="datecheckin" id="datecheckin" type="date" class="page-booking--selection-input"> -->
                    <input value="<?php echo $dateCheckin; ?>" placeholder="Date from - Date to" id="date" class="page-booking--selection-input" type="text" name="datefilter" value="" />
                </div>

                <div class="grid__column-2 page-booking--selection-form-item">
                    <label for="guest" class="page-booking--selection-text">
                        Guest
                    </label>
                    <input value="<?php echo $guest; ?>" name="guest" id="guest" type="number" class="page-booking--selection-input" placeholder="Number of Guest">
                </div>

                <div class="grid__column-2 page-booking--selection-form-item">
                    <label for="rooms" class="page-booking--selection-text">
                        Rooms
                    </label>
                    <input name="rooms" id="rooms" type="number" class="page-booking--selection-input">
                </div>
                
                <div class="page-booking__extra-services">
                    <h1 class="page-booking__extra-services--title">
                        Extra Services
                    </h1>
                    <ul class="page-booking__extra-services--list">
                        <li class="page-booking__extra-services--item">
                            <div class="page-booking__extra-service-container-input">
                                <input id="driver" name="driver" type="checkbox" class="page-booking__extra-service--input">
                                <label for="driver" class="page-booking__extra-service-label">
                                    <span class="page-booking__extra-service-name">Driver</span>
                                </label>
                            </div>
                            <label for="driver" class="page-booking__extra-service-price">$10/ Day</label>
                        </li>
                        <li class="page-booking__extra-services--item">
                            <div class="page-booking__extra-service-container-input">
                                <input id="gym" name="gym" type="checkbox" class="page-booking__extra-service--input">
                                <label for="gym" class="page-booking__extra-service-label">
                                    <span class="page-booking__extra-service-name">Gym & Spa</span>
                                </label>
                            </div>
                            <label for="gym" class="page-booking__extra-service-price">$10/ Day</label>
                        </li>
                        <li class="page-booking__extra-services--item">
                            <div class="page-booking__extra-service-container-input">
                                <input id="breakfast" name="breakfast" type="checkbox" class="page-booking__extra-service--input">
                                <label for="breakfast" class="page-booking__extra-service-label">
                                    <span class="page-booking__extra-service-name">Breakfast</span>
                                </label>                                 
                            </div>
                            <label for="breakfast" class="page-booking__extra-service-price">$10/ Day</label>
                        </li>
                    </ul>
                </div>

                <div class="page-booking--selection-form-item page-booking--selection-form-item--request">
                    <label for="rooms" class="page-booking--selection-text">
                        Special request
                    </label>
                    <textarea placeholder="Special request..." name="request" id="request" rows="3" cols="auto" class="page-booking--selection-input page-booking--selection-input--request"></textarea>
                </div>

                <div class="page-booking--selection-footer">
                    <input type="submit" class="page-booking__btn-next" value="Next">
                </div>

            </form>
            
        </div>
    </div>
    <!--  -->

    <div class="page-booking__container-overview grid__row">
        <div class="page-booking__overview grid__column-10-6">

        </div>
    </div>

    <!--  -->
    <div class="page-booking__container-amenities grid__row">
        <div class="page-booking__amenities grid__column-10-6">

        </div>
    </div>

</div>