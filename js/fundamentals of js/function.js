
/*
1. normal function/ default function with no return
2. normal function/ default function with return


3. parameterize/argument function with return
4. parameterize/argument function with no  return

5. anonymous function with no  return
6. anonymous function with   return

7. arrow  function with   return
8. arrow  function with no  return

global and local variable 
*/
// normal function/ default function
// function sum() {

//     let a = 5;
//     let v = 6;

//     console.log(a + v)
// }

// sum()
// sum()
// sum()

// parameterize/argument function with no  return

// function sum(a, b) {
//     let y = a;
//     let t = b;

//     let z = y + t;

//     console.log(z)

// }

// sum(2, 7);
// sum(2, 17);
// sum(2, 27)

// parameterize/argument function with   return

// function sum(a, b) {
//     let y = a;
//     let t = b;

//     let z = y + t;

//     return z;

// }

// console.log( sum(2, 7) );
// document.write( sum(2, 17) );
// console.log( sum(2, 37) );


// sum(2, 17);
// sum(2, 27);

// anonymous function with no  return
// (function(q,w){
//     console.log("hello world")
//     console.log(q)
//     console.log(w)
// })(2,4)


// (()=>{
//     console.log("hello world from arrow function")
// })()



// 1. Find the area of a rectangle where the length is 5 and the width is 8.
// 2. Find the area of a triangle where the base is 4 and the height is 3.
// 3. Find the area of a circle where the radius is 3.
// 4. Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.

// Check from the given integer, whether it is positive or negative.
// 3. Check whether a given number is even or odd. (mod sign % )
// 4. Check whether a given positive number is a multiple of 3.

let h1 = document.getElementById("demo");

function areaOfRectangle(w, q) {
    let length = q;
    let width = w;
    let area = length * width;

    return area;
}

let z = areaOfRectangle(8, 5)
let a = areaOfRectangle(18, 3)
h1.innerHTML = z;