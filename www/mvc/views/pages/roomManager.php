<?php 
    $rooms = json_decode($data['rooms']);
	$countRoom = count($rooms);
?>
<div id="container__roomManager" class="container__roomManager">
    <div class="container__add-room">
        <div id="add-room__btn" class="add-room__btn">
            <div class="add-room__btn--icon">
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>
    </div>
    
    <!-- FORM -->
    <div id="container__form-add-room" class="container__form-add-room">
        <h3 class="form__add-room--title">
            ADD ROOM
        </h3>
        <form id="form-add-room" method="POST" action="/admin/addRoom" class="form-add-room" enctype="multipart/form-data">
                <!-- Room number -->
                    <label class="form-add-room--label" for="roomNumber">Room number *</label>
                    <br>
                    <input class="form-add-room--input" id="roomNumber" name="roomNumber" type="text">
                    <br>
                    <h4 id="messageRoomNumber"></h4>
                    <br>
                    <!-- Price -->
                    <label class="form-add-room--label" for="priceRoom">Price ($) *</label>
                    <br>
                    <input class="form-add-room--input form-add-room--input-price" id="priceRoom" name="priceRoom" type="number">
                    <br>
                    <!-- Room Type -->
                    <label class="form-add-room--label" for="roomType">Room Type *</label>
                    <br>
                    <select class="form-add-room--input" name="roomType" id="roomType">
                        <option value=""></option>
                        <?php
                        $roomsType=json_decode($data['roomType']);
                        foreach($roomsType as $roomType){
                            echo '
                                    <option value="'.$roomType->roomType.'">'.$roomType->roomType.'</option>
                                    ';
                                }
                        ?>
                    </select>
                    <br>
                    <!-- Room avatar -->
                    <label class="form-add-room--label" for="roomAvatar">Room Avatar *</label>
                    <input class="form-add-room--input form-add-room--input-img" id="roomAvatar" type="file" name="roomAvatar">

                    <!-- Room Image -->
                    <br>
                    <label class="form-add-room--label" for="roomImages">Room Image *</label>
                    <input class="form-add-room--input form-add-room--input-img" id="roomImages" type="file" name="roomImages[]" multiple>
                   
                    <br>
                    <!-- Describe -->
                    <label class="form-add-room--label" for="roomDescribe">Describe</label>
                    <br>                   
                    <textarea class="form-add-room--input form-add-room--input-describe" id="roomDescribe" name="roomDescribe" rows="3" cols="auto"></textarea>
                    <br>
                    <!-- Text notice -->
                    
                    <div class="form-add-room__container-btn">
                        <span>
                            <h4 id="notice--empty"></h4>
                        </span>
                        <a href="" id="cancel" name="cancel" class="form-add-room-reset form-add-room-btn">Cancel</a>
                        <button type="submit" class="form-add-room-submit form-add-room-btn" value="ADD" name="btn-add">ADD</button>
                    </div>
        </form>
    </div>

    <!-- LIST ROOM -->
    <table class="roomManager__table">
        <tr class="roomManager_table-header">
            <th class="roomManager_table-header-item grid__column-10-1">ROOM NUMBER</th>
            <th class="roomManager_table-header-item grid__column-10-1">ROOM TYPES</th>
            <th class="roomManager_table-header-item grid__column-10-1">PRICE ($)</th>
            <th class="roomManager_table-header-item grid__column-10-1">BEDS</th>
            <th class="roomManager_table-header-item grid__column-10-1">AREA</th>
            <th class="roomManager_table-header-item grid__column-10-1">GUEST</th>
            <th class="roomManager_table-header-item grid__column-10-1">IMAGES</th>
            <th class="roomManager_table-header-item grid__column-10-2">DESCRIBE</th>
            <th class="roomManager_table-header-item grid__column-10-1">ACTION</th>
        </tr>
        
        <?php 
            foreach ($rooms as $room){
                echo '
                <tr class="roomManager_table-row">
                    <td class="roomManager_table-content grid__column-10-1">'.$room->roomNumber.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->roomType.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->price.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->numberOfBed.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->area.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->guest.'</td>
                    <td class="roomManager_table-content grid__column-10-2"></td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->describeRoom.'</td>
                    <td class="roomManager_table-content grid__column-10-1 roomManager_table-content--action">
                        <div class="roomManager_table-content--change">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        
                        <div class="roomManager_table-content--detele">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </div>
                    </td>
                </tr>
                ';
              }
        ?>
    </table>

    <div class="container-pagination">
        <!--Btn pre-page-->
        <span class="btn__controller-page">
            <i class="fa-solid fa-angle-left"></i>
        </span>
        <!--controller page-->
        
        <?php
            for($i=1;$i<=$data['totalPage'];$i++){
                echo '
                <a href="/admin/roomManager/?page='.$i.'" class="btn__controller-page">
                    <span>'.$i.'</span>
                </a> 
                ';
            }
        ?>
        <!--Btn next-page-->
        <span href="" class="btn__controller-page">
            <i class="fa-solid fa-angle-right"></i>
        </span>
    </div>
</div>