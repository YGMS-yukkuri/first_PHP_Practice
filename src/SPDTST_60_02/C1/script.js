const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")

let x = 0;
let y = 150;

function roop() {
    ctx.clearRect(0,0,1000,1000)
    ctx.beginPath()
    ctx.arc(x,y,10,0,2*Math.PI);
    ctx.fillStyle = "white"
    ctx.fill()
    ctx.stroke()
    x++
}

setInterval(() => {
    roop()
}, 1000 / 60);