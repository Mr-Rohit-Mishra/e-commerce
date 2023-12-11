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

    //adding products in wishlist
    if (isset($_POST['add_to_wishlist'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name ='$product_name' AND user_id = '$user_id'") or die('query failed');
        // $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' ") or die('query failed');

        if(mysqli_num_rows($wishlist_number)>0) {
            $message[]= 'product already exist in wishlist';
        // }else if(mysqli_num_rows($cart_num)>0){
        //     $message[]= 'product already exist in cart';
        }else{
            mysqli_query($conn,"INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
            $message[]= 'product sucessfully added in your wishlist';
        } 
    }


    //adding products in cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' ") or die('query failed');

        if(mysqli_num_rows($cart_num)>0) {
            $message[]= 'product already exist in cart';
        
        }else{
            mysqli_query($conn,"INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`, `image`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
            $message[]= 'product sucessfully added in your cart';
        } 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalloid-Shop Detail</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'; ?>

     <!-- banner start -->
     <div class="banner">
        <div class="detail">
            <h1>Product Detail</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, pariatur.
            </p>
            <a href="index.php" style="text-decoration:none;">Home</a><span>&nbsp;/&nbsp;SHOP Detail</span>
        </div>
    </div>
    <!-- banner end -->

    <!------------------------------View products detail start------------------------------->

    <section class="view_page">

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

        
        <?php
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$pid' ") or die("query failed");
                if(mysqli_num_rows($select_products)> 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>      
        <form method="post">
            <img src="image/<?php echo $fetch_products['image'];?>">
            <div class="detail">
                <div class="price">$<?php echo $fetch_products['price'];?>/-</div>
                <div class="name"><?php echo $fetch_products['name'];?></div>
                <div class="detail"><?php echo $fetch_products['product_detail'];?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'];?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
                <input type="hidden" name="product_quantity" value="1" min="1">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
                <div class="icon">
                    <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                    <input type="number" name="product_quantity" value="1" min="0" class="quantity">
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
            </div>
        </form>
        <?php
                    }
                }
            }
        ?>
    </section>

    <!----------------------------------------View products detail end---------------------------------------->


  <?php include 'footer.php'; ?>

    
  <script type="javascript" src="script.js"></script>
</body>
</html>