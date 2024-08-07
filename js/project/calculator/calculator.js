let calculator = document.querySelector("#calculator");

let input = document.createElement("input");
input.type = "text";
input.id = "result";
// input.value = 0;
// input.readOnly = true;
input.style.textAlign = "right"

calculator.appendChild(input);

let result = document.querySelector("#result")



let div = document.createElement("div");
div.id = "buttons";

input.after(div);


let btn = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "00", "+", "-", "/", "%", "AC", "DEL", "="];

let buton_div = document.querySelector("#buttons");

btn.forEach(function (val) {

    let button = document.createElement("button");
    button.innerHTML = val;
    button.onclick = function () {
        PrintAndCalculate(val)
    }

    buton_div.appendChild(button)
})




function PrintAndCalculate(values) {

    if (result.value == "" || result.value == undefined) {
        alert("please enter any expression")
        return;
    }


    if (values == "AC") {
        result.value = "";

        return;
    }

    if (values == "=") {
        try {
            result.value = eval(result.value);

        } catch (error) {

        }

        return;
    }


    if (values == "DEL") {
        // 123  
        result.value = result.value.slice(0, -1);
        return;
    }

    result.value += values

}



