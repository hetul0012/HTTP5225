<?php
require('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $id = $_GET['id'];
  $query = "SELECT * FROM schools WHERE id = " . $id;
  $result = mysqli_query($connect, $query);
  $school = $result -> fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  $query = "DELETE FROM schools WHERE id = '$id'";
  $result = mysqli_query($connect, $query);

  if ($result) {
    header("Location: index.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete School</title>
</head>
<body>
  <h1>Delete School</h1>
  <form action="delete.php" method="POST">
    <input 
      type="text" 
      name="BoardName" 
      placeholder="Board Name" 
      value="<?php echo $school['Board Name']; ?>"
      readonly>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input 
      type="text" 
      name="SchoolName" 
      placeholder="School Name"
      value="<?php echo $school['School Name']; ?>"
      readonly>
    <input 
      type="text" 
      name="Email" 
      placeholder="Email"
      value="<?php echo $school['Email']; ?>"
      readonly>
    <input type="submit" value="Delete" name="DeleteSchool">
  </form>
</body>
</html>
