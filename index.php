<?php
$insert = false;
if(isset($_POST['name'])){
  //set connection variables
    $server = "localhost";
    $username = "root";
$password = "";
//create a database connection
$con = mysqli_connect($server, $username, $password);
//check for connection success.
if(!$con){
    die(" connection failed due to " . mysqli_connect_error());
}
//echo "Connection successful!. "
//collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$enroll = $_POST['enroll'];
$email = $_POST['email'];
$desc = $_POST['desc'];


$sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `phone`, `enroll`, `email`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$enroll', '$email', '$desc', current_timestamp());";
//echo $sql;
//execute the querry
if($con->query($sql) == true){
    //echo "successfully inserted";

    //flag for successful insertion
    $insert =true;

}
else{
    echo "Error: $sql <br> $con->error";
}

//close the database connection
$con->close();

}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,100&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <img src="bg.jpg" alt="JIIT Noida" />
    <div class="container">
      <h1>Welcome to JIIT Noida US Trip form</h1>
      <p>
        Enter your details and submit this form to confirm your participation
      </p>
     <?php
     if($insert ==true){
         echo "<p class='submitMsg'>
         Thanks for submitting your form. We are happy to see you joining for the
         US Trip.
         </p>"; 
        }
         ?>
      <form action="index.php" method="post">

        
        <input type="text" name="name" id="name" placeholder="Enter your name" />
      <input type="text" name="age" id="age" placeholder="Enter your age" />
      <input
        type="text"
        name="gender"
        id="gender"
        placeholder="Enter your gender"
      />
      <input
        type="phone"
        name="phone"
        id="age"
        placeholder="Enter your phone"
      />
      <input
        type="phone"
        name="enroll"
        id="enroll"
        placeholder="Enter your enroll"
        />
        <input
        type="email"
        name="email"
        id="email"
        placeholder="Enter your email"
        />
        <textarea
        name="desc"
        id="desc"
        cols="30"
        rows="10"
        placeholder="Enter any other information here "
        ></textarea>
        
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
   
  </body>
</html>
