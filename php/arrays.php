<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    function pre($x)
    {

        echo "<pre>";
        print_r($x);
        echo "</pre>";
    }
    // snake case 
    ?>

    <h1> original array</h1>

    <?php
    $a = [0, 2, 4, 5, 6, 7, 8, 9, 0];

    pre($a);

    $a_l = count($a) - 1;

    if (in_array(5, $a)) {
        // echo "true";
        echo array_search(5, $a);
    } else {
        echo "false";

    }
    ;

    // array_push($a, "hello world");
    

    if ($a[0] == $a[$a_l]) {
        echo "equal";
    } else {
        echo " not equal";
    }
    ?>


    <h1> after applying splice</h1>

    <?php
    $x = array_splice($a, 3, 0, "hello word");

    pre($a);
    // $b = [
    //     "name" => "John",
    //     "age" => 30,
    //     "city" => "New York",
    // ];
    
    // pre(array_values($b));
    
    // echo $b["name"];
    // $x = array_reverse($a);
    // pre( array_values($a));
    


    // pre($x);
    

    //     1. Find the last element of an array without giving a hard-coded index.
    

    // 2. Check whether the first or the last index of an array has a specified value, let's say 5.
    

    // 3. Make an array to store the names of students and check whether that array has your own
// name or not and also return the index of that value.
    

    // 4. Add the array element at the specified index.
    

    // 5. remoce the array element from the specified index
    




    ?>





</body>

</html>