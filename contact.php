<?php
   include'connection.php';
   session_start();
   $user_id = $_SESSION['user_name'];
   if (!isset($user_id)) {
       header('location:login.php');
    }
   if (isset($_POST['logout'])) {
       session_destroy();
       header('location:login.php');
    }

    if(isset($_POST['submit-btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number = '$number' AND message = '$message'") or die('query failed');

        if(mysqli_num_rows($select_message)>0){
            echo 'message already send';
        }else{
            mysqli_query($conn, "INSERT INTO `message` (`user_id`,`name`, `email`, `number`, `message`) VALUES('$user_id','$name', '$email', '$number', '$message')")  or die('query failed');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalloid-Contact Us</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'; ?>

     <!-- banner start -->
     <div class="banner">
        <div class="detail">
            <h1>Contact</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, pariatur.
            </p>
            <a href="index.php" style="text-decoration:none;">Home</a><span>&nbsp;/&nbsp;Contact</span>
        </div>
    </div>
    <!-- banner end -->

    <!------------------------------Contact detail start------------------------------->
    <div class="services">
        <div class="row">
            <div class="box">
                <img src="newimages/shipping.svg" alt="" class="img-fluid">
                <div>
                    <h1>Free Shipping Fast</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
            <div class="box">
                <img src="newimages/moneyback.svg" alt="" class="img-fluid">
                <div>
                    <h1>Money back Gurantee</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
            <div class="box">
                <img src="newimages/support.svg" alt="" class="img-fluid">
                <div>
                    <h1>Online Support 24/7</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------Contact detail end---------------------------------------->


    <div class="line4"></div>


    <!-- ---------------------------------form container start-------------------------------------- -->
    <div class="form-container">
        <h1 class="title">leave a message</h1>
        <form method="post">
            <div class="input-field">
                <label>your name</label><br>
                <input type = "text" name="name">
            </div>
            <div class="input-field">
                <label>your email</label><br>
                <input type = "text" name="email">
            </div>
            <div class="input-field">
                <label>number</label><br>
                <input type = "number" name="number">
            </div>
            <div class="input-field">
                <label>your message</label><br>
                <textarea name="message"></textarea>
            </div>
            <button type="submit" name="submit-btn">send message</button>
        </form>
    </div>
    <!-- ---------------------------------form container end-------------------------------------- -->


    <div class="line"></div>
    <div class="line2"></div>


    <!-------------------- address start -------------------->
    <div class="address">
        <h1 class="title">Our Contact</h1>
        <div class="row">
            <div class="box">
                <i class="bi bi-map-fill"></i>
                <div>
                    <h4>address</h4>
                    <p>88  juhu park ,versova,<br>mumbai,986325</p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-telephone-fill"></i>
                <div>
                    <h4>phone number</h4>
                    <p>9874563210</p>
                </div>
            </div>
            <div class="box">
                <i class="bi bi-envelope-fill"></i>
                <div>
                    <h4>email</h4>
                    <p>jon@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <!-------------------- address end -------------------->
  <?php include 'footer.php'; ?>

    
  <script type="javascript" src="script.js"></script>
</body>
</html>