let gameBaseSize = [100, 100];
let canvas = document.getElementById("canvas");
let canvaspad = document.getElementById("gamegoeshere");
canvas.style.position = "absolute";
canvas.style.display = "none";
canvaspad.style.position = "absolute";
canvaspad.style.display = "none";
let lastAvailSize = [100, 100];
let somethingChanged = false;
let somethingChangedTimeout = 0;
const MINIMUM_PIXEL_SIZE = 2;
const REQUIRED_VOID_RATIO = 0.75; // what area of the screen *must* be given to the void?

function setGameBaseSize(width, height) {
	console.log("game baze size set to "+width+", "+height);
	gameBaseSize = [width, height];
	somethingChanged = true;
	somethingChangedTimeout = 100;
}

setInterval(function() {
	if (lastAvailSize[0] != window.innerWidth || lastAvailSize[1] != window.innerHeight) {
		somethingChanged = true;
		somethingChangedTimeout = 100;
		lastAvailSize = [window.innerWidth, window.innerHeight];
	}
	if (somethingChanged) {
		// if (somethingChangedTimeout > 0) {
		// 	somethingChangedTimeout --;
		// } else {
			let maxAllowedPixelScale = Math.min(lastAvailSize[0]/gameBaseSize[0], lastAvailSize[1]/gameBaseSize[1]);
			let minAllowedPixelScaleForVoid = 1;
			for (i=0;i<10;i++) {
				minAllowedPixelScaleForVoid ++;
				if (gameBaseSize[0]*gameBaseSize[1]*minAllowedPixelScaleForVoid*minAllowedPixelScaleForVoid < lastAvailSize[0]*lastAvailSize[1]*(1.0-REQUIRED_VOID_RATIO)) {
					continue;
				} else {
					minAllowedPixelScaleForVoid --;
					break;
				}
			}
			let canvasZoomLevel = Math.floor(Math.max(MINIMUM_PIXEL_SIZE,Math.min(maxAllowedPixelScale, minAllowedPixelScaleForVoid)));
			if(maxAllowedPixelScale<2) {canvasZoomLevel=1;}

			let w = gameBaseSize[0] * canvasZoomLevel;
			let h = gameBaseSize[1] * canvasZoomLevel;
			let left = ((lastAvailSize[0] - w) / 2);
			let top = ((lastAvailSize[1] - h) / 2);

			canvas.width = w;
			canvas.height = h;
			canvas.style.left = left + 'px';
			canvas.style.top = top + 'px';
			canvas.style.display = "";

			canvaspad.style.width = (w-16) + 'px';
			canvaspad.style.height = (h-16) + 'px';
			canvaspad.style.left = (left+8-4) + 'px';
			canvaspad.style.top = (top+8-4) + 'px';
			canvaspad.style.display = "flex";
			canvaspad.style.alignItems = "center";
			canvaspad.style.alignContent = "center";

			somethingChanged = false;
		// }
	}
}, 1);