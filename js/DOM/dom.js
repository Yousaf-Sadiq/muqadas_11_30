let div = document.querySelector("#div");



let input = document.createElement("input");

// input.setAttribute("type","text");
input.type = "text";
input.id = "abc";


div.append(input)



let label = document.createElement("label");
label.innerText = "Enter text: ";
// label.for= "abc"
label.setAttribute("for", "abc")
input.before(label)

let btn = document.createElement("button");
btn.innerText = "add text";


btn.onclick = function () {
    addText()
};



input.after(btn)
// let a = document.querySelector("#abc");

function addText() {


    let txt = document.querySelector("#abc");
    let text = txt.value;

    if (text == "" || text == undefined) {

        let error = document.createElement("span");
        error.id = "error"
        error.innerHTML = "please fill the field";
        error.style.color = "red";
        error.style.transition = "opacity 0.73s ease-in-out";

        setTimeout(function () {
            error.style.opacity = "0"


            setTimeout(() => {
                error.remove()
            }, 1000);
        }, 1000);


        div.append(error)
    }

}

// quiz app 
//  weather app 
// todo app 
// calculator

// for (let index = 1; index <= 10; index++) {

//     let h1 = document.createElement("h1");
//     h1.innerHTML = `CREATED BY JS ${index}`

//     div.append(h1)

// }