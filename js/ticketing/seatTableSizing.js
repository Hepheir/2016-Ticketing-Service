function seatTableSizing(cols,rows){
  var border = 2; //table border-spacing
  var width;
  if (window.innerWidth < 400){
    width = Math.round(240/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else if (window.innerWidth < 640){
    width = Math.round(320/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else if (window.innerWidth < 920){
    width = Math.round(480/(cols+1));
    document.getElementById('Content').style.width = seatTableCalc(cols,rows,border,width)[0]+'px';
    document.getElementById('seatTable').style.height = seatTableCalc(cols,rows,border,width)[1]+'px';
  }
  else{
    width = Math.round(640/(cols+1));
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
