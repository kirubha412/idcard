<?php
require('db.php');
$sql = "SELECT * FROM details WHERE ID=$_GET[ID]";
// echo $sql; die;
$result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        ?>
      <html>
      <head><title>Id Card</title>
      <link rel='stylesheet' href='style.css'>
      </head>
      <body>
          <div class='id-wrap'>
          <div class='header'>
              <img src='images/logo.png' alt='img'>
              <h3>Anna University Regional Campus,Madurai</h3>
              <address>NH-7 kanyakumari national highway,keelakuilkudi road,Madurai-625019,Tamilnadu.</address>
          </div>
          <div class='info'>
           <img src='uploads/<?php echo $row['Image'];?>' alt='image'>
           <h4><?php echo $row["Name"];?></h4>
           <h4><?php echo $row["RollNo"];?></h4>
           <h4><?php echo $row["Dept"];?></h4>
           <h4><?php echo $row["Year"];?></h4>
       </div>
       <div class='footer'>
           <img src='images/sign.png' alt='image'>
           <h5>PRINCIPAL</h5>
       </div>
       </div>
   </body>
   </html>
    <?php
  }?>