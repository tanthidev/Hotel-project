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
