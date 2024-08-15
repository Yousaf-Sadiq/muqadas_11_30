<?php
function display_array($a) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

// function pre($a) {
//     echo "<pre>";
//     print_r($a);
//     echo "</pre>";
// }

// function print_array($a) {
//     echo "<pre>";
//     print_r($a);
//     echo "</pre>";
// }

// function show_array($a) {
//     echo "<pre>";
//     print_r($a);
//     echo "</pre>";
// }
// function my_array($a) {
//     echo "<pre>";
//     print_r($a);
//     echo "</pre>";
// }







//1. Find the last element of an array without giving a hard-coded index.
$c = array(10, 20, 30, 40, 50);
display_array($c);
$c_l = count($c) - 1;
echo "The last element is: " . $c[$c_l];


echo "<hr style='height:4px; background-color:red;'>";

//2. Check whether the first or the last index of an array has a specified value, let's say 5.
$c = array(5, 20, 30, 40, 5);
display_array($c);
if ($c[0] == 5 || $c[count($c) - 1] == 5) {
    echo "<br>5 is found at the first or last index.";
} else {
    echo "<br>5 is not found at the first or last index.";
}


echo "<hr style='height:4px; background-color:red;'>";

//3. Make an array to store the names of students and check whether that array has your own name or not and also return the index of that value.
$students = array("John", "Alice", "Bob", "Charlie", "Muqadas");
display_array($students);
$name = "Muqadas";
if (in_array($name, $students)) {
 echo "<br>My name Muqadas is found in the array at index.";
    array_search($name, $students);
} else {
    echo "<br>My name is not found in the array.";
}


echo "<hr style='height:4px; background-color:red;'>";



//4. Add the array element at the specified index.
$colors = array("Red", "Green", "Blue");
display_array($colors);
array_splice($colors, 2, 0, "Yellow");
display_array($colors);


echo "<hr style='height:4px; background-color:red;'>";

//5. Delete the array element from the specified index
$colors = array("Red", "Green", "Blue", "Yellow");
display_array($colors);
array_splice($colors, 2, 1);
display_array($colors);









?>