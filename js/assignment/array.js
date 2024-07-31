/* let a = [1, 2, 4, 5, 6, 7]; concept we use 2d 
find the greatest element in an array*/

// let greatest = a[0];


// for (let i = 1; i < a.length; i++) {
//     if (a[i] > greatest) {
//         greatest = a[i];
//     }
// }



// document.getElementById("output").innerHTML = "The greatest element is: " + greatest;

/* let a = [1, 2, 4, 5, 6, 7]; concept we use 2d 
find the greatest element in an array*/
let demo = document.querySelector("#demo");
// let b = [
//   [1, 2, 3, 4, 5, 6, 7]
// ];

// let max = -Infinity;
let a = [1, 2, 3, 4, 585904589430, 6, 7, 15];
let array_length = a.length;

let values;
// DSA code optimization 
//  fastest execution 
//  selection and compare  
for (let selection = 0; selection < array_length; selection++) {

  let greater = true;

  for (let check = 0; check < array_length; check++) {

    if (selection != check) {


      if (a[selection] < a[check]) {
        greater = false;

        break;

      }


    }


  }


  if (greater) {
    values = a[selection];
  }

}


demo.innerHTML = "The greatest element is: " + values;



function selectionSort(arr) {
  for (let i = 0; i < arr.length; i++) {
    //find min number in subarray 
    //and place it at ith position
    let minptr = i;
    for (let j = i + 1; j < arr.length; j++) {
      if (arr[minptr] > arr[j]) {
        minptr = j;
      }
    }
    //swap
    let temp = arr[i];
    arr[i] = arr[minptr];
    arr[minptr] = temp;
  }
  return arr;
}

let b = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];
console.log(selectionSort(b));
// for (let row = 0; row < b.length; row++) {

//   for (let col = 0; col < b[row].length; col++) {

//   if (b[row][col] > max) {
//       max = b[row][col];
//   }


//   }
// }

// console.log("Greatest element:", max);



