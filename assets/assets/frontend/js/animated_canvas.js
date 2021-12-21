var ww = $(window).width();
var wh = $(window).height();

// pure javascrip random function ============
function random(min, max) {
	return Math.random() * (max - min) + min;
}

window.requestAnimFrame = function () {
	return window.requestAnimationFrame ||
	function (callback, element) {
		window.setTimeout(callback, 1000 / 60);
	};
}();

function init() {} //end init

function animate() {
	requestAnimFrame(animate);
	draw();
}

function draw() {

	//setup canvas enviroment
	var time = new Date().getTime() * 0.002;
	//console.log(time);
	var color1 = "rgba(255,255,255,0.05)";
	var color2 = "rgba(255,255,255,0.1)";
	var canvas = document.getElementById("hero-canvas");
	var ctx = document.getElementById("hero-canvas").getContext("2d");
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.save();

	// random float to be used in the sin & cos
	var randomX = random(.2, .9);
	var randomY = random(.1, .2);

	// sin & cos for the movement of the triangles in the canvas
	var rectX = Math.cos(time * 1) * 1.5 + randomX;
	var rectY = Math.sin(time * 1) * 1.5 + randomY;
	var rectX2 = Math.cos(time * .7) * 3 + randomX;
	var rectY2 = Math.sin(time * .7) * 3 + randomY;
	var rectX3 = Math.cos(time * 1.4) * 4 + randomX;
	var rectY3 = Math.sin(time * 1.4) * 4 + randomY;

	//console.log(rectX + '-' + rectY + '-' + rectX2 + '-' + rectY2 + '-' + rectX3 + '-' + rectY3);

	//triangle gradiente ==========================================
	var triangle_gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
	triangle_gradient.addColorStop(0, color1);
	triangle_gradient.addColorStop(1, color2);

	//triangle group 1 ===========================================
	// triangle 1.1
	ctx.beginPath();
	ctx.moveTo(rectX2 + 120, rectY2 - 100);
	ctx.lineTo(rectX2 + 460, rectY2 + 80);
	ctx.lineTo(rectX2 + 26, rectY2 + 185);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	//triangle 1.2
	ctx.beginPath();
	ctx.moveTo(rectX - 50, rectY - 25);
	ctx.lineTo(rectX + 270, rectY + 25);
	ctx.lineTo(rectX - 50, rectY + 195);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	//triangle 1.3
	ctx.beginPath();
	ctx.moveTo(rectX3 - 140, rectY3 - 150);
	ctx.lineTo(rectX3 + 180, rectY3 + 210);
	ctx.lineTo(rectX3 - 225, rectY3 - 50);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	//triangle group 2 ===========================================
	// triangle 2.1
	ctx.beginPath();
	ctx.moveTo(rectX + (canvas.width - 40), rectY - 30);
	ctx.lineTo(rectX + (canvas.width + 40), rectY + 190);
	ctx.lineTo(rectX + (canvas.width - 450), rectY + 120);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 2.2
	ctx.beginPath();
	ctx.moveTo(rectX3 + (canvas.width - 200), rectY3 - 240);
	ctx.lineTo(rectX3 + (canvas.width + 80), rectY3 - 240);
	ctx.lineTo(rectX3 + (canvas.width - 50), rectY3 + 460);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 2.3
	ctx.beginPath();
	ctx.moveTo(rectX2 + (canvas.width - 400), rectY2 + 140);
	ctx.lineTo(rectX2 + (canvas.width + 20), rectY2 + 200);
	ctx.lineTo(rectX2 + (canvas.width - 350), rectY2 + 370);
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	//triangle group 3 ===========================================
	// triangle 3.1
	ctx.beginPath();
	ctx.moveTo(rectX3 - 50, rectY3 + (canvas.height - 350));
	ctx.lineTo(rectX3 + 350, rectY3 + (canvas.height - 220));
	ctx.lineTo(rectX3 - 100, rectY3 + (canvas.height - 120));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 3.2
	ctx.beginPath();
	ctx.moveTo(rectX + 100, rectY + (canvas.height - 380));
	ctx.lineTo(rectX + 320, rectY + (canvas.height - 180));
	ctx.lineTo(rectX - 275, rectY + (canvas.height + 150));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 3.3
	ctx.beginPath();
	ctx.moveTo(rectX2 - 230, rectY2 + (canvas.height - 50));
	ctx.lineTo(rectX2 + 215, rectY2 + (canvas.height - 110));
	ctx.lineTo(rectX2 + 250, rectY2 + (canvas.height + 130));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	//triangle group 4 ===========================================
	// triangle 4.1
	ctx.beginPath();
	ctx.moveTo(rectX3 + (canvas.width - 80), rectY3 + (canvas.height - 320));
	ctx.lineTo(rectX3 + (canvas.width + 250), rectY3 + (canvas.height + 220));
	ctx.lineTo(rectX3 + (canvas.width - 200), rectY3 + (canvas.height + 140));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 4.2
	ctx.beginPath();
	ctx.moveTo(rectX + (canvas.width - 100), rectY + (canvas.height - 160));
	ctx.lineTo(rectX + (canvas.width - 30), rectY + (canvas.height + 90));
	ctx.lineTo(rectX + (canvas.width - 420), rectY + (canvas.height + 60));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	// triangle 4.3
	ctx.beginPath();
	ctx.moveTo(rectX2 + (canvas.width - 320), rectY2 + (canvas.height - 200));
	ctx.lineTo(rectX2 + (canvas.width - 50), rectY2 + (canvas.height - 20));
	ctx.lineTo(rectX2 + (canvas.width - 420), rectY2 + (canvas.height + 120));
	ctx.fillStyle = triangle_gradient;
	ctx.fill();

	ctx.restore();

} //end function draw

//call init
init();
animate();