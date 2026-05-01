const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")

let isClick = false;
let x = 0;
let y = 0;
let color = "black"

canvas.addEventListener("mousedown", () => {
    isClick = true
    ctx.beginPath()
})
canvas.addEventListener("mouseup", () => {
    isClick = false
    ctx.closePath()
})

canvas.addEventListener("mousemove", (e) => {
    if (!isClick) return
    x = e.x
    y = e.y
    ctx.strokeStyle = color;
    ctx.lineTo(x, y)
    ctx.lineWidth = "2px";
    ctx.stroke()
})

function change(e) {
    color = e;
}