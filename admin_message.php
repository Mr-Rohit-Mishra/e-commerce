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

    
    
    //delete products from database

    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `message` WHERE id='$delete_id'") or die('query failed');
       
        header('location:admin_message.php');
    }

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
    <section class="message-container">
        <h1 class="title">unread message</h1>
        <div class="box-container">
            <?php
                $select_message = mysqli_query($conn,"SELECT * FROM `message`") or die('query failed');
                if (mysqli_num_rows($select_message) > 0) {
                    while($fetch_message = mysqli_fetch_assoc($select_message)) {
            ?>
            <div class="box">
                <p>user id:<span><?php echo $fetch_message['id']; ?></span> </p>
                <p>name:<span><?php echo $fetch_message['name']; ?></span> </p>
                <p>email:<span><?php echo $fetch_message['email']; ?></span> </p>
                <p><?php echo $fetch_message['message']; ?></p>
                <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>;" onclick="return confirm('delete this message');">delete</a>
            </div>
            <?php
                    }
                }else{
                    echo'
                        <div class="empty">
                            <p>no products added yet!</p>
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