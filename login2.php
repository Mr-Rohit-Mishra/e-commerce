<?php
    include'connection.php';
    session_start();

    if (isset($_POST['submit-btn'])){
        $query= "SELECT * FROM `users` WHERE `email`= '$_POST[email]' AND `password`='$_POST[password]' ";
        $result=mysqli_query($conn,$query);
        

        if(mysqli_num_rows($result)>0) {
            session_start();
            $_SESSION['email']=$_POST['email'];
            header('location:admin_pannel.php');
            
        }
        
        else{
            echo "incorrect";
        }
        
        
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    
    <section class="form-container">
        
        <form method="post">

            <h1>login now</h1>

            <div class="input-field">
                <label>your email</label><br>
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>

            <div class="input-field">
                <label>your password</label><br>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            
            <input type="submit" name="submit-btn" value="login now" class="btn">
            <p>Do not have an account ?<a href="register.php">Register Now</a></p>
        </form>
    </section>
</body>
</html>