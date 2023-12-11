<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <!--CSS Links-->
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="header.php" class="logo"> <img src="image/headerlogo.png" class="header-logo"></a>
            <nav class="navbar">
                <a href="index.php">HOME</a>
                <a href="about.php">ABOUT</a>
                <a href="shop.php">SHOP</a>
                <a href="order.php">ORDER</a>
                <a href="contact.php">CONTACT</a>
            </nav>
            <div class="icons">
                <i class="bi bi-person" id="user-btn"></i>
                <?php
                    $select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE user_id = '$user_id' ") or die('query failed') ;
                    $wishlist_num_rows = mysqli_num_rows($select_wishlist);
                ?>
                <a href="wishlist.php"><i class="bi bi-heart"></i><sup class="s"><?php echo $wishlist_num_rows; ?></sup></a>
                <?php
                    $select_cart = mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id = '$user_id' ") or die('query failed') ;
                    $cart_num_rows = mysqli_num_rows($select_cart);
                ?>
                <a href="cart.php"><i class="bi bi-cart"></i><sup class="s"><?php echo $cart_num_rows; ?></sup></a>
                <i class="bi bi-list" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>username : <span><?php echo  $_SESSION['user_name']; ?></span></p>
                <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post">
                    <button type="submit" name="logout" class="logout-btn">log out</button>
                </form>
            </div>
        </div>
    </header>
    
    <script src="script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
