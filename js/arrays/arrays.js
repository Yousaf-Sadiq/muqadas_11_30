let q = ["qwer", 12, 432, true, 432, 132, 6765, 8769, 123, 321, 1321, 432, "dsajdsamskl"]
let L = q.length;

let range = L - 1; // 8

console.log(q[range]);
//  start  condition/end  increament/decreament 
// for (let i = 0; i <= range; i++) {


//     document.write(q[i] + "<br>");

// }

// index array
// associative array / object
// multi dimension arrays
// q.splice(1,2,"abc","qwer");

let r = q.slice(3, 9);
console.log(r);

const array1 = [1, 4, 9, 16];

// Pass a function to map
const map1 = array1.map((ele) => {

    let a = ele * 8

    return a;
});
//  [7,10,15,22]


// Find the last element of an array without giving a hard-coded index.

// 2. Check whether the first or the last index 
// of an array has a specified value, let's say 5.

// 3. Make an array to store the names of students 
// and check whether that array has your own
// name or not and also return the index of that value.

// include function in array 
// indexof lastIndexOf  join 


// 4. Add the array element at the specified index.

// =====================research work ==============================
// loops
/**
 * while loops 
 * for loop
 * for in loop
 * for of loop 
 * 
 * do while loop
 * 
 * foreach 
 */

console.log(map1);

// Sum all the array elements by using a loop.
// 2. Make a reverse of the array by using a loop.
// Print numbers from 1 to 100, but for multiples of 3 print "Fizz", for multiples of 5, print
// "Buzz" and for numbers that are multiples of both 3 and 5 print "FizzBuzz".
// Write a function to calculate the factorial of a given number.
// 7. Write a function that determines whether a given number is prime or not.
// 8. Print numbers from 1 to 100, but for multiples of 3 print "Fizz", for multiples of 5, print
// "Buzz" and for numbers that are multiples of both 3 and 5 print "FizzBuzz".





// let arr = array2.filter(function (ele) {
    //     return ele >= 9
    // })
    // console.log(arr)
    // array2[0];
    // array2[1];
    // array2[2];
    // array2[3];
    
// starting  ending  increament / decreament

//  i = i + 1 

let div = document.querySelector(".demo");

// let d = document.getElementsByClassName("demo")

// console.log(d)
const array2 = [1, 14, 9, 16,55,77]; // range/index => saving / getting in array 

// mam 

        // [77,55,16,9,14,1]


let end = (array2.length - 1); // range
value = "";

// for (let i = 0; i < 4; i++) {


//     // value += array2[i] + "<br>";
//     value += `<h3> ${array2[i]} </h3>`; // string template 


//     console.log(array2[i])

// }

let i = 0;

while (i <= end) {

    value += `<h5> ${array2[i]} </h5>`;
    i++;
}

div.innerHTML = value;
