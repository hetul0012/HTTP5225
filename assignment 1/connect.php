<?php
$connect = mysqli_connect('localhost', 'root', '', 'humber_timetable');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
