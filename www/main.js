//CROLL TO TOP
// Get the button:

if(document.getElementById("btn-to-top")){
    let mybutton = document.getElementById("btn-to-top");
    // When the user scrolls down 700px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
      if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
//   document.body.scrollTop = 0; // For Safari
//   document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    })
}



// Show menu when click button on mobile
if(document.getElementById("btn__show-menu--mobile")){
    document.getElementById("btn__show-menu--mobile").onclick = function(){
        btn = document.getElementById("header__menu");
        console.log()
        btn.style.display = (btn.style.display!="block")? "block" : "none";
    }

}
if(document.getElementById("header_user-name")){
    document.getElementById("header_user-name").onclick = function(){
        if(document.getElementById("header").style.overflow = "visible"){
            document.getElementById("header").style.overflow = "hidden";
        }
    }
}




if(document.getElementById("header_user-name")){
    document.getElementById('header_user-name').onclick = function(){
        if(document.getElementById("user__opption").style.display== ""){
            document.getElementById("user__opption").style.display= "block";
        } else 
        if(document.getElementById("user__opption").style.display== "none"){
            document.getElementById("user__opption").style.display= "block";
        }
        else{
            document.getElementById("user__opption").style.display="none";
        } 
    }
}



function readMoreWelcomePage() {
    var dots = document.getElementById("welcome-page__text--dots");
    var moreText = document.getElementById("welcome-page__text--more");
    var btnText = document.getElementById("welcome-page__readmore-btn");

    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more";
      moreText.style.display = "none";
      document.getElementById("welcome-page__image").style.display="block"
      document.getElementById("welcome-page__content").style.width="65%"
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less";
      moreText.style.display = "inline";
      document.getElementById("welcome-page__image").style.display="none"
      document.getElementById("welcome-page__content").style.width="100%"
    }
}

if(document.getElementById("profile__container-info")){
        if(document.getElementById("profile__container-info").style.display="block"){
            document.getElementById("to-page-info").style.color="rgba(217,134,0)";
        }
        document.getElementById('to-page-info').onclick = function(){
            document.getElementById("profile__container-info").style.display="block";
            document.getElementById("to-page-info").style.color="rgba(217,134,0)";
            document.getElementById("profile__container-change-pass").style.display="none";
            document.getElementById("to-page-change-pass").style.color="#000";
        }
        
        document.getElementById('to-page-change-pass').onclick = function(){
            document.getElementById("profile__container-change-pass").style.display="block";
            document.getElementById("to-page-change-pass").style.color="rgba(217,134,0)";
            document.getElementById("profile__container-info").style.display="none";
            document.getElementById("to-page-info").style.color="#000";
        }
        
        
        document.getElementById('btn-change-info').onclick = function(){
            const collection = document.getElementsByClassName("profile__main--info-text");
            for (let i = 0; i < collection.length; i++) {
                collection[i].style.display = "none";
            }
        
            const collection2 = document.getElementsByClassName("profile__change-input-change-info");
            for (let i = 0; i < collection2.length; i++) {
                collection2[i].style.display = "block";
            }
            document.getElementById("btn-submit-change-info").style.display="block";
            document.getElementById("cancel-change-info").style.display="block";
        }
        
        document.getElementById('cancel-change-info').onclick = function(){
            const collection = document.getElementsByClassName("profile__main--info-text");
            for (let i = 0; i < collection.length; i++) {
                collection[i].style.display = "block";
            }
        
            const collection2 = document.getElementsByClassName("profile__change-input-change-info");
            for (let i = 0; i < collection2.length; i++) {
                collection2[i].style.display = "none";
            }
            document.getElementById("btn-submit-change-info").style.display="none";
            document.getElementById("cancel-change-info").style.display="none";
        
        }
}




if(document.getElementById("container__dashBoard")){
    let id = document.getElementById('admin-dashboard');
    id.classList.add('category-current');
}

if(document.getElementById("container__bookingManager")){
    let id = document.getElementById('admin-booking');
    id.classList.add('category-current');
}

if(document.getElementById("container__userManager")){
    let id = document.getElementById('admin-user');
    id.classList.add('category-current');
}

if(document.getElementById("container__roomManager")){
    let id = document.getElementById('admin-room');
    id.classList.add('category-current');
}

