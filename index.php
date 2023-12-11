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
        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id' ") or die('query failed');

        if(mysqli_num_rows($wishlist_number)>0) {
            $message[]= 'product already exist in wishlist';
        }else if(mysqli_num_rows($cart_num)>0){
            $message[]= 'product already exist in cart';
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
    <title>Essential-HOME</title>
    <link rel="stylesheet" type="text/css" href="main.css">

    <!-- _____ Slick Slider _____ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'; ?>

   
    <div class="container-fluid">

        <div class="sliderbanner">
            <div class="slider-item">
                <img src="newimages/homepage slider1.jpg">
                <div class="slider-caption">
                  <!-- <span>test the quality</span>
                  <h1></h1>
                  <p></p> -->
                </div>
            </div>

            <div class="slider-item">
                <img src="newimages/homepage slider2.jpg">
                <div class="slider-caption">
                   <!-- <span>test the quality</span>
                  <h1></h1>
                  <p></p> -->
                  
                </div>
            </div>
            <div class="slider-item">
                <img src="newimages/homepage slider3.jpg">
                <div class="slider-caption">
                   <!-- <span>test the quality</span>
                  <h1></h1>
                  <p></p> -->
                  
                </div>
            </div>
            <div class="slider-item">
                <img src="newimages/homepage slider4.jpg">
                <div class="slider-caption">
                   <!-- <span>test the quality</span>
                  <h1></h1>
                  <p></p> -->
                  
                </div>
            </div>
            <div class="slider-item">
                <img src="newimages/homepage slider5.jpg">
                <div class="slider-caption">
                   <!-- <span>test the quality</span>
                  <h1></h1>
                  <p></p> -->
                  
                </div>
            </div>
            
        </div>
        <i class="bi bi-chevron-left prev" onclick="plusSlides(-1)"></i>
        <i class="bi bi-chevron-right next" onclick="plusSlides(1)"></i>
    </div>
  


    <div class="line"></div>

    <div class="services">
        <div class="row">
            <div class="box">
                <img src="newimages/shipping.svg" alt="" class="img-fluid">
                <div>
                    <h1>Free Shipping Fast</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
            <div class="box">
                <img src="newimages/moneyback.svg" alt="" class="img-fluid">
                <div>
                    <h1>Money back Gurantee</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
            <div class="box">
                <img src="newimages/support.svg" alt="" class="img-fluid">
                <div>
                    <h1>Online Support 24/7</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, dolores.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line2"></div>
    <div class="story stories">
        <div class="row">
            <div class="box">
                <span>Our Story</span>
                <h1>Serving since 2 decades.</h1>
                <p>For us, Essential is the spirit of looking at things differently. Trying new things even when success is not guaranteed. Not stepping on others to get ahead. Thinking about the benefit of others just as you’d think about your own.</p>
                <a href="shop.php" class="btn">Shop now</a>
            </div>
            <div class="box">
                <img src="newimages/ourstory.webp" alt="" class="src">
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <div class="line4"></div>

    <div class="testimonial-fluid">
        <h1 class="title">What Our Customers Say's</h1>
        <div class="slider">
		
		    <div class="myslide">
                <div class="testimonial-item">
                    <img src="newimages/customer1.jpg">
                    <div class="testimonial-caption">
                        <span>Test The pricing</span>
                        <h1>Very Affordable Pricing </h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat laborum eos delectus quod esse ab. Temporibus maiores vero sint a recusandae nulla alias porro, eum animi. Iusto quidem ut magni dolore quo quae unde officiis inventore, perspiciatis enim quas voluptatem? Corrupti officia, perferendis inventore aliquid porro sed itaque eius!</p>
                    </div>
                </div>
		    	
		    </div>
    
		    <div class="myslide">
                <div class="testimonial-item">
                    <img src="newimages/customer2.jpg">
                    <div class="testimonial-caption">
                        <span>Test customer support</span>
                        <h1>Got this within 3 days</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat laborum eos delectus quod esse ab. Temporibus maiores vero sint a recusandae nulla alias porro, eum animi. Iusto quidem ut magni dolore quo quae unde officiis inventore, perspiciatis enim quas voluptatem? Corrupti officia, perferendis inventore aliquid porro sed itaque eius!</p>
                    </div>
                </div>
		    </div>
    
		    <div class="myslide">
                <div class="testimonial-item">
                    <img src="newimages/customer3.jpg">
                    <div class="testimonial-caption">
                        <span>Test The Quality</span>
                        <h1>Premium Quality product</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat laborum eos delectus quod esse ab. Temporibus maiores vero sint a recusandae nulla alias porro, eum animi. Iusto quidem ut magni dolore quo quae unde officiis inventore, perspiciatis enim quas voluptatem? Corrupti officia, perferendis inventore aliquid porro sed itaque eius!</p>
                    </div>
                </div>
		    </div>
    
		    <div class="myslide">
                <div class="testimonial-item">
                    <img src="newimages/customer4.jpg">
                    <div class="testimonial-caption">
                        <span>Test Comfort level</span>
                        <h1>Feels very soft</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat laborum eos delectus quod esse ab. Temporibus maiores vero sint a recusandae nulla alias porro, eum animi. Iusto quidem ut magni dolore quo quae unde officiis inventore, perspiciatis enim quas voluptatem? Corrupti officia, perferendis inventore aliquid porro sed itaque eius!</p>
                    </div>
                </div>
		    </div>
            <i class="bi bi-chevron-left prev1" onclick="plusSlides(-1)"></i>
            <i class="bi bi-chevron-right next1" onclick="plusSlides(1)"></i>
		    <div class="dotsbox" style="text-align:center">
		    	<span class="dot" onclick="currentSlide(1)"></span>
		    	<span class="dot" onclick="currentSlide(2)"></span>
		    	<span class="dot" onclick="currentSlide(3)"></span>
		    	<span class="dot" onclick="currentSlide(4)"></span>
		    </div>
		
	    </div>
    </div>

    <div class="line"></div>
    <img src="newimages/discover.jpg">
    
    <div class="line2"></div>
    <div class="discover">
        <div class="detail">
            <h1 class="title">ALL products are qulity checked</h1>
            <span>Buy Now and Save 30% off!</span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, vero excepturi labore molestiae facere sapiente sequi. Debitis adipisci at explicabo, a consequuntur excepturi molestias animi architecto dolore, amet eius quos magnam voluptates, odit accusantium. Molestias hic doloribus totam ratione eveniet assumenda mollitia quia, eos eius ipsam possimus quibusdam porro repudiandae!</p>
            <a href="shop.php" class="btn">Discover Now</a>
        </div>
        <div class="img-box">
            <img src="newimages/dis.webp">
        </div>
    </div>
    

    <div class="line3"></div>
    <?php include 'homeshop.php';?>


    <div class="line2"></div>
    <div class="newsletter">
        <h1 class="title">Join Our Newsletter</h1>
        <p>Get 15% off your next order. Be the First to Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, beatae.</p>
        <input type ="text" name="" placeholder="Your Email Address.....">
        <button>Subscribe Now</button>
    </div>
    <div class="line3"></div>


    <div class="client">
        <div class="box">
              <img src="newimages/client1.jpg">
        </div>
        <div class="box">
               <img src="newimages/client2.jpg">
        </div>
        <div class="box">
               <img src="newimages/client3.png">
        </div>
        <div class="box">
              <img src="newimages/client4.png">
        </div>
        <div class="box">
               <img src="newimages/client5.png">
        </div>
    </div>



    <?php include 'footer.php'; ?>

    <script src="myslider.js"></script>
     <!-- ___________ Slick Slider ______________ -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script type="javascript" src="script2.js"></script>
 <!-- // nextArrow: $('.next'),
//     prevArrow: $('.prev') -->
    <script>
        $('.sliderbanner').slick({
          centerMode: true,
          nextArrow: $('.next'),
          prevArrow: $('.prev'),
          autoplay: true,
          centerPadding: '0px',
          slidesToShow: 2,
          responsive: [{
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              Infinity: true,
              slidesToShow: 1
            },
          }]
        });
    </script>
</body>
</html>