<html>
    <head>
        <title>Students ID Card</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class="form-container">
        
        <?php
        require('db.php');
        
        if(isset($_POST['submit'])) 
        {
            $image  = $_FILES['uploadfile'];              
            $image_name=$image['name'];                  
            $image_tmp_name=$image['tmp_name'];          
            $destination="uploads/".$image_name;       
            move_uploaded_file($image_tmp_name , $destination); 
            
            $name=$_REQUEST['name'];
            $roll_num=$_REQUEST['roll_num'];
            $dept=$_REQUEST['dept'];
            $year=$_REQUEST['year'];
           
            
        
        
            $sql = "INSERT INTO details (Image,Name,RollNo,Dept,Year)
                    VALUES ('$image_name','$name', '$roll_num','$dept', '$year')";
                   
            
            if (mysqli_query($conn, $sql)) {
                $last_id=mysqli_insert_id($conn);
                echo "<h2>New record created successfully</h2>"."<br>";
                echo "<div class='go-to'><a class='edit' href='id.php?ID=$last_id'>GET ID</a>";
                echo "<a class='all' href='view.php'>View All Records</a></div>";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            
            
        }
        else 
        {
            ?>
            <div>
            <h1 class="record">Students Details</h1>
            <form enctype="multipart/form-data" method="post" class="form">
            <label for="photo">Photo:</label>
            <input type="file" name="uploadfile" required><br>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
            <label for="roll_num">Roll No:</label>
            <input type="text" name="roll_num" id="roll_num" required><br>
            <label for="dept">Department:</label>
            <input type="text" name="dept" id="dept" required><br>
            <label for="year">Year:</label>
            <input type="text" name="year" id="year" required><br>
            <input type="submit" name="submit" id="submit">
            </form>
            </div>
           
       <?php } ?>  
        </div>
        
    </body>
</html>