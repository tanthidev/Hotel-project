<?php 
    
    $nameAvatar = json_decode($data['avatarRoom']) -> localAvatar;
    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
    $imageRoom = json_decode($data['imageRoom']) ;
    $countImageRoom = count( $imageRoom);
    // print_r($imageRoom [1]-> localImage);
?>
<div class="grid container-page-booking">
                <div class="grid__row page-booking__main">
                    <!--  -->
                    <div id="slide-show__container" class="grid__column-10-6 slideshow-container page-booking__main--slide-img">
                            <div class="slide-show page-booking__main--slide--item">
                                <img <?php echo $localImage; ?> style="width:100%">
                            </div>

                            <?php 
                                for($index=0;$index<$countImageRoom;$index++){
                                    $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> localImage. '"';
                                    echo '
                                    <div class="slide-show  page-booking__main--slide--item">
                                        <img '.$localImage.' style="width:100%">
                                    </div>
                                ';
                                }
                                
                            ?>


                            <a id="prev-pic" class="prev-pic prev--page-booking">❮</a>
                            <a id="next-pic" class="next-pic next--page-booking">❯</a>
                    </div>
                    <!--  -->
                    <div class="grid__column-10-4 page-booking__main--selection">
                        <div class="page-booking__selection--header ">
                            <div class="grid__column-2 page-booking__selection--header-active">
                                <h2 class="page-booking__selection--title ">BOOKING</h2>
                            </div>
                            <!--  -->
                            <div class="grid__column-2 page-booking__selection--header-not-active">
                                <h2 class="page-booking__selection--title">REQUEST BOOKING</h2>
                            </div>
                        </div>
                        
                        <form id="form-search" action="" class="grid__row page-booking--selection-form">
                            <div class="page-booking--selection-form-item page-booking--selection-form-item--date">
                                <label for="date" class="page-booking--selection-text">
                                    Checkin - Checkout
                                </label>
                                <!-- <input name="datecheckin" id="datecheckin" type="date" class="page-booking--selection-input"> -->
                                <input id="date" class="page-booking--selection-input" type="text" name="datefilter" value="" />
                            </div>

                            <div class="grid__column-2 page-booking--selection-form-item">
                                <label for="guest" class="page-booking--selection-text">
                                    Guest
                                </label>
                                <input name="guest" id="guest" type="number" class="page-booking--selection-input">
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

                            <div class="page-booking--selection-footer">
                                
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