<?php
    include'connection.php';
    session_start();

    if (isset($_POST['submit-btn'])) {
        
        
        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);
        
        $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($conn, $filter_password);
        
        
        
        $select_user = mysqli_query($conn,"SELECT * FROM `users` WHERE email= '$email' AND password='$password' ")or die('query failed');
       
        if(mysqli_num_rows($select_user)>0) {
            $row = mysqli_fetch_assoc($select_user);
            if($row['user_type']== 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_password'] = $row['password'];
                header('location:admin_pannel.php');
            }
            else if($row['user_type']== 'user'){
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_password'] = $row['password'];
                header('location:index.php');   
            }
            
        }
        
        else{
            $message[]= 'incorrect email or password';
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
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    
    <section class="form-container">
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '
                        <div class="message">
                            <span>'.$message.'</span>
                            <i class="bi bi-x-circle"  onclick="this.parentElement.remove()"></i>
                        </div>
                    ';
                }
            }
        ?>
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