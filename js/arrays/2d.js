
let a = [1, 2, 4, 5, 6, 7];
let star = document.querySelector("#star");


let b = [
    [1, 2, 4, 5, 6, 7 ],
    [123, 2321, 4567, 65, 226, 1237],
    [3213211, 4442, 234, 65, 86, 799]
];

console.log(b);
let value = ""
for (let row = 0; row < b.length; row++) {

    let col_length = b[row].length;
    value += `<hr> <h3>ROW: ${row + 1}</h3>`
    for (let col = 0; col < col_length; col++) {


        value += `${b[row][col]} <br>`;
    }



}

star.innerHTML = value;
console.log(value);

// ... spread operator



/*
 selection and sort
 let a = [1, 2, 4, 5, 6, 7]; concept we use 2d 
find the greatest element in an array
*
**
***
****
*****
******
*/

// let value = "";
// let star = document.querySelector("#star");

// for (let row = 1; row <= 6; row++) {

//     for (let col = 1; col <= row; col++) {


//         value += "*";
//     }

//     value += "<br>";


// }

// star.innerHTML = value;