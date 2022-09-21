



// Show task login/ register when click

//Hidden when click X
document.getElementById('login-cancel').onclick = function(){
    document.getElementById("wrap-login").style.display= "none";
}
document.getElementById('register-cancel').onclick = function(){
    document.getElementById("wrap-register").style.display= "none";
}


//To other task

document.getElementById("header__user--login").onclick = function() {
    document.getElementById("wrap-login").style.display = "flex";
}

document.getElementById("header__user--register").onclick = function() {

    if(document.getElementById("wrap-login").style.display = "flex")
        document.getElementById("wrap-login").style.display = "none";
    document.getElementById("wrap-register").style.display = "flex"; 
}

document.getElementById("header__user--login").onclick = function() {
    if(document.getElementById("wrap-register").style.display = "flex")
        document.getElementById("wrap-register").style.display = "none";
    document.getElementById("wrap-login").style.display = "flex";
}

// form task login to register
document.getElementById("login-form__to-register--text").onclick = function() {
    document.getElementById("wrap-login").style.display = "none";
    document.getElementById("wrap-register").style.display = "flex";
}
// from task register to login
document.getElementById("register-form__to-login--text").onclick = function() {
    document.getElementById("wrap-register").style.display = "none";
    document.getElementById("wrap-login").style.display = "flex";
}






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
document.getElementById("header__menu--list").onclick = function(){
    if(document.getElementById("header").style.overflow = "visible"){
        document.getElementById("header").style.overflow = "hidden";
    }
}

// document.getElementById("header__user").onclick = function(){
//     if(document.getElementById("header").style.overflow = "visible"){
//         document.getElementById("header").style.overflow = "hidden";
//     }
// }


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


// Slide show
let slides = document.getElementsByClassName("favorite-rooms__slide");
if(slides!=0){
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("favorite-rooms__slide");
        let dots = document.getElementsByClassName("dot");
        if (slideIndex > slides.length) {
            slideIndex = 1
        }  
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";

        //nếu đang ở slide cuối cùng thì chuyển về slide đầu
        if (slideIndex > slides.length) {
            slideIndex = 0
        } 
        //tự động chuyển đổi slide sau 5s
        setTimeout(showSlides, 4000);
    }
}


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
document.onclick = function(event){
    if(event.target.id != "header_user-name"){
        document.getElementById("user__opption").style.display="none";
    }
}

