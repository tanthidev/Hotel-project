<?php 
    $bookings = json_decode($data['bookings']);
?>
<div class="container__list-booking">
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
                            <a href="/booking/yourBooking/?code='.$booking->BookingCode.'">Details</a>
                        </td>
                    </tr>
                ';
            }
        ?>
    </table>
</div>

<script>
    // Create our number formatter.
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    
        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });

    items = document.getElementsByClassName("format-money");

    for(var i =0; i<items.length; i++){
        value = items[i].textContent;

        items[i].innerHTML = formatter.format(Number(value));
    }
</script>