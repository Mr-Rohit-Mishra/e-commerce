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

    
    
    //delete order from database

    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `order` WHERE id='$delete_id'") or die('query failed');
        $message[]='order removed successfully';
       
        header('location:admin_order.php');
    }

    //update payment status
    if (isset($_POST['update_order'])) {
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];

        mysqli_query($conn,"UPDATE `order` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
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
    <section class="order-container">
        <h1 class="title">total orders</h1>
        <div class="box-container">
            <?php
                $select_order = mysqli_query($conn,"SELECT * FROM `order`") or die('query failed');
                if (mysqli_num_rows($select_order) > 0) {
                    while($fetch_order = mysqli_fetch_assoc($select_order)) {
            ?>
            <div class="box">
                <p>user name:<span><?php echo $fetch_order['name']; ?></span> </p>
                <p>user id:<span><?php echo $fetch_order['user_id']; ?></span> </p>
                <p>placed on :<span><?php echo $fetch_order['placed_on']; ?></span> </p>
                <p>number:<span><?php echo $fetch_order['number']; ?></span> </p>
                <p>email:<span><?php echo $fetch_order['email']; ?></span> </p>
                <p>total price:<span><?php echo $fetch_order['total_price']; ?></span> </p>
                <p>method:<span><?php echo $fetch_order['method']; ?></span> </p>
                <p>address:<span><?php echo $fetch_order['address']; ?></span> </p>
                <p>total product:<span><?php echo $fetch_order['total_products']; ?></span> </p>
                
                <form method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $fetch_order['id'];?>">
                    <select name= "update_payment">
                        <option disabled selected><?php echo $fetch_order['payment_status'];?></option>
                        <option value="pending">Pending</option>
                        <option value="complete">Complete</option>
                    </select>
                    <input type="submit" name="update_order" value= "update payment" class="btn">
                    <a href="admin_order.php?delete=<?php echo $fetch_order['id']; ?>;" onclick = "return confirm('delete this order');" class="delete">delete</a>
                </form>
                
            </div>
            <?php
                    }
                }else{
                    echo'
                        <div class="empty">
                            <p>no order placed yet!</p>
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