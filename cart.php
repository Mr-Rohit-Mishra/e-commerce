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
        // $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' ") or die('query failed'); ##below line mentions why i commented these lines

        if(mysqli_num_rows($wishlist_number)>0) {
            $message[]= 'product already exist in wishlist';
        // }else if(mysqli_num_rows($cart_num)>0){ ##i have removed this code because it cause conflit in adding products in wishlist whenever we add product in wishlist which is already in cart it shows this message  
        //     $message[]= 'product already exist in cart';
        }else{
            mysqli_query($conn,"INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
            $message[]= 'product sucessfully added in your wishlist';
        } 
    }




    // update quantity
    if(isset($_POST['update_qty_btn'])){
        $update_qty_id = $_POST['update_qty_id'];
        $update_value = $_POST['update_qty'];

        $update_query = mysqli_query($conn, "UPDATE `cart` SET quantity= '$update_value' WHERE id= '$update_qty_id' ") or die('query failed');
        if ($update_query) {
            header('location:cart.php');
        }
    }


    //delete product from cart
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `cart` WHERE id ='$delete_id'") or die('query failed');

        header('location:cart.php');
    }


    //delete all product from cart
    if(isset($_GET['delete_all'])) {
        $delete_id = $_GET['delete_all'];
        
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id ='$user_id'") or die('query failed');

        header('location:cart.php');
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
            <h1>MY CART</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, pariatur.
            </p>
            <a href="index.php" style="text-decoration:none;">Home</a><span>&nbsp;/&nbsp;CART</span>
        </div>
    </div>
    <!-- banner end -->

    <!------------------------------View products detail start------------------------------->

    <section class="shop">
        <h1 class="title">Products Added in Cart</h1>
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

        <div class="box-container">
            <?php
                $grand_total =0;
                $select_cart = mysqli_query($conn,"SELECT * FROM `cart`") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0) {
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                
            ?>
            <div class="box" style="border: 2px solid #8080804f;">
                <div class="icon">
                    <a href="view_page.php?pid=<?php echo $fetch_cart['pid'];?>" class="bi bi-eye-fill"></a>
                    <a href="cart.php?delete=<?php echo $fetch_cart['id'];?>" class="bi bi-x" onclick="return confirm('do you want to delete this product from your cart')"></a>
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
                <img src="image/<?php echo $fetch_cart['image'];?>">
                <div class="price">$<?php echo $fetch_cart['price'];?>/-</div>
                <div class="name"><?php echo $fetch_cart['name'];?></div>
                <form method="post">
                    <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id']; ?>">
                    <div class="qty">
                        <input type="number" min="1" name="update_qty" value="<?php echo $fetch_cart['quantity'];?>">
                        <input type="submit" name="update_qty_btn" value="update">
                    </div>
                </form>
                <div class="total-amt">
                    Total Amount : <span><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity']) ?></span>
                </div>
            </div>

            <?php   
                    $grand_total+=$total_amt;
                    }
                } else {
                    echo    '<p class="empty">no products added yet!</p>';
                }
            ?>

            
        </div>
        <div class="dlt">
            <a href="cart.php?delete_all" class= "btn2" onclick="return confirm('do you want to delete all items in your cart')"  style="text-decoration:none;">delete all</a>
        </div>
        <div class="wishlist_total">
            <p>total amount payable:<span>$<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class= "btns">Continue Shopping</a>
            <a href="checkout.php" class= "btns <?php echo($grand_total >1)?'':'disabled' ?>" onclick="return confirm('do you want to checkout ')">Proceed to checkout</a>
        </div>
    </section>

    <!----------------------------------------View products detail end---------------------------------------->


  <?php include 'footer.php'; ?>

    
  <script type="javascript" src="script.js"></script>
</body>
</html>