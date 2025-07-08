<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Humber College Timetable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f0f0;
      padding: 40px;
    }
    .humber-header {
      text-align: center;
      margin-bottom: 40px;
    }
    .humber-header h1 {
      color: #003865;
      font-weight: bold;
    }
    .table th {
      background-color: #FDB913;
      color: #003865;
    }
  </style>
</head>
<body>

<div class="humber-header">
  <h1>Humber College - Weekly Timetable</h1>
</div>

<?php
require('connect.php');
$query = "SELECT * FROM schedule ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), time_slot";
$result = mysqli_query($connect, $query);

echo '<div class="container">';
echo '<table class="table table-bordered">';
echo '<thead>
        <tr>
          <th>Course Name</th>
          <th>Instructor</th>
          <th>Day</th>
          <th>Time Slot</th>
          <th>Room</th>
        </tr>
      </thead><tbody>';

foreach ($result as $row) {
    echo "<tr>
            <td>{$row['course_name']}</td>
            <td>{$row['instructor']}</td>
            <td>{$row['day']}</td>
            <td>{$row['time_slot']}</td>
            <td>{$row['room']}</td>
          </tr>";
}

echo '</tbody></table></div>';
?>

</body>
</html>