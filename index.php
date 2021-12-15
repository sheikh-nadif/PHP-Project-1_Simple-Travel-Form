<?php
//insert is false because no data is still submitted 
$insert = false;

//connection
if(isset($_POST['name'])){

//set sonnection variables    
$server = "localhost";
$username = "root";
$password = "";

//create database connection
$con = mysqli_connect($server, $username, $password);

//check for connection success
if(!$con){
    die("Database Connection Failed : : : " . mysqli_connect_error());
}


//collect post variables data
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other_desc = $_POST['other_desc'];

//SQL for data insertion
$sql= "INSERT INTO `Trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other_desc`, `sub_date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other_desc', current_timestamp());" ;

//execute the query
if($con->query($sql)== true){
    //insert will be true after data is submitted
    
    //flag for successful insertion
    $insert = true;
}
else{
    //sql database connection error alert
    echo "ERROR: $sql </br> $con->error";
}

//close database connection
$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@600&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img class="bg" src="BG.jpg" alt="BG.jpg">
    <div class="container">
        <h1>Welcome to Trip Form</h1>
        <p>Enter your details to confirm participation</p>
    
    <?php 
    
    if($insert == true){
    echo "<p class= 'submit_msg'> Thanks for submitting your response</p>";
    }

    ?>

    <form action="index.php" method="post">

    <input type="text" name="name" id="name" placeholder="Enter Your Name">
    <input type="text" name="age" id="age" placeholder="Enter Your Age">
    <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
    <input type="email" name="email" id="email" placeholder="Enter Your Email">
    <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone [Must Start With +880]">
    <textarea name="other_desc" id="other_desc" cols="20" rows="20" placeholder="Enter Other Information"></textarea>

    <button class="btn">Submit</button>
    
    </form>

    </div>
    <script src="index.js"></script>
  
</body>
</html>