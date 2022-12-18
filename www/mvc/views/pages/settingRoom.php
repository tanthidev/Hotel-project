<?php
    $room = json_decode($data['room']);
    $room = $room[0];
    $nameAvatar = json_decode($data['avatarRoom']) -> fileName;
    $localImage = 'src="/mvc/data/images/room/' .  $nameAvatar . '"';
    $imageRoom = json_decode($data['imageRoom']) ;
    $countImageRoom = count($imageRoom);
    $roomNumbers = json_decode($data['roomNumbers']);
    $roomTypes = json_decode($data['roomTypes']);
?>

<div id="container__settingRoom" class="container__settingRoom">
    <!-- Name for get data from form: roomType, price, beds, guest, area, describe, save-->
    <form method="POST" action="/admin/changeInfoRoom/?room=<?php echo $room->roomType;?>" class="grid__row container__settingRoom--row">
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <!-- Room number -->
                <li class="settingRoom__item">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Room Numbers
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                                foreach($roomNumbers as $roomNumber){
                                    echo '
                                        <p class="dropdown-item">'.$roomNumber -> roomNumber.'</p>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </li>
                <!-- RoomType -->
                <li class="settingRoom__item">
                    <label for="roomType" class="settingRoom__item--label">Room Type</label>
                    <input name="roomType" id="roomType" type="text" class="settingRoom__item--input" value="<?php echo $room->roomType; ?>">
                </li>
                <!-- Price -->
                <li class="settingRoom__item">
                    <label for="price" class="settingRoom__item--label">Price($)</label>
                    <input name="price" id="price" type="number" class="settingRoom__item--input" value="<?php echo $room->price; ?>">
                </li>
            </ul>
        </div>
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <!-- Beds -->
                <li class="settingRoom__item">
                    <label for="numberOfBeds" class="settingRoom__item--label">Number of Beds</label>
                    <input name="beds" id="numberOfBeds" type="number" class="settingRoom__item--input" value="<?php echo $room->numberOfBed; ?>">
                </li>
                <!-- Guest -->
                <li class="settingRoom__item">
                    <label for="guest" class="settingRoom__item--label">Guest</label>
                    <input name="guest" id="guest" type="number" class="settingRoom__item--input" value="<?php echo $room->guest; ?>">
                </li>
                <!-- area -->
                <li class="settingRoom__item">
                    <label for="area" class="settingRoom__item--label">Area</label>
                    <input name="area" id="area" type="number" class="settingRoom__item--input" value="<?php echo $room->area; ?>">
                </li>
            </ul>
        </div>
        <div class="grid__column-3">
            <ul class="settingRoom__list">
                <li class="settingRoom__item">
                    <span class="settingRoom__item--label">Image</span>
                    <div  class="settingRoom__container-image">
                        <div class="grid__row">
                            <img class="settingRoom__image" <?php echo $localImage; ?> alt="">
                            <?php 
                                for($index=0;$index<$countImageRoom;$index++){
                                    $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> fileName. '"';
                                    echo '
                                        <img class="settingRoom__image" '.$localImage.'>
                                     ';
                                }
                                
                            ?>
                        
                        </div>
                    </div>
                </li>
                
                <!-- Describe -->
                <li class="settingRoom__item">
                    <label for="describe" class="settingRoom__item--label">Describe</label>
                    <textarea name="describe" id="describe" row=6 cols=auto class="settingRoom__item--input settingRoom__item--input-describe">
                        <?php echo preg_replace('/\s+/', ' ', $room -> describeRoom); ?>
                    </textarea>
                </li>
                
                <!-- Button submit -->
                <li class="settingRoom__item settingRoom__btn">
                    <input class="settingRoom__item--reset" type="reset" value="Reset">
                    <input class="settingRoom__item--submit" type="submit" name="save" value="Save">
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
                        $localImage = 'src="/mvc/data/images/room/' .  $imageRoom[$index]-> fileName. '"';
                        echo '
                        <img id="settingRoom__image" '.$localImage.' alt="" class="settingRoom__slide-show--image slide-show">
                         ';
                    }
                ?>
                
                

            <a id="prev-pic" class="prev-pic">&#10094;</a>
            <a id="next-pic" class="next-pic">&#10095;</a>
        </div>
    </div>
</div>
