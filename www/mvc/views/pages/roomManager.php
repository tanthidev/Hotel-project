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
        <form id="form-add-room" method="POST" action="/admin/addRoom" class="form-add-room">
            <div class="grid__row">
                <!-- Room number -->
                <div class="grid__column-2">
                    <label class="form-add-room--label" for="roomNumber">Room number <span style="color:red;">*</span></label>
                    <br>
                    <input class="form-add-room--input" id="roomNumber" name="roomNumber" type="text">
                    <br>
                    <h4 id="messageRoomNumber"></h4>
                </div>
                    <!-- Room Type -->
                    <div class="grid__column-2">
                        <label class="form-add-room--label" for="roomType">Room Type <span style="color:red;">*</span></label>
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
                    
                    </div>
            </div>    

                   
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
                
                <form id="form-add-roomtype" method="POST" action="/admin/addRoomType" class="form-add-roomtype" enctype="multipart/form-data">
                    <div class="grid__row">
                        <!-- Room Type-->
                        <div class="grid__column-2">
                            <label class="form-add-room--label" for="roomtype">Room Type <span style="color:red;">*</span></label>
                            <br>
                            <input class="form-add-room--input" id="roomtype" name="roomtype" type="text" >
                            <br>
                            <h4 id="messageRoomType"></h4>
                        </div>
                        <!--  -->
                        <div class="grid__column-2">
                            <label class="form-add-room--label" for="beds">Number of bed <span style="color:red;">*</span></label>
                            <br>
                            <input class="form-add-room--input" id="beds" name="beds" type="number">
                            <br>
                        </div>
                    </div>
                    <!--  -->
                    <div class="grid__row">
                        <div class="grid__column-2">
                            <label class="form-add-room--label" for="area">Area <span style="color:red;">*</span></label>
                            <br>
                            <input class="form-add-room--input" id="area" name="area" type="number">
                            <br>
                        </div>
                        <div class="grid__column-2">
                            <label class="form-add-room--label" for="price">Price <span style="color:red;">*</span></label>
                            <br>
                            <input class="form-add-room--input" id="price" name="price" type="number">
                            <br>
                        </div>
                        <!-- <div class="grid__column-3">
                            <label class="form-add-room--label" for="guest">Guest *</label>
                            <br>
                            <input class="form-add-room--input" id="guest" name="price" type="number">
                            <br>
                        </div> -->
                    </div>
                    
                    <div class="grid__row">
                        <div class="grid__column-2">
                            <!-- Room avatar -->
                            <label class="form-add-room--label" for="roomAvatar">Room Avatar <span style="color:red;">*</span></label>
                            <input class="form-add-room--input form-add-room--input-img" id="roomAvatar" type="file" name="roomAvatar">
    
                        </div>
                        <div class="grid__column-2">
                            <!-- Room Image -->
    
                            <label class="form-add-room--label" for="roomImages">Room Image *</label>
                            <input class="form-add-room--input form-add-room--input-img" id="roomImages" type="file" name="roomImages[]" multiple>
    
                        </div>
                    </div>

                    <div class="form-add-room__container-btn">
                        <span>
                            <h4 id="notice--empty--roomtype"></h4>
                        </span>
                        <a href="" id="cancel" name="cancel" class="form-add-room-reset form-add-room-btn">Cancel</a>
                        <button type="submit" class="form-add-room-submit form-add-room-btn" value="ADD" name="btn-add">ADD</button>
                    </div>
                </form>
    </div>

    <!-- LIST ROOM -->
    <table id="roomManager__table" class="roomManager__table">
        <tr class="roomManager_table-header">
            <th class="roomManager_table-header-item grid__column-10-3">ROOM TYPES</th>
            <th class="roomManager_table-header-item grid__column-10-1">PRICE ($)</th>
            <th class="roomManager_table-header-item grid__column-10-1">BEDS</th>
            <th class="roomManager_table-header-item grid__column-10-1">AREA</th>
            <th class="roomManager_table-header-item grid__column-10-1">GUEST</th>
            <th class="roomManager_table-header-item grid__column-10-2">DESCRIBE</th>
            <th class="roomManager_table-header-item grid__column-10-1">ACTION</th>
        </tr>
        
        <?php 
            foreach ($rooms as $room){
                echo '
                <tr class="roomManager_table-row">
                    <td class="roomManager_table-content grid__column-10-3">'.$room->roomType.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->price.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->numberOfBed.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->area.'</td>
                    <td class="roomManager_table-content grid__column-10-1">'.$room->guest.'</td>
                    <td class="roomManager_table-content grid__column-10-2">'.$room->describeRoom.'</td>
                    <td class="roomManager_table-content grid__column-10-1 roomManager_table-content--action">
                        <a href="/admin/settingRoom/?room='.$room->roomType.'" class="roomManager_table-content--change">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        
                        <div class="roomManager_table-content--detele">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </div>
                    </td>
                </tr>
                ';
              }
        ?>
    </table>

    <div id="container-pagination" class="container-pagination">
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