let todo = document.querySelector("#todo");
let result = document.querySelector("#result");

let input = document.createElement("input");
input.type = "text";
input.id = "todoInput";

todo.appendChild(input);

// localStorage.removeItem("result")

function AddLineThrough() {
    let addLine = document.querySelectorAll(".addLine");

    console.log(addLine);

    for (let index = 0; index < addLine.length; index++) {
        addLine[index].onclick = () => {
            let currentSpanTag = addLine[index];
            // console.log(currentSpanTag);
            currentSpanTag.classList.toggle("strikeThrough");
            SaveItem();
        };
    }

}

if (localStorage.getItem("result")) {

    result.innerHTML = localStorage.getItem("result");
    AddLineThrough()
    remove()
}

function SaveItem() {


    let a = result.innerHTML;
    localStorage.setItem("result", a);
}



//  on enter 
input.addEventListener("keyup", function (e) {
    // console.log(e)
    if (e.key == "Enter") {


        let input_select = document.querySelector("#todoInput");
        let value = input_select.value;

        if ((value == "" || value == undefined) || value == null) {
            // alert("please fill the field")

            if (document.querySelector("#error")) {
                document.querySelector("#error").remove()
            }


            let span = document.createElement("span");
            span.style.color = "red";
            span.id = "error";
            span.innerHTML = "<br>Please fill the field";

            btn.after(span)
        }
        else {
            _todo(value)
        }


    }

})






// on button

let btn = document.createElement("input");
btn.type = "button";
btn.value = "Submit";
btn.onclick = function () {
    let input_select = document.querySelector("#todoInput");
    let value = input_select.value;

    if ((value == "" || value == undefined) || value == null) {
        // alert("please fill the field")

        if (document.querySelector("#error")) {
            document.querySelector("#error").remove()
        }


        let span = document.createElement("span");
        span.style.color = "red";
        span.id = "error";
        span.innerHTML = "<br>Please fill the field";

        btn.after(span)
    }
    else {
        _todo(value)
    }



    // todo()
}

input.after(btn)





function _todo(val) {

    let input_select = document.querySelector("#todoInput");



    if (document.querySelector("#error")) {
        document.querySelector("#error").remove()
    }




    let li = document.createElement("li");
    // li.innerHTML = val;
    result.appendChild(li) // resuly reffer to ol tag 


    let span1 = document.createElement("span");

    span1.classList.add("addLine")

    span1.innerHTML = val;

    li.appendChild(span1)



    let span2 = document.createElement("span");


    span1.after(span2)

    let btn = document.createElement("button");
    btn.type = "button";
    btn.classList.add("remove");
    btn.innerHTML = "X"
    btn.onclick = function () {
        remove()
    }

    span2.appendChild(btn)



    input_select.value = ""

    SaveItem()

    AddLineThrough()
}




function remove() {


    let Remove = document.querySelectorAll(".remove");

    Remove.forEach(function (item) {

        item.addEventListener("click", function () {
            let parent = item.parentNode.parentNode;

            // parent.remove()
            parent.style.transition = "  all 0.75s ease-in-out";

            parent.style.color = "white";
            parent.style.backgroundColor = "red";

            // parent.style.padding="10px";

            setTimeout(() => {



                parent.style.opacity = "0"

                setTimeout(() => {
                    parent.remove()

                    SaveItem();

                }, 1000);



            }, 1000);


        })

    })






}
