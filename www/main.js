

//CROLL TO TOP
// Get the button:
let mybutton = document.getElementById("btn-to-top");

// When the user scrolls down 700px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
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


document.onclick = function(event){
    if(event.target.id != "header_user-name"){
        document.getElementById("user__opption").style.display="none";
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

if(document.getElementById("favorite-rooms__container")){
    let slides = document.getElementsByClassName("favorite-rooms__slide");
    if(slides!=0){
        let slideIndex = 1;
        showSlides(slideIndex);
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }
    
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("favorite-rooms__slide");
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



    $("#roomNumber").keyup(function(){
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




