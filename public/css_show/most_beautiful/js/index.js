var c = document.getElementById("c");
var ctx = c.getContext("2d");
var cw = c.width = 500;
var ch = c.height = 500;
var cx = cw / 2,
  cy = ch / 2;
var rad = Math.PI / 180;
var frames = 0;

ctx.lineWidth = 1;
ctx.strokeStyle = "hsla(274,48%,52%,.5)";
ctx.shadowBlur = 15;
ctx.shadowOffsetX = 1;
ctx.shadowOffsetY = 1;
ctx.shadowColor = "hsla(274,48%,52%,1)";

var I = 25;
var a = 6 * I;
var b = 1 * I;

var h = 0;
var rotation = 0;
var step = 29;
var initialValue = 75;

function Draw() {
  rotation += .05
  initialValue = 10 + 75 * (Math.cos(rotation * .001 * rad));
  h = 20 + 80 * (Math.cos(rotation * rad))
  var I = 25;
  var a = 6 * I;
  var b = 1 * I;
  step = initialValue + 150 * (Math.sin(.01 * rotation * rad));

  ctx.clearRect(0, 0, cw, ch);
  ctx.beginPath();
  for (var T = 0; T < 360 * b; T += step) {
    var t = T * rad;
    var x = cx + (a - b) * Math.cos(t) + h * Math.cos(rotation + (a - b) / b * t);
    var y = cy + (a - b) * Math.sin(t) - h * Math.sin(rotation + (a - b) / b * t);
    ctx.lineTo(x, y);
  }
  ctx.stroke();
  ctx.globalCompositeOperation = "lighter";
  requestId = window.requestAnimationFrame(Draw);
}
requestId = window.requestAnimationFrame(Draw);