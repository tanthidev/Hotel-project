<?php 
    $bookingCode = $data['bookingCode'];
    $guest = json_decode($data['guest']);
    $dateOfStay = $data['dateOfStay'];
    $room = json_decode($data['room'])[0];
    // print_r($room);
    $quantityRoom = $data['quantityRoom'];
    $amountRoom = $quantityRoom * $room -> price * $dateOfStay;
    $services = json_decode($data['services']);
    $VAT = ($guest -> total) -  ($guest -> total/1.08);
?>


<div class="grid" style="text-align: right; margin-top: 30px;">
    <button class="btn-download"onclick="Convert_HTML_To_PDF()">Download Invoice</button>
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
                        <div class="complete__detail-hotel-item"><?php echo $guest -> dateBooking; ?></div>
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
                            echo '
                                <div class="complete__detail-hotel-item">'.$guest->FullName.'</div>
                                <div class="complete__detail-hotel-item">'.$guest->email.'</div>
                                <div class="complete__detail-hotel-item">'.$guest->phoneNumber.'</div>
                                <div class="complete__detail-hotel-item">'.$guest->checkIn.'</div>
                                <div class="complete__detail-hotel-item">'.$guest->checkOut.'</div>
                                <div class="complete__detail-hotel-item">'.$dateOfStay.'</div>
                            ';
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
                echo'
                <tr class="grid__row">
                    <td class="grid__column-10-1 bill__bill-detail--item">1</td>
                    <td class="grid__column-10-2 bill__bill-detail--item">'.$room -> roomType.'</td>
                    <td class="grid__column-10-2 bill__bill-detail--item">
                    '.$room-> view.' view <br> '.$room-> numberOfBed.' King Bed
                    </td>
                    <td class="grid__column-10-1 bill__bill-detail--item">'.$quantityRoom.'</td>
                    <th class="grid__column-10-1 bill__bill-detail--item">'.$guest->numberGuest.'</th>
                    <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$room -> price.'</td>
                    <th class="grid__column-10-1 bill__bill-detail--item"></th>
                    <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$amountRoom.'</td>
                </tr>
                ';

                foreach($services as $service){
                    echo '
                    <tr class="grid__row">
                        <td class="grid__column-10-1 bill__bill-detail--item">'.$no++.'</td>
                        <td class="grid__column-10-2 bill__bill-detail--item">'.$service -> nameService.'</td>
                        <td class="grid__column-10-2 bill__bill-detail--item"></td>
                        <td class="grid__column-10-1 bill__bill-detail--item"></td>
                        <th class="grid__column-10-1 bill__bill-detail--item">'.$guest->numberGuest.'</th>
                        <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$service -> price.'</td>
                        <th class="grid__column-10-1 bill__bill-detail--item"></th>
                        <td class="grid__column-10-1 bill__bill-detail--item format-money">'.$service -> total.'</td>
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
            <td class="grid__column-10-2 bill__total--item bill__total--item-price format-money"><?php echo $guest -> total; ?></td>
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
        <p style="width: 80%; padding-left: 30px"><?php echo $guest -> specialReq; ?></p>
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