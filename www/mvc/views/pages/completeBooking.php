<?php 
    $checkin       =$data['checkin'];
    $checkout      =$data['checkout'];
    $amount        =$data['amount'];
    $services      = $data['services'];
    $request       = $data['request'];
    $roomNumbers   = $data['roomNumbers'];
    $roomType      = json_decode($data['roomType'])[0];
    $moneyRoom     = $data['moneyRoom'];
    $moneyService  = $data['moneyService'];
    $moneyPayment  = $data['moneyPayment'];
?>
<div id="bill" class="grid">
    <div class="complete__container-currency text-right">
    <form class="complete__currency" action="">
            <label for="currency">Currency:</label>
            <select name="currency dropdown-menu" id="currency">
                <option value="dollar">US$ (USD)</option>
                <option value="euro">€ (EUR)</option>
                <option value="vnd">VND (VND)</option>
            </select>
    </form>
    </div>
    <div class="complete__container-header">
        <h1 class="complete__title text-center">Complete your booking</h1>
    </div>
    <div class="complete__container-show-day-booking row">
        <span class="col-12 complete__show-day-booking text-white">Your reservation - from <?php echo $checkin.' to '.$checkout.' ('. $amount.' night)'; ?></span>
    </div>

    <div class="complete__container-detail-hotel row">
        <div class="col-12 complete__detail-hotel-item complete__detail-hotel-name">Carlton Hotel</div>
        <div class="col-3">
            <div class="col-12 complete__detail-hotel-item text-bold">Reception work</div>
            <div class="col-12 complete__detail-hotel-item text-bold">Check-in after</div>
            <div class="col-12 complete__detail-hotel-item text-bold">Check-out before</div>
            <div class="col-12 complete__detail-hotel-item text-bold">Contact</div>
            <div class="col-12 complete__detail-hotel-item text-bold">Website</div>
        </div>
        <div class="col-3">
            <div class="col-12 complete__detail-hotel-item">24/7</div>
            <div class="col-12 complete__detail-hotel-item">14:00</div>
            <div class="col-12 complete__detail-hotel-item">11:00</div>
            <div class="col-12 complete__detail-hotel-item">0123456789</div>
            <div class="col-12 complete__detail-hotel-item"><a href="">carltonhotel.com</a></div>
        </div>
    </div>
    <div class="complete__container-detail-room row">
        <div class="col-3">
            <?php 
                foreach($roomNumbers as $roomNumber){
                        echo '
                        <p class="col-12 complete__detail-room-item text-bold">Room '.$roomNumber -> roomNumber.'</p>
                        <p class="col-12 complete__detail-room-item blur">'.$roomNumber -> guest.' adult</p>
                    ';
                    
                }
            ?>
        </div>
        <div class="col-6">
            <p class="col-12 complete__detail-room-item--roomtype text-bold"><?php echo $roomType -> roomType; ?></p>
            <p class="col-12 complete__detail-room-item">View: <?php echo ucfirst($roomType -> view) ?> view</p>
            <p class="col-12 complete__detail-room-item"><?php echo $roomType -> numberOfBed ?> King Beds</p>
            <p class="col-12 complete__detail-room-item">SPECIAL DEAL - 30' SPA VOUCHER</p>
        </div>
        <div class="col-3">
            <span class="col-12 complete__detail-room-item-price complete__detail-room-item-price-total"><?php echo $moneyRoom; ?> US$</span>
        </div>
    </div>

    <div class="complete__container-services row">
        <div class="col-3">
            <p class="col-12 complete__services-item text-bold">Services</p>
        </div>
        <div class="col-6">
            <?php 
            if($services[0]!=null){
                foreach($services as $service){
                    if($service!=null){
                        echo '<p class="col-12 complete__services-item">'.$service -> nameService.'</p>';
                    }
                }
            }
            ?>

        </div>
        <div class="col-3">
            <?php 
                if($services[0]!=null){
                    foreach($services as $service){
                        if($service!=null){
                            if($service -> unit == 'Day'){
                                $price = ($service -> price)*$amount;
                            } else {
                                $price = ($service -> price);
                            }
                            echo '<p class="col-12 complete__services-item-price">'.$price.' US$</p>';
                        }
                    }

                    echo '<p class="col-12 complete__services-item-price complete__services-item-price-total">'.$moneyService.' US$</p>';

                } else{
                    echo '<p class="col-12 complete__services-item-price"> 0 US$</p>';
                }
            ?>
            

        </div>
    </div>

    <div class="complete__container-special-request row">
        <div class="col-3">
            <div class="col-12 complete__special-request--item text-bold">Special request</div>
        </div>
        <div class="col-3">
            <div class="col-12 complete__special-request--item"><?php echo $request;?></div>
        </div>
    </div>

    <div class="complete__container-total row">
        <div class="col-3">
            <div class="col-12 complete__total-item text-bold">Total</div>
        </div>
        <div class="col-6"></div>
        <div class="col-3">
            <div class="col-12 complete__total-item text-bold"><?php echo $moneyPayment; ?> US$</div>
        </div>
    </div>

