<?php
// 1. Find the area of a rectangle where the length is 5 and the width is 8.
$length = 5;
$width = 8;
$areaRectangle = $length * $width;
echo "<h1>Area of Rectangle is {$areaRectangle}</h1>";
echo "<hr style='height:4px; background-color:red;'>";  

// 2. Find the area of a triangle where the base is 4 and the height is 3.
$base = 4;
$height = 3;
$areaTriangle = 0.5 * $base * $height;
echo "<h1>Area of Triangle is {$areaTriangle}</h1>";
echo "<hr style='height:4px; background-color:red;'>";  

// 3. Find the area of a circle where the radius is 3.
$radius = 3;
$areaCircle = 3.14 * ($radius ** 2);
echo "<h1>Area of Circle is {$areaCircle}</h1>";
echo "<hr style='height:4px; background-color:red;'>";  

// 4. Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.
$celsius = 30;
$fahrenheit = ($celsius * 9/5) + 32;
echo "<h1>{$celsius}°C is equal to {$fahrenheit}°F</h1>";

$fahrenheit = 86;
$celsius = ($fahrenheit - 32) * 5/9;
echo "<h1>{$fahrenheit}°F is equal to {$celsius}°C</h1>";
echo "<hr style='height:4px; background-color:red;'>";  

// 5. Check two given numbers and return true if one of the numbers is 50 or if their sum is 50.
function checkNumbers($num1, $num2) {
    if ($num1 == 50 || $num2 == 50 || $num1 + $num2 == 50) {
      return true;
    } else {
      return false;
    }
  }
  // Test cases
  echo "<h1> Numbers Output:</h1>";
  echo "Test 1: (4,46): " . (checkNumbers(4,46) ? "True" : "False") . "<br>";
  echo "Test 2: (20, 30): " . (checkNumbers(20, 30) ? "True" : "False") . "<br>";
  echo "Test 3: (20, 40): " . (checkNumbers(20, 40) ? "True" : "False") . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";  

  // 6. Check from the given integer, whether it is positive or negative.
function checkNumber($num) {
    if ($num > 0) {
      return "Positive";
    } elseif ($num < 0) {
      return "Negative";
    } else {
      return "Zero";
    }
  }
  // Test cases
  echo "<h1> Number Output:</h1>";
  echo "Test 1: (25): " . checkNumber(25) . "<br>";
  echo "Test 2: (-30): " . checkNumber(-30) . "<br>";
  echo "Test 3: (0): " . checkNumber(0) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

// 7. Check whether a given number is even or odd.
function checkEvenOdd($num) {
    if ($num % 2 == 0) {
      return "Even";
    } else {
      return "Odd";
    }
  }
   // Test cases
  echo "<h1>Check Even Odd Output:</h1>";
  echo "Test 1: (10): " . checkEvenOdd(10) . "<br>";
  echo "Test 2: (11): " . checkEvenOdd(11) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

  // 8. Check whether a given positive number is a multiple of 3.
  function checkMultipleOf3($num) {
    if ($num > 0 && $num % 3 == 0) {
      return "Multiple of 3";
    } else {
      return "Not a Multiple of 3";
    }
  }
  echo "<h1> Multiple of 3 Output:</h1>";
  echo "Test 1: (9): " . checkMultipleOf3(9) . "<br>";
  echo "Test 2: (10): " . checkMultipleOf3(10) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

  // 9. Determine whether a given year is a leap year.
  function checkLeapYear($year) {
    if ($year % 4 == 0 && $year % 100 != 0 ) {
      return "Leap Year";
    } else {
      return "Not a Leap Year";
    }
  }
  echo "<h1> Leap Year Output:</h1>";
  echo "Test 1: (2020): " . checkLeapYear(2020) . "<br>";
  echo "Test 2: (2021): " . checkLeapYear(2021) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

  // 10. Check from the given two numbers, whether the first number is "greater", "lesser" or
// "equal" to the second number.
function checkno($num1, $num2) {
    if ($num1 > $num2) {
      return "$num1 is greater than $num2";
    } elseif ($num1 < $num2) {
      return "$num1 is lesser than $num2";
    } else {
      return "$num1 is equal to $num2";
    }
  }
  echo "<h1> Compare Numbers Output:</h1>";
  echo "Test 1: (10, 20): " . checkno(10, 20) . "<br>";
  echo "Test 2: (20, 10): " . checkno(20, 10) . "<br>";
  echo "Test 3: (10, 10): " . checkno(10, 10) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

  // 11. Check from the three sides of the triangle. use conditions to determine and display
// weather the triangle is "Equilateral" (all sides are equal), "Isosceles" (two sides are
// equal), or "Scalene" (no sides are equal)
function checkTriangle($side1, $side2, $side3) {
    if ($side1 == $side2 && $side2 == $side3) {
      return "Equilateral";
    } elseif ($side1 == $side2 || $side2 == $side3 || $side1 == $side3) {
      return "Isosceles";
      // return "Isosceles, because side 1 and 2 are equal ";
    } else {
      return "Scalene";
    }
  }
  echo "<h1> Triangle Type Output:</h1>";
  echo "Test 1: (10, 10, 10): " . checkTriangle(10, 10, 10) . "<br>";
  echo "Test 2: (10, 20, 10): " . checkTriangle(10, 20, 10) . "<br>";
  echo "Test 3: (10, 20, 30): " . checkTriangle(10, 20, 30) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";

  // 12. Check from the given month (1-12) if it's "Winter" (December-February), "Spring"
// (March-May), "Summer" (June-August), or "Autumn" or "Fall" (September-November).
function checkSeason($month) {
    if ($month >= 12 || $month <= 2) {
      return "Winter";
    } elseif ($month >= 3 && $month <= 5) {
      return "Spring";
    } elseif ($month >= 6 && $month <= 8) {
      return "Summer";
    } else {
      return "Autumn";
    }
  }
  echo "<h1> Season Output:</h1>";
  echo "Test 1: Month 12: " . checkSeason(12) . "<br>";
  echo "Test 2: Month 4: " . checkSeason(4) . "<br>";
  echo "Test 3: Month 7: " . checkSeason(7) . "<br>";
  echo "Test 4: Month 10: " . checkSeason(10) . "<br>";
  echo "<hr style='height:4px; background-color:red;'>";
  
    
    



  
    
  
    
    
  









  

  ?>

  
  










