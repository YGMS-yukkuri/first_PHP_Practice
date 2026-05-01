document.addEventListener("mousemove", (e) => {
    const A = document.querySelector(".sq")
    A.style.top = e.y + "px"
    A.style.left = e.x + "px"
    console.log(e.x,e.y);
    
})