if(document.getElementById("container__serviceManager")){
    let id = document.getElementById('admin-service');
    id.classList.add('category-current');
}


// Slide show

if(document.getElementById("slide-show__container")){
    let slides = document.getElementsByClassName("slide-show");
    if(slides!=0){
        let slideIndex = 1;
        showSlides(slideIndex);
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("slide-show");
            if (slideIndex > slides.length) {
                slideIndex = 1
            }  
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
    
            slides[slideIndex-1].style.display = "block";  
    
            //n???u ??ang ??? slide cu???i c??ng th?? chuy???n v??? slide ?????u
            if (slideIndex > slides.length) {
                slideIndex = 0
            } 
            setTimeout(showSlides,3000);
        }
        function plusSlides(n) {
            showSlides(slideIndex += n);
            
        }

        const next = document.getElementById('next-pic');
        const prev = document.getElementById('prev-pic');
        next.addEventListener('click', (event) => {
            plusSlides(1);
        });
        prev.addEventListener('click', (event) => {
            plusSlides(-1);
        });
    }

}

if(document.getElementById("add-room__btn")){
    document.getElementById("add-room__btn").onclick = function(){
        document.getElementById("container__form-add-room").style.display="block";
        document.getElementById("roomManager__table").style.display="none";
        document.getElementById("container-pagination").style.display="none";
    };
}

//Check form add Room
if(document.getElementById("container__form-add-room")){
    function logSubmit(event) {
        const roomNumber = document.getElementById("roomNumber").value;   
        const roomType = document.getElementById("roomType").value;
        if(roomNumber==""){
            notice.textContent = `Please enter room number!`;
            event.preventDefault();
        } else 
            if(roomType==""){
                notice.textContent = `Please choose room type!`;
                event.preventDefault();
            }
    }
    
    const form = document.getElementById('form-add-room');
    const notice = document.getElementById('notice--empty');
    form.addEventListener('submit', logSubmit);
}

//Check form add Room Type
if(document.getElementById("container__form-add-room")){
    function logSubmit(event) {
        const roomType = document.getElementById("roomtype").value;
        const beds = document.getElementById("beds").value;
        const area = document.getElementById("area").value;
        const price = document.getElementById("price").value;
        const image = document.getElementById("roomImages").value;
        const avatar = document.getElementById("roomAvatar").value;
        notice.textContent = ``;
        if(roomType==""){
            notice.textContent = `Please enter room type!`;
            console.log(roomType);
            event.preventDefault();
        } else 
            if(beds==""){
                notice.textContent = `Please enter number of bed!`;
                event.preventDefault();
            }  else 
                if(area==""){
                    notice.textContent = `Please enter area!`;
                    event.preventDefault();
                }  else 
                    if(price==""){
                        notice.textContent = `Please enter price!`;
                        event.preventDefault();
                    }else 
                        if(avatar==""){
                            notice.textContent = `Please upload avatar room!`;
                            event.preventDefault();
                        } else 
                            if(image==""){
                                notice.textContent = `Please upload room image!`;
                                event.preventDefault();
                            }  
    }
    
    const form = document.getElementById('form-add-roomtype');
    const notice = document.getElementById('notice--empty--roomtype');
    form.addEventListener('submit', logSubmit);


}

//Check form register
if(document.getElementById("register-form")){
    function logSubmit(event) {
        const fullName = document.getElementById("register-form--input-fullName").value;   
        const tel = document.getElementById("register-form--input-tel").value;
        const email = document.getElementById("register-form--input-email").value;
        const password = document.getElementById("register-form--input-password").value;
        const prepassword = document.getElementById("register-form--input-prepass").value;
        notice.textContent = ``;
        if(fullName==""){
            notice.textContent = `Please enter your full name!`;
            event.preventDefault();
        } else 
            if(tel==""){
                notice.textContent = `Please choose your phone number!`;
                event.preventDefault();
            }else 
                if(email==""){
                    notice.textContent = `Please enter your email!`;
                    event.preventDefault();
                }else 
                    if(password==""){
                        notice.textContent = `Please your password!`;
                        event.preventDefault();
                    }else 
                        if(prepassword==""){
                            notice.textContent = `Please enter pre-password!`;
                            event.preventDefault();
                        }

    }
    
    const form = document.getElementById('register-form');
    const notice = document.getElementById('notice--empty');
    form.addEventListener('submit', logSubmit);
}

