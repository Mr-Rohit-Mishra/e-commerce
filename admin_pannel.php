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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class="line4"></div>
    <section class="dashboard">
        <div class="box-container">
            <div class="box">
                <?php
                    $total_pendings = 0;
                    $select_pendings = mysqli_query($conn,"SELECT * FROM  `order` WHERE payment_status = 'pending'") or die('query failed');
                
                    while($fetch_pending = mysqli_fetch_assoc($select_pendings)) {
                        $total_pendings += $fetch_pending['total_price'];
                    }
                ?>
                <h3>$<?php echo $total_pendings; ?>/-</h3>
                <p>total pendings </p>
            </div>


            <div class="box">
                <?php
                    $total_completes = 0;
                    $select_completes = mysqli_query($conn,"SELECT * FROM  `order` WHERE payment_status = 'complete'") or die('query failed');
                
                    while($fetch_completes = mysqli_fetch_assoc($select_completes)) {
                        $total_completes += $fetch_completes['total_price'];
                    }
                ?>
                <h3>$<?php echo $total_completes; ?>/-</h3>
                <p>total completes </p>
            </div>




            <div class="box">
                <?php
                   $select_orders = mysqli_query( $conn,"SELECT * FROM `order`") or die('query failed');
                   $num_of_orders= mysqli_num_rows($select_orders);
                ?>
                <h3><?php echo $num_of_orders; ?></h3>
                <p>order placed</p>
            </div>


            <div class="box">
                <?php
                    $select_products = mysqli_query($conn,"SELECT * FROM  `products`") or die('query failed');
                    $num_of_products= mysqli_num_rows($select_products);
                ?>
                <h3><?php echo $num_of_products; ?></h3>
                <p>product added</p>
            </div>


            <div class="box">
                <?php
                    $select_users = mysqli_query($conn,"SELECT * FROM  `users` WHERE user_type = 'user'") or die('query failed');
                    $num_of_users= mysqli_num_rows($select_users); 
                ?>
                <h3><?php echo $num_of_users; ?></h3>
                <p>total normal users</p>
            </div>


            <div class="box">
                <?php
                    $select_admin = mysqli_query($conn,"SELECT * FROM  `users` WHERE user_type = 'admin'") or die('query failed');
                    $num_of_admin = mysqli_num_rows($select_admin);
                ?>
                <h3><?php echo $num_of_admin; ?></h3>
                <p>total admin</p>
            </div>


            <div class="box">
                <?php
                    $select_message = mysqli_query($conn,"SELECT * FROM  `message` ") or die('query failed');
                    $num_of_message = mysqli_num_rows($select_message);
                ?>
                <h3><?php echo $num_of_message; ?></h3>
                <p>new messages</p>
            </div>
        </div>
    </section>

      







    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>