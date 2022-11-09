var c = document.getElementById("c");
var ctx = c.getContext("2d");
var frames = 0;
var cw = c.width = 500, cx = cw/2;
var ch = c.height = 550, cy = ch/2;
var rad = Math.PI / 180;
var N = 3;
var r=1;
var delta = Math.PI;
var phi = 0;
var step = 20;
ctx.lineWidth = 3;


function reuleaux(r,phi,cx,cy,l){
var a = (360/3)*rad;
var R =  2 * Math.sqrt(r*r - (r/2)*(r/2));
var A = a/4;
for(var i = 0; i < 3; i++){
ctx.strokeStyle = "hsl("+(i*50)+",90%,"+l+"%)";	
ctx.beginPath();	
ctx.arc(cx+r*Math.cos(phi+(i-3)*a),  cy+r*Math.sin(phi+(i-3)*a),R, phi+(3+(i*4)+2)*A, phi+(3+(i*4)+ 4)*A);
ctx.stroke();
}
//fill the reuleaux
ctx.beginPath();
for(var i = 0; i < 3; i++){
ctx.arc(cx+r*Math.cos(phi+(i-3)*a),  cy+r*Math.sin(phi+(i-3)*a),R, phi+(3+(i*4)+2)*A, phi+(3+(i*4)+ 4)*A);
}
ctx.closePath();
ctx.fill();
}

function Draw(){
frames++;
phi = Math.sin(frames*rad)/3;
var step = 2
var l=10;
ctx.clearRect(0,0,cw,ch);
var y = cy
for(var i = 0;i < 180;i += 2){
r= 150*Math.abs(Math.sin(i*rad))+.01;
y -= step;
l+=.5;
//var theta = 0//Math.sin(5*i*rad + phi) + phi;
reuleaux(r,0,cx,y,l);
reuleaux(r,phi*i/30,cx,y,l);

}
requestId = window.requestAnimationFrame(Draw);
}
requestId = window.requestAnimationFrame(Draw);