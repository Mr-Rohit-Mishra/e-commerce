<?php
   include'connection.php';
   session_start();
   $admin_id = $_SESSION['admin_name'];
   if (!isset($admin_id)) {
       header('location:login.php');
   }
   if (isset($_POST['logout'])) {
       session_destroy();
       header('location:login.php');
    }

    
    
    //delete user from database

    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `users` WHERE id='$delete_id'") or die('query failed');
        $message[]='user removed successfully';
       
        header('location:admin_user.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'admin_header.php'; ?>
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
    <div class="line4"></div>
    <section class="user-container">
        <h1 class="title">total user account</h1>
        <div class="box-container">
            <?php
                $select_users = mysqli_query($conn,"SELECT * FROM `users`") or die('query failed');
                if (mysqli_num_rows($select_users) > 0) {
                    while($fetch_users = mysqli_fetch_assoc($select_users)) {
            ?>
            <div class="box">
                <p>user id:<span><?php echo $fetch_users['id']; ?></span> </p>
                <p>name:<span><?php echo $fetch_users['name']; ?></span> </p>
                <p>email:<span><?php echo $fetch_users['email']; ?></span> </p>
                <p>user type:<span style="color:<?php if($fetch_users['user_type']=='admin'){echo 'orange';};?>"> <?php echo $fetch_users['user_type']; ?></span></p>
               
                <a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>;" onclick="return confirm('Want to delete this user');" class="delete">delete</a>
            </div>
            <?php
                    }
                }else{
                    echo'
                        <div class="empty">
                            <p>no User added yet!</p>
                        </div>
                    ';
                }
            ?>
        </div>
    </section>
    <div class="line"></div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>