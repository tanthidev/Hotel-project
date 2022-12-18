
<?php 
        $bookings = json_decode($data['bookings']);
?>
<div id="container__bookingManager" class="container__bookingManager">
        <!--  -->
    <table class="projects-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Booking</th>
                <th>Guest</th>
                <th>Check in</th>
                <th>Total</th>
                <th style="text-align: center;">Confirm</th>
                <th></th>
            </tr>
        </thead>
        
        <?php 
            foreach($bookings as $booking){
                echo '
                <tr>
                        <td>
                            <p>'.$booking -> bookingID.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p>'.$booking -> dateBooking.'</p>
                            <p></p>
                        </td>
                        <td class="member">
                            <div class="member-info">
                                <p>'.$booking -> FullName.'</p>
                                <p></p>
                            </div>
                        </td>
                        <td>
                            <p>'.$booking -> checkIn.'</p>
                            <p></p>
                        </td>
                        <td>
                            <p class="format-money">'.$booking -> total.'</p>
                            <p></p>
                        </td>
                ';
                if($booking -> confirmBooking == "Yes"){
                    echo '
                        <td class="status">
                            <span class="status-text status-green"></span>
                        </td>
                    ';
                } else {
                    echo '
                        <td class="status">
                            <span class="status-text status-orange"></span>
                        </td>
                    ';
                } 

                echo '
                        <td class="detail-booking">
                            <a href="">Details</a>
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