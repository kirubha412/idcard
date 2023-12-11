<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <div class="form-container">
<?php
require('db.php');
?>
<?php

if(isset($_POST['submit'])) {
    $image=$_FILES['uploadfile'];              
    $image_name=$image['name'];                  
    $image_tmp_name=$image['tmp_name'];          
    $destination="uploads/".$image_name;       
    move_uploaded_file($image_tmp_name , $destination); 
    
    $name=$_REQUEST['name'];
    $roll_num=$_REQUEST['roll_num'];
    $dept=$_REQUEST['dept'];
    $year=$_REQUEST['year'];

    $sql = "UPDATE  details SET Image='$image_name',Name='$name',RollNo='$roll_num',Dept='$dept',Year='$year' WHERE ID=$_GET[ID]";
           
    
    if (mysqli_query($conn, $sql)) {
        echo "<h2>Records Updated successfully</h2>"."<br>";
        echo "<div class='go-to'><a class='edit' href='id.php?ID=$_GET[ID]'>GET ID</a>";
        echo "<a class='all' href='view.php'>View All Records</a></div>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
   
}

else 
{ ?>
<?php
$sql="SELECT * FROM details WHERE ID=$_GET[ID]";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)) 
 { ?>
     
     <h1 class="record">Update Details</h1>
    <form enctype="multipart/form-data" method="post" class="form">
        <label for="photo">Photo:</label>
        <input type="file" name="uploadfile" required value="<?php echo $row['Image']; ?>"><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required value="<?php echo $row['Name']; ?>"><br>
        <label for="roll_num">Roll No:</label>
        <input type="text" name="roll_num" id="roll_num" required value="<?php echo $row['RollNo']; ?>"><br>
        <label for="dept">Department:</label>
        <input type="text" name="dept" id="dept" required value="<?php echo $row['Dept']; ?>"><br>
        <label for="year">Year:</label>
        <input type="text" name="year" id="year" required value="<?php echo $row['Year']; ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>
    <?php } ?>
 </div>
</body>
</html>
<?php } ?>
