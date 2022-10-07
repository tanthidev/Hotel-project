<div id="container__roomManager" class="container__roomManager">
    <div class="container__add-room">
        <div id="add-room__btn" class="add-room__btn">
            <div class="add-room__btn--icon">
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>
    </div>
    <div id="container__form-add-room" class="container__form-add-room">
        <h3 class="form__add-room--title">
            ADD ROOM
        </h3>
        <form method="POST" action="/admin/addRoom" class="form-add-room" enctype="multipart/form-data">
                <!-- Room number -->
                    <label class="form-add-room--label" for="roomNumber">Room number *</label>
                    <br>
                    <input class="form-add-room--input" id="roomNumber" name="roomNumber" type="text">
                    <br>
                    <span id="messageRoomNumber"></span>
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
                    <div class="form-add-room__container-btn">
                        <input type="reset" class="form-add-room-reset form-add-room-btn" value="RESET">
                        <input type="submit" class="form-add-room-submit form-add-room-btn" value="ADD" name="btn-add">
                    </div>
        </form>
    </div>


</div>