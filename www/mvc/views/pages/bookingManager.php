
<div id="container__bookingManager" class="container__bookingManager">
<?php 
        $bookings = json_decode($data['bookings']);
    ?>
    <table class="bookingManager__table">
        <tr class="bookingManager_table-header">
            <th class="bookingManager_table-header-item bookingManager_table-header--id grid__column-10-1">ID</th>
            <th class="bookingManager_table-header-item grid__column-10-2">NAME GUEST</th>
            <th class="bookingManager_table-header-item grid__column-10-1">PHONE</th>
            <!-- <th class="bookingManager_table-header-item grid__column-10-1">EMAIL</th> -->
            <th class="bookingManager_table-header-item grid__column-10-1">CHECK IN</th>
            <th class="bookingManager_table-header-item grid__column-10-1">CHECK OUT</th>
            <th class="bookingManager_table-header-item grid__column-10-2">DATE BOOKING</th>
            <th class="bookingManager_table-header-item grid__column-10-1">COMFIRM BOOKING</th>
            <th class="bookingManager_table-header-item grid__column-10-1">ACTION</th>
        </tr>
        
        <?php 
            foreach ($bookings as $booking) {
                echo '
                <tr class="bookingManager_table-row">
                    <td class="bookingManager_table-content bookingManager_table-header--id grid__column-10-1" class="grid__column-10-1">'.$booking->bookingID.'</td>
                    <td class="bookingManager_table-content grid__column-10-2">'.$booking->FullName.'</td>
                    <td class="bookingManager_table-content grid__column-10-1">'.$booking->phoneNumber.'</td>
                    
                    <td class="bookingManager_table-content grid__column-10-1">'.$booking->checkIn.'</td>
                    <td class="bookingManager_table-content grid__column-10-1">'.$booking->checkOut.'</td>
                    <td class="bookingManager_table-content grid__column-10-2">'.$booking->dateBooking.'</td>
                    <td class="bookingManager_table-content grid__column-10-1">'.$booking->confirmBooking.'</td>
                    <td class="bookingManager_table-content grid__column-10-1">
                        <div class="bookingManager_table-content--change">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div class="bookingManager_table-content--detele">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </div>
                    </td>
                </tr>
                ';
              }
        ?>
    </table>

    <div class="container-pagination">
            <!-- Btn pre-page -->
            <span class="btn__controller-page">
                <i class="fa-solid fa-angle-left"></i>
            </span>
            <!-- controller page -->
            
            <?php 
                for($i=1;$i<=$data['totalPage'];$i++){
                    echo '
                    <a href="/admin/bookingManager/?page='.$i.'" class="btn__controller-page">
                        <span>'.$i.'</span>
                    </a> 
                    ';
                }
            ?>  
            <!-- Btn next-page -->
            <span href="" class="btn__controller-page">
                <i class="fa-solid fa-angle-right"></i>
            </span>
    </div>
</div>