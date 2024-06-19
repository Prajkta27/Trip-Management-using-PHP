<?php
$insert = false;
if(isset($_POST['name'])){
  //connection variables
  $server = "localhost";
  $username = "root";
  $password = "";
 
  //Database connection creation
  $con = mysqli_connect($server, $username, $password);

  //Checking whether connection is successful or not
  if(!$con){
    die("Connection failed to database due to" .mysqli_connect_error());
  }
  //echo "Successfully connecting to database";

  //collecting post variables
  $sNo = $_POST['sNo'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $desc = $_POST['desc'];          //other in db

  $sql =  "INSERT INTO `trip`.`trip` (`sNo`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$sNo','$name', '$age', '$gender',
  '$email', '$phone','$desc', current_timestamp())";

  //echo $sql;

  //Executing the query
  if($con->query($sql) == true){
    //echo "Successfully Inserted";
    //flag for successful insertion
    $insert = true;
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }
  //closing database connection
  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="DPU.jpeg" alt="DPU Pimpri">
    <div class="container">
        <h1>Welcome to the Manali Trip Form</h1>
        <p>Enter your details about availability to the trip ans submit the form before deadline</p>
        <?php
        if($insert == true){
          echo "<p class='submitMsg'>Thanks for filling out the form, we are happy that you are joining with us!!</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="id" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email id">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" placeholder="Enter other necessary Information"></textarea>
            <button class="btn">Submit</button>
            <!--<button class="btn">Reset</button>-->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>