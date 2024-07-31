// logical operators
// && - and 
// || - or
// ! - not

//     F          T 
//  (5 > 7) || (7 > 5) => T

// relational operators
//   < >  
//  =
//  ==  value compare 
//  === value and data type will be compared 

// (5 === "5" ) F
//  a *= b 

let a = 6;

let b = 6;

a = a * b;

// console.log(a);

// 1. Find the area of a rectangle where the length is 5 and the width is 8.
// 2. Find the area of a triangle where the base is 4 and the height is 3.
// 3. Find the area of a circle where the radius is 3.
// 4. Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.

let length = 5;
let width = 8;
let area = length * width;
let h1 = document.getElementById("demo");
// let h12 = document.getElementById("demo2");

h1.innerHTML = "AREA OF RECTANGLE : " + area;
// concatination

// document.write(area)

// Check from the given integer, whether it is positive or negative.
// 3. Check whether a given number is even or odd. (mod sign % )
// 4. Check whether a given positive number is a multiple of 3.

let c= 66;
if (c > 0) {
    
}else{
    console.log("negative number")
}

if (a == 38) {

    console.log("a is equal to 36");
}
else {
    console.log(" a is not equal to 36");
}