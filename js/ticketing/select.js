function screenResize(){
  if (window.innerWidth >= 440) {
    document.getElementById("topIcon").style.display = "none";
    document.getElementById("topText").style.marginLeft = "12px";
    document.getElementById("topMenu").style.display = "inline-block";
  }
  else{
    document.getElementById("topIcon").style.display = "inline-block";
    document.getElementById("topText").style.marginLeft = "0px";
    document.getElementById("topMenu").style.display = "none";
  }
}
