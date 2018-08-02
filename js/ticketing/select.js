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
function topDrawer(t){
  if (t % 2 == 0) {
    document.getElementById("topHidden").className = "";
  }
  else {
    document.getElementById("topHidden").className = "hidden";
  }
  drawerToggle++;
}
function tableResize(cols, rows){
  if (window.innerWidth < 600) {
    for (var i = 0; i < rows; i++) {
      document.getElementById('default_'+String.fromCharCode(65+i)+'1').style.height = '20px';
    }
    document.getElementById('defaultTableWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 20)+'px';
    document.getElementById('defaultTableWrap').style.height = ((rows + 1) * 4 + (rows + 1) * 20 + 24)+'px';
    document.querySelector("caption.default").style.fontSize = '20px';

    document.getElementById('nextWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 20)+'px';
  }
  else if (window.innerWidth < 720) {
    for (var i = 0; i < rows; i++) {
      document.getElementById('default_'+String.fromCharCode(65+i)+'1').style.height = '24px';
    }
    document.getElementById('defaultTableWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 24)+'px';
    document.getElementById('defaultTableWrap').style.height = ((rows + 1) * 4 + (rows + 1) * 24 + 24)+'px';
    document.querySelector("caption.default").style.fontSize = '24px';

    document.getElementById('nextWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 24)+'px';
  }
  else if (window.innerWidth < 920) {
    for (var i = 0; i < rows; i++) {
      document.getElementById('default_'+String.fromCharCode(65+i)+'1').style.height = '28px';
    }
    document.getElementById('defaultTableWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 28)+'px';
    document.getElementById('defaultTableWrap').style.height = ((rows + 1) * 4 + (rows + 1) * 28 + 24)+'px';
    document.querySelector("caption.default").style.fontSize = '28px';

    document.getElementById('nextWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 28)+'px';
  }
  else {
    for (var i = 0; i < rows; i++) {
      document.getElementById('default_'+String.fromCharCode(65+i)+'1').style.height = '32px';
    }
    document.getElementById('defaultTableWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 32)+'px';
    document.getElementById('defaultTableWrap').style.height = ((rows + 1) * 4 + (rows + 1) * 32 + 24)+'px';
    document.querySelector("caption.default").style.fontSize = '32px';

    document.getElementById('nextWrap').style.maxWidth = ((cols + 2) * 4 + (cols + 1) * 32)+'px';
  }
  screenResize();
}
