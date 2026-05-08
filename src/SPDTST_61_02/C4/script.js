const canvas = document.querySelector("canvas")
const ctx = canvas.getContext("2d")

document.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        console.log("aa")

        const link = document.createElement("a");
        link.download = "canvas.png";
        link.href = canvas.toDataURL();
        link.click();
    }
    else if(e.key === "a") {
        ctx.fillStyle = "red";
        ctx.fillText("TEXT",0,100)
    }
})