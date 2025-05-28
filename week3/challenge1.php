<?php


//Challenge 1: Welcome to the Quirky Zoo Management System!

// $hour = date('G');
$hour = rand(1,23);


if($hour >= 5 && $hour <9){
    echo "Breakfast: Bananas, Apples, and Oats";
}
elseif($hour >= 12 && $hour <14){
    echo "Lunch: Fish, Chicken, and Vegetables";
    
}
elseif($hour >= 7 && $hour <9){
    echo "Dinner: Steak, Carrots, and Broccoli";
}
else{
    echo "If the time does not fall within any of the above intervals, the animals are not being fed.";
}

?>