</div>

<div class="grid">
    <div class="complete__container-form-info row">
        <div class="col-6">
            <h1 class="col-12 complete__info-title text-center">Guest Infomation</h1>
            <form action="" class=" complete__form">
                <div class="container form-group">
                    <label class="complete__form-item" for="fullName">Full Name <span style="color:red;">*</span></label>
                    <input class="form-control complete__form-item" id="fullName" name="fullName" type="text">
                </div>
                <div class="container form-group">
                    <label class="complete__form-item" for="email">Email<span style="color:red;">*</span></label>
                    <input class="form-control complete__form-item" id="email" name="email" type="text">
                </div>
                <div class="container form-group">
                    <label class="complete__form-item" for="phoneNumber">Phone number<span style="color:red;">*</span></label>
                    <input class="form-control complete__form-item" id="phoneNumber" name="phoneNumber" type="tel">
                </div>
                <div class="container form-group">
                    <label class="complete__form-item" for="passport">Passport</label>
                    <input class="form-control complete__form-item" id="passport" name="passport" type="text">
                </div>

                <div class="container form-group complete__container-checkbox-terms">
                    
                    <label class="complete__form-item-checkbox" for="terms">
                    <input class="complete__form-item-checkbox" id="terms" name="terms" type="checkbox">
                        I acknowledge that I have read and accepted the terms states in the agreement.
                    </label>
                </div>

                <div class="container form-group text-center">
                    <input class="complete__btn-book" type="submit" value="BOOK">
                </div>
            </form>
        </div>
        <div class="col-6">
            <h1 class="col-12 complete__payments-title text-center">
                Payments
            </h1>

            <form class="complete__form-payment">
                <label class="complete__payment-item">
                    <input type="radio" checked="checked">
                    Payment upon check-in
                </label>
                <label class="complete__payment-item complete__payment-item-disable">
                    <input type="radio" disabled="disabled">
                    <div class="complete__payment-container-img">
                        <img src="/mvc/data/images/payments/visa.png" alt="" class="complete__payment-img">
                        <img src="/mvc/data/images/payments/mastercard.png" alt="" class="complete__payment-img">
                        <img src="/mvc/data/images/payments/amex.png" alt="" class="complete__payment-img">
                        <img src="/mvc/data/images/payments/dinersclub.png" alt="" class="complete__payment-img">
                        <img src="/mvc/data/images/payments/visaelectron.png" alt="" class="complete__payment-img">
                        <img src="/mvc/data/images/payments/jcb.png" alt="" class="complete__payment-img">

                    </div>
                </label>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    //In bill
    // window.jsPDF = window.jspdf.jsPDF;
    // Convert HTML content to PDF
    function Convert_HTML_To_PDF() {
        const quality = 1 // Higher the better but larger file
    html2canvas(document.querySelector('#bill'),
        { scale: quality }
    ).then(canvas => {
        const pdf = new jsPDF('p', 'mm', 'a4');
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 200);
        pdf.save("bill");
    });
    }
    //
</script> -->