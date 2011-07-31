jQuery(document).ready(function($) {

$('<canvas id="canvas" width="950" height="125"></canvas>').prependTo('#page_wrapper');

function fall (flakes,fmaxr) {
  step = 0.4;
  for ( i=0; i < flakes.length; i++ )
      flakes[i][1] += step*flakes[i][2];
}

function checkFlakesPosition(flakes,fmaxr,canvash) {
  for ( i=0; i < flakes.length; i++ )
  if ( flakes[i][1] > canvash+fmaxr ) {
      flakes[i][1] = -fmaxr;
      flakes[i][2] = Math.random()*fmaxr;
  }
}

function draw (flakes,canvasw,canvash,ctx) {
  ctx.clearRect(0,0,canvasw,canvash);
  for ( i=0; i < flakes.length; i++ ) {
      ctx.fillStyle = "rgba(255, 255, 255, " + .9 * ( canvash-flakes[i][1] )/canvash + ")"
      ctx.beginPath();
      ctx.arc(flakes[i][0], flakes[i][1], flakes[i][2], 0, Math.PI*2, true); 
      ctx.closePath();
      ctx.fill();
  }
}

function animation (flakes,fcount,fmaxr,canvasw,canvash,ctx)
{
  draw(flakes,canvasw,canvash,ctx);
  fall(flakes,fmaxr);
  checkFlakesPosition(flakes,fmaxr,canvash);
}

if (document.getElementById('canvas').getContext('2d'))
{ 
  var ctx = document.getElementById('canvas').getContext('2d');

  var fcount  = 80;
  var flakes  = new Array();
  var fmaxr   = 10;
  var canvasw = 950; // must match the value of the HTML element
  var canvash = 125; // must match the value of the HTML element

  // init flakes
  for ( i=0; i < fcount; i++ ) {
      flakes[flakes.length] = new Array();
      flakes[flakes.length-1][0] = 10+Math.random()*(canvasw-2*fmaxr); // x
      flakes[flakes.length-1][1] = -fmaxr; // y
      flakes[flakes.length-1][2] = 0.2*fmaxr + Math.random()*(0.8*fmaxr); // r
      flakes[flakes.length-1][3] = 0; // type
  }

  setInterval(function(){animation(flakes,fcount,fmaxr,canvasw,canvash,ctx)},50);
}

});