//Check form login
if(document.getElementById("login-form")){
    function logSubmit(event) {
        const tel = document.getElementById("login-form--input-tel").value;   
        const pass = document.getElementById("login-form--input-pass").value;
        
        if(tel==""){
            notice.textContent = `Please enter your phone number!`;
            event.preventDefault();
        } else 
            if(pass==""){
                notice.textContent = `Please enter password!`;
                event.preventDefault();
            }
    }
    
    const form = document.getElementById('login-form');
    const notice = document.getElementById('notice--empty');
    form.addEventListener('submit', logSubmit);
}

//Check form login
if(document.getElementById("form-confirm")){
    function logSubmit(event) {
        const code = document.getElementById("confirm-input-code").value;   
        
        if(code==""){
            notice.textContent = `Please enter code!`;
            event.preventDefault();
        }
    }
    const form = document.getElementById('form-confirm');
    const notice = document.getElementById('notice--empty');
    form.addEventListener('submit', logSubmit);
}

if(document.getElementById("admin__container-categories")){
    btnHidden = document.getElementById("btn-collapse-sidebar");
    btnShow = document.getElementById("btn-show-sidebar");
    categories = document.getElementById("admin__container-categories");
    content = document.getElementById("admin__container-content");
    categoriesText = document.getElementsByClassName("admin__catogories--item-text");
    logo = document.getElementById("admin__logo");
    adminName = document.getElementById("admin-container-name");
    categoriesItem=document.getElementsByClassName("admin__categories--item");
    adminSetting = document.getElementById("admin-setting");
    //Collapse
    btnHidden.onclick = function (){
        categories.style.width="8.3%";
        content.style.width="91.7%";
        logo.style.display="none";
        adminName.style.display="none";
        
        //Hide categories text
        for(index =0; index<categoriesText.length;index++){
            categoriesText[index].style.display="none";
        };

        //change padding item
        for(index =0; index<categoriesItem.length;index++){
            categoriesItem[index].style.paddingLeft ="0";
            categoriesItem[index].style.textAlign = "center";
        };

        //Change padding admin setting
        adminSetting.style.paddingLeft="20px";
        //Hidden btn
        btnHidden.style.display="none";
        btnShow.style.display="block";
    }

    //Show
    btnShow.onclick = function (){
        categories.style.width="25%";
        content.style.width="75%";
        logo.style.display="block";
        adminName.style.display="block";
        
        //Hide categories text
        for(index =0; index<categoriesText.length;index++){
            categoriesText[index].style.display="inline-block";
        };

        //change padding item
        for(index =0; index<categoriesItem.length;index++){
            categoriesItem[index].style.paddingLeft ="40px";
            categoriesItem[index].style.textAlign = "left";
        
        };

        //Change padding admin setting
        adminSetting.style.paddingLeft="40px";
        //Hidden btn
        btnHidden.style.display="block";
        btnShow.style.display="none";
    }
}

// Back first page booking
function backFirstPageBooking(){
    //back page booking guest = document.getElementById("info-guest");
    btn_booking = document.getElementById("btn-info-booking");
    btn_guest = document.getElementById("btn-info-guest");
    btn_next = document.getElementById("page-booking__btn-next");
    btn_next_booking = document.getElementById("page-booking__btn-booking");
    booking = document.getElementById("info-booking");
    guest = document.getElementById("info-guest");
    
    
    booking.classList.add("page-booking__active");
    guest.classList.remove("page-booking__active");
    
    // BTN
    btn_booking.classList.add("booking-title__active");
    btn_guest.classList.remove("booking-title__active");
    document.getElementById("booking-title__action-active").style.left = '0';

    btn_next.classList.add("btn-active");
    btn_next_booking.classList.remove("btn-active");
}

