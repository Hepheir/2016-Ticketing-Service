//페이지 새로고침시 배경이미지를 화면크기에 맞추어 채워지도록 크기 조정 (배경이미지 가로 세로 비율 = horizontal:vertical)
function windowResize(horizontal,vertical){
  if (vertical*window.innerWidth >= horizontal*window.innerHeight){
    document.getElementById('background').style.width = '100%';
    document.getElementById('background').style.height = vertical/horizontal*window.innerWidth+'px';
  }
  else{
    document.getElementById('background').style.width = horizontal/vertical*window.innerHeight+'px';
    document.getElementById('background').style.height = '100%';
  }
}
