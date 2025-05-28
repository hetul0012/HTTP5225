
<?php

//Challenge 2: PHP Control Structures - The Magic Number Game
$number = rand(1,99);

    if ($number % 3 === 0 && $number % 5 === 0) {
        echo "FizzBuzz";
    } elseif ($number % 3 === 0) {
        echo "Fizz";
    } elseif ($number % 5 === 0) {
        echo "Buzz";
    } else {
        echo $number;
    }


?>