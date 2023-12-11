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


    //adding products in cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' ") or die('query failed');

        if(mysqli_num_rows($cart_num)>0) {
            $message[]= 'product already exist in cart';
        
        }else{
            mysqli_query($conn,"INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`, `image`) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')");
            $message[]= 'product sucessfully added in your cart';
        } 
    }


    //delete product from wishlist
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `wishlist` WHERE id ='$delete_id'") or die('query failed');

        header('location:wishlist.php');
    }


    //delete all product from wishlist
    if(isset($_GET['delete_all'])) {
        $delete_id = $_GET['delete_all'];
        
        mysqli_query($conn,"DELETE FROM `wishlist` WHERE user_id ='$user_id'") or die('query failed');

        header('location:wishlist.php');
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
            <h1>MY WISHLIST</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, pariatur.
            </p>
            <a href="index.php" style="text-decoration:none;">Home</a><span>&nbsp;/&nbsp;Wishlist</span>
        </div>
    </div>
    <!-- banner end -->

    <!------------------------------View products detail start------------------------------->

    <section class="shop">
        <h1 class="title">Products Added in Wishlist</h1>
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
                $select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist`") or die('query failed');
                if(mysqli_num_rows($select_wishlist) > 0) {
                    while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
                
            ?>
            <form method="post" class="box" style="border:2px solid #8080804f;">
            
                <img src="image/<?php echo $fetch_wishlist['image'];?>">
                <div class="price">$<?php echo $fetch_wishlist['price'];?>/-</div>
                <div class="name"><?php echo $fetch_wishlist['name'];?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['pid'];?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name'];?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price'];?>">
                <input type="hidden" name="product_quantity" value="1" min="1">
                <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image'];?>">
                <div class="icon">
                    <a href="view_page.php?pid=<?php echo $fetch_wishlist['pid'];?>" class="bi bi-eye-fill"></a>
                    <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id'];?>" class="bi bi-x" onclick="return confirm('do you want to delete this product from your wishlist')"></a>
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
            </form>
            <?php   
                    $grand_total+=$fetch_wishlist['price'];
                    }
                } else {
                    echo    '<p class="empty">no products added yet!</p>';
                }
            ?>

            
        </div>

        <div class="wishlist_total">
            <p>total amount payable:<span>$<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class= "btns">Continue Shopping</a>
            <a href="wishlist.php?delete_all" class= "btns <?php echo($grand_total)?'':'disabled' ?>" onclick="return confirm('do you want to delete all items in your wishlist')">delete all</a>
        </div>
    </section>

    <!----------------------------------------View products detail end---------------------------------------->


  <?php include 'footer.php'; ?>

    
  <script type="javascript" src="script.js"></script>
</body>
</html>