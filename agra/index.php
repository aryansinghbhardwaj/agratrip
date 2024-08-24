<?php
    $insert = false;
    if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";
       
    $con = mysqli_connect($server,$username,$password);
     
    if (!$con){
       die("connection to this databases failed due to" .mysqli_connect_error());
    }
   // echo "success connection to the db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = " INSERT INTO agratrip.agratrip (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES 
    ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
     // echo $sql;

          //Execute the query
    if($con->query($sql)== true){
       // echo"sccessfully inserted";
       // flag for successful insertion
       $insert = true;
    }
    else{
        echo "Error: $sql <br> $con-> error";

    }

    $con->close();
}
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agra trip from </title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Tint&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="tajj" src="tajj.jpg" alt="Agra trip">
    <div class="container">
        <marquee>Welcome to No. 1 Education Portal Sarkari Result 2024</marquee>
        <h1>Welcome to Agra Trip from</h1>
        <p>Enter your details and submit this from to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>

            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>