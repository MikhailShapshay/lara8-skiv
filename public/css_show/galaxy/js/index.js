"use strict";

var canvas = document.querySelector("canvas"),
    context = canvas.getContext("2d");

function rgb(v) {
  return "rgb(" + Math.round(v.x * 0xFF) + "," + Math.round(v.y * 0xFF) + "," + Math.round(v.z * 0xFF) + ")";
}

function add(v, k) {
  v.x += k;
  v.y += k;
  v.z += k;
  v.w += k;
  return v;
}

function interpolate(a, b, p) {
  return a + (b - a) * p;
}

function interpolate4(a, b, p) {
  var r = arguments.length <= 3 || arguments[3] === undefined ? { x: 0, y: 0, z: 0, w: 0 } : arguments[3];

  r.x = interpolate(a.x, b.x, p);
  r.y = interpolate(a.y, b.y, p);
  r.z = interpolate(a.z, b.z, p);
  r.w = interpolate(a.w, b.w, p);
  return r;
}

function gradient(colors, p) {

  for (var index = 1; index < colors.length; index++) {

    var prev = colors[index - 1],
        curr = colors[index];

    if (prev.w <= p && curr.w >= p) {
      var gp = (p - prev.w) / (curr.w - prev.w);
      return interpolate4(prev, curr, gp);
    }
  }

  return {
    x: 0,
    y: 0,
    z: 0,
    w: 0
  };
}

function lcg(value) {
  var multiplier = arguments.length <= 1 || arguments[1] === undefined ? 1103515245 : arguments[1];
  var increment = arguments.length <= 2 || arguments[2] === undefined ? 12345 : arguments[2];
  var modulus = arguments.length <= 3 || arguments[3] === undefined ? Math.pow(2, 31) : arguments[3];

  return (value * multiplier + increment) % modulus;
}

var ARMS = 3,
    STOPS = 2500,
    REVOLUTIONS = 1.61,
    ARM_THETA = Math.PI * 2 / ARMS,
    MODULUS = Math.pow(2, 31),
    RADIUS = 200,
    INNER_RADIUS = 8,
    SPARSE = 0.5,
    DISPERSION = 0.3; // 0 - more dispersion, 1 - less dispersion

function render(now) {

  var centerX = canvas.width * 0.5,
      centerY = canvas.height * 0.5;

  var grd = context.createRadialGradient(centerX, centerY, INNER_RADIUS, centerX, centerY, RADIUS);
  grd.addColorStop(1.0, "rgba(0,0,0,0)");
  grd.addColorStop(0.5, "rgba(25,128,255,0.15)");
  grd.addColorStop(0.2, "rgba(255,192,25,0.25)");
  grd.addColorStop(0.0, "rgba(255,255,255,1.0)");

  var grd2 = context.createRadialGradient(centerX, centerY, 16, centerX, centerY, RADIUS);
  grd.addColorStop(1.0, "rgba(0,64,128,0.1)");
  grd.addColorStop(0.7, "rgba(25,128,255,0.1)");
  grd.addColorStop(0.6, "rgba(0,192,255,0.125)");
  grd.addColorStop(0.0, "rgba(255,255,255,1.0)");

  context.clearRect(0, 0, canvas.width, canvas.height);

  context.save();
  context.fillStyle = grd;
  context.fillRect(0, 0, canvas.width, canvas.height);
  context.restore();

  var v = 0;
  var t = now / -60000;
  context.save();
  for (var arm = 0; arm < ARMS; arm++) {

    for (var _stop = 0; _stop < STOPS; _stop++) {

      v = lcg(v);
      var progress = _stop / STOPS,
          iprogress = 1.0 - progress,
          c = 1.0 + (iprogress - DISPERSION),
          r = v / MODULUS,
          cr = (r - 0.5) * 2,
          a = progress * Math.PI * 2 * REVOLUTIONS + ARM_THETA * arm,
          b = t + a + Math.PI * SPARSE * c * cr,
          d = Math.sqrt(progress) * RADIUS,
          x = centerX + Math.cos(b) * d,
          y = centerY + Math.sin(b) * d,
          s = (r - 0.5) * 2 + Math.pow(1.125, iprogress * 8);

      context.save();
      context.globalAlpha = (Math.sin((r + progress + t) * Math.PI * 2) + 1) * 0.5;
      context.translate(x, y);
      context.fillStyle = rgb(add(gradient([{ x: 0.0, y: 0.25, z: 0.75, w: 0.0 }, { x: 0.1, y: 0.5, z: 1.0, w: 0.5 }, { x: 1.0, y: 0.75, z: 0.1, w: 0.8 }, { x: 1.0, y: 1.0, z: 1.0, w: 1.0 }], iprogress), r * 0.15));
      context.fillRect(-s * 0.5, -s * 0.5, s, s);
      context.restore();
    }
  }
  context.restore();

  context.save();
  context.globalCompositeOperation = "lighter";
  context.fillStyle = grd2;
  context.fillRect(0, 0, canvas.width, canvas.height);
  context.restore();

  window.requestAnimationFrame(render);
}

function resize() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

window.addEventListener("resize", resize);

resize();
render();