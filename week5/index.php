<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>week 5 assignment</title>
    <style>
        body{
            background-color: #000;
        }
        .color-box {
        
            width: 100%;
            height: 100px;
            padding: 10px;
            color: #fff;
            font: 40px;
             margin:10px 0px;
            display: inline-block;
            box-sizing:border-box;
        }
    </style>
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', '','colors');
        
        if(!$connect){
            die("Connection Failed :" . mysqli_connect_error());
        }

        $query = 'SELECT * FROM colors';
        $colors = mysqli_query($connect, $query);

       foreach($colors as $color){
        $name = $color["Name"];
        $hex = $color["Hex"];

        echo "<div class='color-box' style='background-color: $hex'>";
        echo "<strong>$name</strong><br>";
        echo "</div>";
        }

        mysqli_close($connect);
    ?>
</body>
</html> 