<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View all Records</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
   <div class="table">
    <h1 class="record">Students Records</h1>
    <table cellpadding="25" cellspacing="2" class="record-table" >
       <thead>
          <tr>
             <th>S.NO</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Roll NO</th>
             <th>Department</th>
             <th>Year</th>
             <th></th>
          </tr>
       </thead>
       <tbody>
          <?php
            $count=1;
            $sql="SELECT * FROM details";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)) 
            {?>
               <tr>
                  <td><?php echo $count;?></td>
                  <td><img width=50 src='uploads/<?php echo $row['Image'];?>' alt='image'></td>
                  <td><?php echo $row['Name'];?></td>
                  <td><?php echo $row['RollNo'];?></td>
                  <td><?php echo $row['Dept'];?></td>
                  <td><?php echo $row['Year'];?></td>
                  <td><?php echo "<a class='view' href='id.php?ID=$row[ID]'>GetID</a> <a class='edit' href='update.php?ID=$row[ID]'>Edit</a> <a class='delete' href='delete.php?ID=$row[ID]'>Delete</a>"?></td>
               </tr>    
            <?php $count++;}?>
       </tbody>
    </table>
   </div>
</body>
</html>