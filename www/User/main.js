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

