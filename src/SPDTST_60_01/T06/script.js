const modal = document.querySelector("dialog")
const showbtn = document.getElementById("show")
const closebtn = document.querySelector("dialog button")

const lock = () => {
    document.body.classList.add("lock")
}

const unlock = () => {
    document.body.classList.remove("lock")
}

showbtn.addEventListener("click", () => {
    modal.showModal()
    lock()
})

closebtn.addEventListener("click", () => {
    modal.close()
    unlock()
})