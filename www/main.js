

//CROLL TO TOP
// Get the button:
let mybutton = document.getElementById("btn-to-top");




if(document.getElementById("btn-to-top")){
    // When the user scrolls down 700px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
      if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// Show menu when click button on mobile
if(document.getElementById("header__btn-menu--mobile")){
    document.getElementById("header__btn-menu--mobile").onclick = function(){
        if(document.getElementById("header").style.overflow==""){
            document.getElementById("header").style.overflow = "visible";
            
        }
        else if(document.getElementById("header").style.overflow=="hidden"){
            document.getElementById("header").style.overflow = "visible";
            
        }
        else{
            document.getElementById("header").style.overflow = "hidden";
        }
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
        }
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
    
            //nếu đang ở slide cuối cùng thì chuyển về slide đầu
            if (slideIndex > slides.length) {
                slideIndex = 0
            } 
        }
        function plusSlides(n) {
            showSlides(slideIndex += n);
            
        }

        const next = document.getElementById('next');
        const prev = document.getElementById('prev');
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
        const roomAvatar = document.getElementById("roomAvatar").value;
        const roomImages = document.getElementById("roomImages").value;
        if(roomNumber==""){
            notice.textContent = `Please enter room number!`;
            event.preventDefault();
        } else 
            if(roomType==""){
                notice.textContent = `Please choose room type!`;
                event.preventDefault();
            }else 
                if(roomAvatar==""){
                    notice.textContent = `Please choose room avatar!`;
                    event.preventDefault();
                }else 
                    if(roomImages==""){
                        notice.textContent = `Please choose room image!`;
                        event.preventDefault();
                    }
    }
    
    const form = document.getElementById('form-add-room');
    const notice = document.getElementById('notice--empty');
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
        categories.style.width="20%";
        content.style.width="80%";
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

//Close when click ouside
if(document.getElementById("container__settingRoom")){
    var settingRoom__image = document.getElementById("settingRoom__container--slide-show");
        document.onclick = function(e){
            if((e.target.classList[0] == "settingRoom__image")){
                
                settingRoom__image.style.display = 'block';
            } else 
                if((e.target.id !== "settingRoom__image") && (e.target.id !== "prev") && (e.target.id !== "next")){
                    //element clicked wasn't the div; hide the div
                    if(settingRoom__image.style.display !== 'none'){
                        settingRoom__image.style.display = 'none';
                    }
                } 
        };

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



