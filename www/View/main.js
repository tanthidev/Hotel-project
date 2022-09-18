// Show task login/ register when click

//Hidden when click X
document.getElementById('login-cancel').onclick = function(){
    document.getElementById("wrap-login").style.display= "none";
}
document.getElementById('register-cancel').onclick = function(){
    document.getElementById("wrap-register").style.display= "none";
}
document.getElementById('forgot-cancel').onclick = function(){
    document.getElementById("wrap-forgot").style.display= "none";
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

//from task login to forgot
document.getElementById('login-form__to-forgot').onclick = function(){
    document.getElementById("wrap-login").style.display= "none";
    document.getElementById("wrap-forgot").style.display= "flex";
}

//from task forgot to login
document.getElementById('forgot-back').onclick = function(){
    document.getElementById("wrap-login").style.display= "flex";
    document.getElementById("wrap-forgot").style.display= "none";
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