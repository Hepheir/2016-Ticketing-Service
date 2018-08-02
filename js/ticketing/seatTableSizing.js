function seatTableSizing(cols,rows){
  var border = 2; //table border-spacing
  var width;
  if (window.innerWidth < 320){
    width = Math.round(240/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else if (window.innerWidth < 480){
    width = Math.round(280/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else if (window.innerWidth < 640){
    width = Math.round(400/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else{
    width = Math.round(560/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
}
function seatTableCalc(cols,rows,border,width){
  var r = new Array();
  r[0] = width*(cols+1) + border*(cols+1); //containing hall
  r[1] = width*rows + border*(rows+1) + 50; //caption height
  return r;
}
