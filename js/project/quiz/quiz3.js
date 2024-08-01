let quizContainer = document.querySelector("#quiz-container");
let question = document.querySelector("#question");
let options = document.querySelector("#options");

let quizData = [
    {
        question: "What is the capital of United Kingdom?",
        choices: ["London", "Paris", "Nairobi"],
        correct: "London"
    },
    {
        question: "How many days are there in a week?",
        choices: ["Five", "Three", "Seven"],
        correct: "Seven"
    },
    {
        question: "What is the closest planet to the sun?",
        choices: ["Earth", "Mercury", "Saturn"],
        correct: "Mercury"
    },

];



let index = 0;

let score = 0;
let wrongQuiz = [];


let quizlength = quizData.length;


function displayQuiz() {

    let quizContainer = document.querySelector("#quiz-container");
    let question = document.querySelector("#question");
    let options = document.querySelector("#options");

    if (index < quizlength) {
        // =======================================================
        let currentQuiz = quizData[index];


        question.innerHTML = currentQuiz.question;

        // options 

        options.innerHTML = ""

        currentQuiz.choices.forEach(function (val) {


            //     <tr>
            //     <td><input type="radio" name="" id="abc" /></td>
            //     <td><label for="abc">computer</label></td>
            //   </tr>

            let tr = document.createElement("tr");

            options.appendChild(tr)


            let td1 = document.createElement("td");



            tr.appendChild(td1);



            let input = document.createElement("input");

            input.type = "radio";
            input.value = val;
            input.classList.add("options");
            input.setAttribute("id", `${val}`);
            input.name = "quiz";


            td1.appendChild(input);

            let td2 = document.createElement("td");

            tr.appendChild(td2);


            let label = document.createElement("label");
            label.innerHTML = val;
            label.setAttribute("for", `${val}`)



            // options.appendChild(input)

            td2.appendChild(label)
        })


        if (document.querySelector("#NEXT")) {
            document.querySelector("#NEXT").remove()
        }


        if (document.querySelector("#wrong")) {
            document.querySelector("#wrong").remove()
        }

        let button = document.createElement("button");
        button.innerHTML = "NEXT";
        button.id = "NEXT";

        button.onclick = function () {
            checkAnswer();
        }


        options.after(button)
    }
}


displayQuiz()


function checkAnswer() {

    let allOption = document.querySelectorAll(".options");

    let length = allOption.length;

    let checked;

    for (let i = 0; i < length; i++) {
        checked = false;

        if (allOption[i].checked == true) {

            testQuiz(allOption[i]);

            checked = true;
            break;

        }

    }


    if (checked == false) {
        console.log("no option selected");
    }

}




function testQuiz(val) {

    if (index < quizlength) {


        let currentQuiz = quizData[index];

        let correctAnswer = currentQuiz.correct;

        let userAnswer = val.value;

        if (userAnswer == correctAnswer) {
            score++;
        } else {

            wrongQuiz.push({
                question: currentQuiz.question,
                correctAnswer: currentQuiz.correct,
                userAnswer: userAnswer
            })
        }



        index++;

        displayQuiz();
    }
    else {
        displayResult();
    }




}


function displayResult() {

    options.innerHTML = "";
    question.innerHTML = "";

    let next = document.querySelector("#NEXT");
    next.innerHTML = "RESET QUIZ";
    next.onclick = function () {
        reset()
    }



    question.innerHTML = `YOUR SCORE IS: ${score}`;

    if (wrongQuiz.length > 0) {

        let button = document.createElement("button");
        button.innerHTML = "SHOW WRONG ANSWER";
        button.id = "wrong";

        button.onclick = function () {
            showWrong();
        }

        next.after(button)

        console.log(wrongQuiz)


    }
    else {
        options.innerHTML = "<h2>YOU PASSED ALL QUIZ</h2>"
    }



}


function showWrong() {
    let html = "";
    wrongQuiz.forEach(val => {
        html += `<p>Question: ${val.question}</p>
                <p style="color:green;"> correct Answer: ${val.correctAnswer}</p>
                <p style="color:red;"> your Answer: ${val.userAnswer}</p>


                <hr>
                `;

    });


    options.innerHTML = html
}

function reset() {
    score = 0;
    index = 0;
    wrongQuiz = [];
    displayQuiz();
}