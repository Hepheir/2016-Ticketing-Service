function topHiddenToggle(t){
  if (t % 2 == 0)
    document.getElementById("topHidden").className = "";
  else
    document.getElementById("topHidden").className = "hidden";
  drawerToggle++;
}
function topMenuToggle(){
  if (window.innerWidth >= 440) {
    document.getElementById("topMenuIcon").style.display = "none";
    document.getElementById("topTitle").style.marginLeft = "12px";
    document.getElementById("topMenuText").style.display = "inline-block";
  }
  else{
    document.getElementById("topMenuIcon").style.display = "inline-block";
    document.getElementById("topTitle").style.marginLeft = "0px";
    document.getElementById("topMenuText").style.display = "none";
  }
}