//Check form booking
if(document.getElementById("form-search")){
    const date = document.getElementById("date");   
    const guest = document.getElementById("guest");
    const room = document.getElementById("numberOfRooms");
    const name = document.getElementById("fullName");
    const emai = document.getElementById("email");
    const phone = document.getElementById("phoneNumber");


    function logSubmit(event) {
        if(date.value==""){
            date.style.border ="1px solid rgba(255,0,0,0.5)";
            date.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
            backFirstPageBooking();
            // Not allow submit
            event.preventDefault();
        } else 
            if(guest.value==""){
                guest.style.border ="1px solid rgba(255,0,0,0.5)";
                guest.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
                backFirstPageBooking();
                event.preventDefault();
            } else 
                if(room.value==""){
                    room.style.border ="1px solid rgba(255,0,0,0.5)";
                    room.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
                    backFirstPageBooking();
                    event.preventDefault();
                }else 
                    if(name.value==""){
                        name.style.border ="1px solid rgba(255,0,0,0.5)";
                        name.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
                        event.preventDefault();
                    }else 
                        if(emai.value==""){
                            emai.style.border ="1px solid rgba(255,0,0,0.5)";
                            emai.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
                            event.preventDefault();
                        } else 
                            if(phone.value==""){
                                phone.style.border ="1px solid rgba(255,0,0,0.5)";
                                phone.style.boxShadow ="1px 0px 5px rgba(255,0,0,0.5)";
                                event.preventDefault();
                            }
    }

    if(document.getElementById("guest")){
        
            date.addEventListener('input', function() {
                date.style.border ="1px solid #ccc";
                date.style.boxShadow ="none";
            });
        
            guest.addEventListener('input', function() {
                guest.style.border ="1px solid #ccc";
                guest.style.boxShadow ="none";
            });
        
            room.addEventListener('input', function() {
                room.style.border ="1px solid #ccc";
                room.style.boxShadow ="none";
            });
    }

        
    const form = document.getElementById('form-search');
    form.addEventListener('submit', logSubmit);

}

//Close when click ouside
if(document.getElementById("container__settingRoom")){
    var settingRoom__image = document.getElementById("settingRoom__container--slide-show");
        document.onclick = function(e){
            if((e.target.classList[0] == "settingRoom__image")){
                
                settingRoom__image.style.display = 'block';
            } else 
                if((e.target.id !== "settingRoom__image") && (e.target.id !== "prev-pic") && (e.target.id !== "next-pic")){
                    //element clicked wasn't the div; hide the div
                    if(settingRoom__image.style.display !== 'none'){
                        settingRoom__image.style.display = 'none';
                    }
                } 
        };

}

//Show overview/ Amenities
if(document.getElementById("page-booking__container-detail")){
    var overview = document.getElementById("page-booking--overview-btn");
    var amenities = document.getElementById("page-booking--amenities-btn");
    var overview_content = document.getElementById("page-booking__container--detail-content");
    var amenities_content = document.getElementById("page-booking__container--amenities-list");
    overview.onclick = function(){
        amenities_content.classList.remove("active-content");
        amenities.classList.remove("active-menu");
        overview_content.classList.add("active-content");
        overview.classList.add("active-menu");

    }

    amenities.onclick = function(){
        amenities_content.classList.add("active-content");
        overview_content.classList.remove("active-content");
        amenities.classList.add("active-menu");
        overview.classList.remove("active-menu");


    }
}

// BOOKING PAGE
if(document.getElementById("form-booking")){
    btn_booking = document.getElementById("btn-info-booking");
    btn_guest = document.getElementById("btn-info-guest");
    btn_next = document.getElementById("page-booking__btn-next");
    btn_next_booking = document.getElementById("page-booking__btn-booking");
    
    btn_booking.addEventListener("click", function(){
        
        booking = document.getElementById("info-booking");

        if(booking.classList.contains("page-booking__active")){
            return;
        } else {
            backFirstPageBooking();
        }

    });


    btn_guest.addEventListener("click", function(){
        
        guest = document.getElementById("info-guest");
        if(guest.classList.contains("page-booking__active")){
            return;
        } else {
            booking = document.getElementById("info-booking");
            guest.classList.add("page-booking__active");
            booking.classList.remove("page-booking__active");

            // BTN
            btn_booking.classList.remove("booking-title__active");
            btn_guest.classList.add("booking-title__active");
            document.getElementById("booking-title__action-active").style.left = '50%';
            btn_next.classList.remove("btn-active");
            btn_next_booking.classList.add("btn-active");
        
        }
        
    });

    btn_next.addEventListener("click", function(){
        guest = document.getElementById("info-guest");
        if(guest.classList.contains("page-booking__active")){
            return;
        } else {
            booking = document.getElementById("info-booking");
            guest.classList.add("page-booking__active");
            booking.classList.remove("page-booking__active");

            // BTN
            btn_booking.classList.remove("booking-title__active");
            btn_guest.classList.add("booking-title__active");
            document.getElementById("booking-title__action-active").style.left = '50%';
            
            btn_next.classList.remove("btn-active");
            btn_next_booking.classList.add("btn-active");
        }
        
    });

    


    // let items = document.querySelectorAll('li');

    // items.forEach(li =>{
    //     li.addEventListener("click", function(e){
    //         document.getElementById("action").style.left = e.target.offsetLeft + "px";
    //         items.forEach(li_hide =>{
    //             li_hide.classList.remove('btn-active');
    //         })
    //         this.classList.add("btn-active");
    //     })
    // })
}




