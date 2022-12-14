<?php 
    $checkin       = $data['checkin'];
    $checkout      = $data['checkout'];
    $bill          = $data['bill'];
    $infoguest     = $data['infoGuest'];
    $totalPayment  = $data['TotalPayment'];
    $request       = $data['request'];
    $bookingId     = $data['bookingId'];
    $dateBooking   = $data['dateBooking'];
    $totalVAT      = $data['totalVAT'];
    $VAT           = $data['VAT'];
    $bookingCode   = $data['bookingCode'];
?>


<div class="grid" style="text-align: right; margin-top: 30px;">
    <button class="btn-download"onclick="Convert_HTML_To_PDF()">Download Invoice</button>
    <button id="btn-confirm-booking" class="btn-confirm-booking">Confirm Booking</button>
</div>
<div id="bill" class="grid">
    <div class="header-bill">
        <img class="header-bill__logo" src="/mvc/data/images/logo/logo-company.png" alt="">
    </div>
    <div class="bill__info-guest-hotel">
        <div class="grid__row">
            <div class="grid__column-2">
                <div class="grid__row">
                    <div class="grid__column-3">
                    <div class="complete__detail-hotel-item text-bold">Booking Code</div>
                        <div class="complete__detail-hotel-item text-bold">Date</div>
                        <div class="complete__detail-hotel-item text-bold">Check-in</div>
                        <div class="complete__detail-hotel-item text-bold">Check-out</div>
                        <div class="complete__detail-hotel-item text-bold">Contact</div>
                        <div class="complete__detail-hotel-item text-bold">Website</div>
                    </div>
                    <div class="grid__column-3--2">
                        <div class="complete__detail-hotel-item"><?php echo $bookingCode; ?></div>
                        <div class="complete__detail-hotel-item"><?php echo $dateBooking; ?></div>
                        <div class="complete__detail-hotel-item">After 14:00</div>
                        <div class="complete__detail-hotel-item">Before 11:00</div>
                        <div class="complete__detail-hotel-item">0123456789</div>
                        <div class="complete__detail-hotel-item"><a href="">carltonhotel.com</a></div>
                    </div>
                </div>
            </div>

            <div class="grid__column-2">
                <div class="grid__row">
                    <div class="grid__column-3">
                        <div class="complete__detail-hotel-item text-bold">Name</div>
                        <div class="complete__detail-hotel-item text-bold">Email</div>
                        <div class="complete__detail-hotel-item text-bold">Phone Number</div>
                        <div class="complete__detail-hotel-item text-bold">Check-in</div>
                        <div class="complete__detail-hotel-item text-bold">Check-out</div>
                        <div class="complete__detail-hotel-item text-bold">Dates of stay</div>
                    </div>
                    <div class="grid__column-3--2">
                        <?php 
                            foreach($infoguest as $item){
                                echo '<div class="complete__detail-hotel-item">'.$item.'</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="bill__bill-detail">
        <tr class="grid__row">
            <th class="grid__column-10-1 bill__bill-detail--header">No</th>
            <th class="grid__column-10-2 bill__bill-detail--header">Product</th>
            <th class="grid__column-10-2 bill__bill-detail--header">Description</th>
            <th class="grid__column-10-1 bill__bill-detail--header">Quantity</th>
            <th class="grid__column-10-1 bill__bill-detail--header">Guest</th>
            <th class="grid__column-10-1 bill__bill-detail--header">Price</th>
            <th class="grid__column-10-1 bill__bill-detail--header">Unit</th>
            <th class="grid__column-10-1 bill__bill-detail--header">Amount</th>
        </tr>
    

        <?php 
            $no = 1;
            foreach($bill as $item){
                // print_r($item);
                echo'
                <tr class="grid__row">
                    <td class="grid__column-10-1 bill__bill-detail--item">'.$no++.'</td>
                    <td class="grid__column-10-2 bill__bill-detail--item">'.$item["product"].'</td>
                    <td class="grid__column-10-2 bill__bill-detail--item">'.$item["description"].'</td>
                    <td class="grid__column-10-1 bill__bill-detail--item">'.$item["quantity"].'</td>
                    <th class="grid__column-10-1 bill__bill-detail--item">'.$item["guest"].'</th>
                    <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$item["price"].'</td>
                    <th class="grid__column-10-1 bill__bill-detail--item">'.$item["unit"].'</th>
                    <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$item["amount"].'</td>
                </tr>
                ';
            }
        ?>

        <!-- Status -->
        <tr class="grid__row bill__status">
            <td class="grid__column-10-2" style="font-size: 20px;">VAT (8%):</td>
            <td class="grid__column-10-1"></td>
            <td class="grid__column-10-2"></td>
            <td class="grid__column-10-1"></td>
            <td class="grid__column-10-1"></td>
            <th class="grid__column-10-1"></th>
            <td class="grid__column-10-2 bill__total--item-price format-money" style="font-size: 20px; color: #212529;"><?php echo $VAT; ?></td>
        </tr>

        <!-- Total -->
        <tr class="grid__row bill__total">
            <td class="grid__column-10-1 bill__total--item">Total</td>
            <td class="grid__column-10-2"></td>
            <td class="grid__column-10-2"></td>
            <td class="grid__column-10-1"></td>
            <td class="grid__column-10-1"></td>
            <th class="grid__column-10-1"></th>
            <td class="grid__column-10-2 bill__total--item bill__total--item-price format-money"><?php echo $totalVAT; ?></td>
        </tr>

        <!-- Status -->
        <tr class="grid__row bill__status">
            <td class="grid__column-10-1 bill__status--item">Status</td>
            <td class="grid__column-10-2"></td>
            <td class="grid__column-10-2"></td>
            <td class="grid__column-10-1"></td>
            <td class="grid__column-10-1"></td>
            <th class="grid__column-10-1"></th>
            <th class="grid__column-10-1"></th>
            <td class="grid__column-10-1 bill__status--item">Unpaid</td>
        </tr>
        

    </table>
    
    <div class="bill__request">
        <p class="text-bold bill__request--title">Special request:</p>
        <p style="width: 80%; padding-left: 30px"><?php echo $request; ?></p>
    </div>

    <div class="footer-bill">
        THANK YOU FOR YOUR VISIT
    </div>
    
</div>






<script>
    
    // window.jsPDF = window.jspdf.jsPDF;
    // Convert HTML content to PDF
    function Convert_HTML_To_PDF() {
        width = document.getElementById("bill").offsetWidth;
        height = document.getElementById("bill").offsetHeight;
        ratio = height/width
        a = (300 - 200*ratio)/2;
        const quality = 2 // Higher the better but larger file
        html2canvas(document.querySelector('#bill'),
            { scale: quality }
        ).then(canvas => {
            const pdf = new jsPDF('p', 'mm', 'a4');
            pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 5, 30, 200, 200*ratio);
            pdf.save("Carlton");
        });
    }
    document.getElementById("btn-confirm-booking").onclick = function(){
        location.href = '/booking/confirmBooking/?bookingCode=<?php echo $bookingCode;?>&email=<?php echo $infoguest['email'];?>';
    }

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