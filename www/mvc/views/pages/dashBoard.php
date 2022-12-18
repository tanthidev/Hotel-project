<?php 
    $bookings = json_decode($data['bookings']);
    $countBookings = $data['countBookings'];
    $countUsers    = $data['countUsers'];
    $envenue       = $data['envenue'];
?>


<div id="container__dashBoard" class="container__dashBoard">
    <!--  -->
    <div class="card-list">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card blue">
                    <div class="title">all bookings</div>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value"><?php echo $countBookings; ?></div>
                    <div class="stat"><b></b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card green">
                    <div class="title">users</div>
                    <i class="zmdi zmdi-upload"></i>
                    <div class="value"><?php echo $countUsers; ?></div>
                    <div class="stat"><b></b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card orange">
                    <div class="title">total revenue</div>
                    <i class="zmdi zmdi-download"></i>
                    <div class="value format-money"><?php echo $envenue;?></div>
                    <div class="stat"><b></b></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card red">
                    <div class="title">new bookings</div>
                    <i class="zmdi zmdi-download"></i>
                    <div class="value">3</div>
                    <div class="stat"><b></b></div>
                </div>
            </div>
        </div>
    </div>
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

        
        <tfoot>
            <tr>
                <td colspan="10" style="text-align: center;"><a href="/admin/bookingManager">See more...</a></td>
            </tr>
        </tfoot>


        <!-- <tr>
            <td>
                <p>1</p>
                <p></p>
            </td>
            <td>
                <p>17th Oct, 15</p>
                <p></p>
            </td>
            <td class="member">
                <div class="member-info">
                    <p>Myrtle Erickson</p>
                    <p></p>
                </div>
            </td>
            <td>
                <p>15/12/2022</p>
                <p></p>
            </td>
            <td>
                <p>$4000</p>
                <p></p>
            </td>
            <td class="status">
                <span class="status-text status-orange">Unpaid</span>
            </td>
            <td>
                <div class="dropdown">
                    <button style="width:70%; border: none; background-color: #273142; text-align: left;" class="btn btn-primary dropdown-toggle btn-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="" class="dropdown-item">Details</a>
                    </div>
                </div>
            </td>
        </tr> -->
    </table>
</div>