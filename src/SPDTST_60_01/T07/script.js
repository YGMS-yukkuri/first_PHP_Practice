
const display = (n,color) => {
    const a = document.createElement("div");
    a.textContent = n
    a.style.color = color;
    document.body.appendChild(a);
}
for(i=1; i<101; i++) {
    if(i % 15 === 0) {
        display("FizzBuzz", "green")
    } else if (i % 5 === 0) {
        display("Buzz","blue")
    } else if(i % 3 === 0) {
        display("Fizz","red")
    } else {
        display(i,"black")
    }
}