//AJAX
//check exist room number
if(document.getElementById("roomNumber")){
    $("#roomNumber").keyup(function(){
        const notice = document.getElementById('notice--empty');
        notice.textContent = ``;
        var num = $(this).val();
        if(num==""){
            $("#messageRoomNumber").html("");
        }
        else{
            $.post("/ajax/checkRoomNumber", {roomNumber: num}, function(data){
                    $("#messageRoomNumber").html(data);
                    // if(data!=""){
                    //     function logSubmit(event) {
                    //         event.preventDefault();
                    //     }
                    //     const form = document.getElementById('form-add-room');
                    //     form.addEventListener('submit', logSubmit);
                    // }
            });
        }
    });
}

//check exist room type
if(document.getElementById("roomtype")){
    $("#roomtype").keyup(function(){
        var num = $(this).val();
        if(num==""){
            $("#messageRoomType").html("");
        }
        else{
            $.post("/ajax/checkRoomType", {roomType: num}, function(data){
                    $("#messageRoomType").html(data);
                    // if(data!=" \n"){
                    //     function logSubmit(event) {
                    //         event.preventDefault();
                    //     }
                    //     const form = document.getElementById('form-add-roomtype');
                    //     form.addEventListener('submit', logSubmit);
                    // }
            });
        }
    });
}

//Check exist input
if(document.getElementById("register-form")){
    $("#register-form--input-fullName").keyup(function(){
        const notice = document.getElementById('notice--empty');
        notice.textContent = ``;
    });

    //Phone number
    $("#register-form--input-tel").keyup(function(){
        const notice = document.getElementById('notice--empty');
        notice.textContent = ``;
        var phone = $(this).val();
        if(phone==""){
            $("#notice__exist-phone-number").html("");
        }
        else{
            $.post("/ajax/checkphoneNumber", {phoneNumber: phone}, function(data){
                $("#notice__exist-phone-number").html(data);
            });
        }
    });

    //Email
    $("#register-form--input-email").keyup(function(){
        const notice = document.getElementById('notice--empty');
        notice.textContent = ``;
        var mail = $(this).val();
        if(mail==""){
            $("#notice__exist-email").html("");
        }
        else{
            $.post("/ajax/checkEmail", {email: mail}, function(data){
                $("#notice__exist-email").html(data);
            });
        }
    });

    //Check correct repeat pass
    $("#register-form--input-prepass").keyup(function(){
        var pass= $("#register-form--input-password").val();
        var prepass = $(this).val();
        icon = document.getElementById("icon-check-pass");
        if(prepass==""){
            icon.style.display="none";
        } else
            if(prepass===pass){
                icon.style.display="block";
                icon.style.color="green";
            } else{
                if(prepass!==pass){
                    icon.style.display="block";
                    icon.style.color="red";
                }
            }
    });
}




  

if(document.getElementsByClassName("format-money")){
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
}









function getCurrentDate(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = mm + '/' + dd + '/' + yyyy;
    return today;
}
//V?? hi???u h??a ch???n ng??y trong qu?? kh???
if(document.getElementById("form-search")){
    $(function() {
        $('input[name="datefilter"]').daterangepicker({
            "minSpan": {
                "days": 7
            },
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            "minDate": getCurrentDate(),
            "autoApply": true,
            "drops": 'auto'
            
        });

      
        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
      
        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
      
      });
}

