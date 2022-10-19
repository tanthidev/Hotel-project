<?php
    $room = json_decode($data['room']);
    $room = $room[0];
    $nameAvatar = json_decode($data['avatarRoom']) -> localAvatar;
    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
    $imageRoom = json_decode($data['imageRoom']) ;
    $countImageRoom = count( $imageRoom);
?>

<div id="container__settingRoom" class="container__settingRoom">
    <form class="grid__row container__settingRoom--row">
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <li class="settingRoom__item">
                    <label for="roomNumber" class="settingRoom__item--label">Room Number</label>
                    <input id="roomNumber" type="text" class="settingRoom__item--input" value="<?php echo $room->roomNumber; ?>">
                </li>
                <li class="settingRoom__item">
                    <label for="roomType" class="settingRoom__item--label">Room Type</label>
                    <input id="roomType" type="text" class="settingRoom__item--input" value="<?php echo $room->roomType; ?>">
                </li>
                <li class="settingRoom__item">
                    <label for="price" class="settingRoom__item--label">Price($)</label>
                    <input id="price" type="number" class="settingRoom__item--input" value="<?php echo $room->price; ?>">
                </li>
            </ul>
        </div>
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <li class="settingRoom__item">
                    <label for="numberOfBeds" class="settingRoom__item--label">Number of Beds</label>
                    <input id="numberOfBeds" type="number" class="settingRoom__item--input" value="<?php echo $room->numberOfBed; ?>">
                </li>
                <li class="settingRoom__item">
                    <label for="guest" class="settingRoom__item--label">Guest</label>
                    <input id="guest" type="number" class="settingRoom__item--input" value="<?php echo $room->guest; ?>">
                </li>
                <li class="settingRoom__item">
                    <label for="Area" class="settingRoom__item--label">Area</label>
                    <input id="Area" type="number" class="settingRoom__item--input" value="<?php echo $room->area; ?>">
                </li>
            </ul>
        </div>
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <li class="settingRoom__item">
                    <span class="settingRoom__item--label">Describe</span>
                    <div  class="settingRoom__container-image">
                        <div class="grid__row">
                            <img class="settingRoom__image" <?php echo $localImage; ?> alt="">
                            <?php 
                                for($index=0;$index<$countImageRoom;$index++){
                                    $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> localImage. '"';
                                    echo '
                                        <img alt="image" class="settingRoom__image" '.$localImage.'>
                                     ';
                                }
                                
                            ?>
                        
                        </div>
                    </div>
                </li>

                <li class="settingRoom__item">
                    <label for="describe" class="settingRoom__item--label">Describe</label>
                    <textarea id="describe" row=4 cols=auto class="settingRoom__item--input settingRoom__item--input-describe"></textarea>
                </li>
                
                <li class="settingRoom__item settingRoom__btn">
                    <input class="settingRoom__item--reset" type="reset" value="Reset">
                    <input class="settingRoom__item--submit" type="submit" value="Save">
                </li>
            </ul>
        </div>
    </form>
    <div id="settingRoom__container--slide-show" class="settingRoom__container--slide-show">
        <div id="slide-show__container" class="settingRoom__slide-show">
                <i id="settingRoom__close-slide" class="fa-sharp fa-solid fa-circle-xmark"></i>
                
                <?php
                    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
                    echo '<img id="settingRoom__image" '.$localImage.' alt="" class="settingRoom__slide-show--image slide-show">';
                    
                    for($index=0;$index<$countImageRoom;$index++){
                        $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> localImage. '"';
                        echo '
                        <img id="settingRoom__image" '.$localImage.' alt="" class="settingRoom__slide-show--image slide-show">
                         ';
                    }
                ?>
                
                

            <a id="prev" class="prev">&#10094;</a>
            <a id="next" class="next">&#10095;</a>
        </div>
    </div>
</div>
