var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');


window.addEventListener('resize', resizeCanvas, false);

function resizeCanvas() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  /**
   * Your drawings need to be inside this function otherwise they will be reset when
   * you resize the browser window and the canvas goes will be cleared.
   */
   ctx.fillStyle = '#ff0000';
   ctx.fillRect(0,0,150,75);
}
resizeCanvas();
