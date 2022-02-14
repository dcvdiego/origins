//basic drawing code
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
var radius = 10;
var dragging = false;
context.lineWidth = radius * 2;
var putPoint = function(e) {
	if (dragging) {
      context.lineTo(e.offsetX, e.offsetY);
		context.stroke();
		context.beginPath();
		context.arc(e.offsetX, e.offsetY, radius, 0, Math.PI * 2);
		context.fill();
		context.beginPath();
		context.moveTo(e.offsetX, e.offsetY);

	}
};
	window.getImage = context.getImageData(0, 0, canvas.width, canvas.height);
var engage = function(e) {
	dragging = true;
  putPoint(e);
	window.getImage = context.getImageData(0, 0, canvas.width, canvas.height);
};
var disengage = function() {
	dragging = false;
	context.beginPath();
};
canvas.addEventListener("mousedown", engage);
canvas.addEventListener("mousemove", putPoint);
canvas.addEventListener("mouseup", disengage);
//stroke control!
var setRadius = function(newRadius) {
	if (newRadius < minRadius) 
	newRadius = minRadius;
	else if (newRadius > maxRadius)
	newRadius = maxRadius;
	radius = newRadius;
	context.lineWidth = radius * 2;
	strkSpan.innerHTML = radius;
};
var minRadius = 5, 
	maxRadius = 65,
	defaultRadius = 10,
	interval = 5,
	strkSpan = document.getElementById("strkval"),
	decStrk = document.getElementById("decstrk"),
	incStrk = document.getElementById("incstrk");
decStrk.addEventListener("click", function(){
	setRadius(radius-interval);
});
incStrk.addEventListener("click", function(){
	setRadius(radius+interval);
});
setRadius(defaultRadius);
//colorcoding!
//color array
var colors = ["black", "red", "blue", "green", "yellow", "cyan", "violet"];
for(var i=0, n=colors.length; i<n; i++){
	var swatch = document.createElement("div");
	swatch.className = "swatch";
	swatch.style.backgroundColor = colors[i];
	swatch.addEventListener("click", setSwatch);
	document.getElementById("colors").appendChild(swatch);
}
function setColor(color) {
context.fillStyle = color;
context.strokeStyle = color;
var active = document.getElementsByClassName("active") [0];
if (active) {
	active.className = "swatch";
}	
}
function setSwatch(e) {
var swatch = e.target;
setColor(swatch.style.backgroundColor);
swatch.className += " active";
}
setSwatch({target: document.getElementsByClassName("swatch") [0]});
//clear the canvas
document.getElementById("clear").addEventListener("click", function() {
        context.clearRect(0, 0, canvas.width, canvas.height);
      }, false);
//undo?
document.getElementById("undoButton").addEventListener("click", function() {
        context.clearRect(0, 0, canvas.width, canvas.height);
		context.putImageData(window.getImage, 0,0);
      }, false);






