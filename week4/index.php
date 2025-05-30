<?php

// Function to fetch user data from the JSONPlaceholder API
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

// Get the list of users
$users = getUsers();
    

        // Display user information using a for loop
        for ($i = 0; $i < count($users); $i++) {
            echo "ID:" . $users[$i]['id'] . "<br>";
            echo "Name:" . $users[$i]['name'] . "<br>";
            echo "Email:" . $users[$i]['email'] . "<br>";
            echo "Company:" . $users[$i]['company']['name'] . "<br>";
        }
        ?>