const canvas = document.querySelector('.drawing__canvas')
const reset = document.querySelector('.drawing__reset')
const input = document.querySelector('.drawing__input')
let canvasWidth = canvas.parentElement.clientWidth - 2;
let canvasHeight = 300;

var canvasContext = canvas.getContext("2d");
var drawing = false;
var prevX, prevY;
var currX, currY;

canvas.addEventListener("mousemove", draw);
canvas.addEventListener("mouseup", stop);
canvas.addEventListener("mousedown", start);

const setCanvasSize = (canvas, width, height) => {
  canvas.width = width;
  canvas.height = height;
}
setCanvasSize(canvas, canvasWidth, canvasHeight);

function start(e) {
  drawing = true;
}

function stop() {
  drawing = false;
  prevX = prevY = null;
  input.value = canvas.toDataURL();
}

function draw(e) {
  if (!drawing) {
    return;
  }
  
  var clientX = e.type === 'touchmove' ? e.touches[0].pageX : e.pageX;
  var clientY = e.type === 'touchmove' ? e.touches[0].pageY : e.pageY;

  currX = clientX - canvas.offsetLeft;
  currY = clientY - canvas.offsetTop;
  if (!prevX && !prevY) {
    prevX = currX;
    prevY = currY;
  }

  canvasContext.beginPath();
  canvasContext.moveTo(prevX, prevY);
  canvasContext.lineTo(currX, currY);
  canvasContext.strokeStyle = 'black';
  canvasContext.lineWidth = 2;
  canvasContext.stroke();
  canvasContext.closePath();

  prevX = currX;
  prevY = currY;
}

reset.addEventListener('click', () => {
  input.value = '';
  canvasContext.clearRect(0, 0, canvasWidth, canvasHeight);
})

window.addEventListener('resize', () => {
  canvasWidth = canvas.parentElement.clientWidth - 2;
  setCanvasSize(canvas, canvasWidth, canvasHeight);
})