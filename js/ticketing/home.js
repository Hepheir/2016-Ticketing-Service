function imgSectionResize(){
  if (window.innerHeight > 1.34*window.innerWidth) {
    document.getElementById("imgSectionWrap").style.height = '40%';
    document.getElementById("imgSectionFix").style.maxWidth = Math.round(3/5*window.innerHeight)+'px';
    document.getElementById('dotContainerPosition').style.top = '40%';
    document.getElementById('menuContainer').style.height = '160px';
  }
  else{
    document.getElementById("imgSectionWrap").style.height = '50%';
    document.getElementById("imgSectionFix").style.maxWidth = Math.round(3/4*window.innerHeight)+'px';
    document.getElementById('dotContainerPosition').style.top = '50%';
    document.getElementById('menuContainer').style.height =  (Math.floor(1/2*window.innerHeight) - 48)+'px';
  }
}
function dotAnimation(n){
  switch (n) {
    case 1:
      document.getElementById('dot_1').className = 'dot fl selected';
      document.getElementById('dot_2').className = 'dot fl';
      document.getElementById('dot_3').className = 'dot fl';

      document.getElementById('img_1').style.right = 0+'%';
      document.getElementById('img_2').style.right = 0+'%';
      document.getElementById('img_3').style.right = 0+'%';

      t = n - 1;
      break;

    case 2:
      document.getElementById('dot_1').className = 'dot fl';
      document.getElementById('dot_2').className = 'dot fl selected';
      document.getElementById('dot_3').className = 'dot fl';

      document.getElementById('img_1').style.right = 33+'%';
      document.getElementById('img_2').style.right = 33+'%';
      document.getElementById('img_3').style.right = 33+'%';

      t = n - 1;
      break;

    case 3:
      document.getElementById('dot_1').className = 'dot fl';
      document.getElementById('dot_2').className = 'dot fl';
      document.getElementById('dot_3').className = 'dot fl selected';

      document.getElementById('img_1').style.right = 66+'%';
      document.getElementById('img_2').style.right = 66+'%';
      document.getElementById('img_3').style.right = 66+'%';

      t = n - 1;
      break;

    default:
      dotAnimation(t % 3 + 1);
      t++;
      break;
  }
}
