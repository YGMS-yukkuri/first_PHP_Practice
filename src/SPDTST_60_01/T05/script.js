const grid = document.querySelector(".grid");
let color = "black";

for (i = 0; i < 16; i++) {
    for (j = 0; j < 16; j++) {
        const newdiv = document.createElement("div");
        newdiv.addEventListener("click", (e) => {
            newdiv.style.backgroundColor = color;
        })
        grid.appendChild(newdiv)
    }
}
const change = (n) => {
    let D = document.querySelector(`.${color}`)
    D.classList.toggle("active")
    color = n;
    D = document.querySelector(`.${color}`)
    D.classList.toggle("active")
}