<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<div class="form-container">
    
<?php
require('db.php');

$sql="DELETE FROM details WHERE ID=$_GET[ID]";

if (mysqli_query($conn, $sql)) {
    echo "<h2>Your record is deleted successfully</h2>"."<br>";
    echo "<div class='go-to'><a class='all' href='view.php'>View All Records</a></div";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>
</div>
</body>
</html>