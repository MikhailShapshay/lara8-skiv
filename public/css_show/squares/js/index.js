// Create Canvas & Make Full Browser Size
var canvas = document.createElement('canvas');
document.body.appendChild(canvas); 
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Set the Canvas to the Context
var context = canvas.getContext('2d');

var angle = 0, 
	colourOffset = 0; 

setInterval(draw, 1000/30); 


function draw() { 

	context.clearRect(0,0,canvas.width, canvas.height); 
	context.strokeStyle = 'white';
	context.lineWidth = 3;

	context.save(); 

	context.translate(canvas.width/2, canvas.height/2);

	for(var i = 0; i<300; i++) { 
		context.strokeStyle = hsl(i*6 + colourOffset, 100, 50); 
		context.beginPath(); 
		context.arc(100,50,30,0, Math.PI*2,true);
		context.stroke();  
		context.translate(10,5); 
		context.rotate(radians(angle)); 
		context.scale(0.98,0.98); 
	}

	context.restore(); 
	
	angle +=0.1; 
	colourOffset++;
}
// HSL Colour Function
function hsl(h, s, l) { 
	return 'hsl('+h+','+s+'%,'+l+'%)';	
}
// RGB Colour Function
function rgb(r, g, b) { 
	return 'rgb('+Math.round(r)+','+Math.round(g)+','+Math.round(b)+')'; 
}
// Random Number Function
function random(min, max) { 
	return Math.random()*(max-min) +min; 
}
// Convert from Degrees to Radians
function radians(deg) { 
	return(deg * Math.PI/180);
}