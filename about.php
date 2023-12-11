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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalloid-About</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'; ?>


    <!-- banner start -->
    <div class="banner">
        <div class="detail">
            <h1>About Us</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, pariatur.
            </p>
            <a href="index.php" style="text-decoration:none;">Home</a><span>&nbsp;/&nbsp;ABOUT US</span>
        </div>
    </div>
    <!-- banner end -->


    <div class="line"></div>
    <div class="line2"></div>


    <!-- About us -->
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>ABOUT OUR ONLINE STORE</span>
                    <h1>Hello, With 25 years of experience</h1>
                </div>
                <p>
                    Headquartered in Benicia, California, Fitness Superstore, Inc. was founded in 2010, and incorporated in 2013. We specialize in selling new and remanufactured gym equipment. Our product line includes home, light commercial, and commercial grade fitness equipment. Wherever you are, Fitness Superstore, Inc. can serve you. We ship and offer both room of choice delivery service, as well as on-site warranty service throughout both the United States and Canada. Looking for weights or equipment for your home gym? Need to outfit your fitness facility? Fitness Superstore can serve you. 
                </p>

            </div>
            <div class="img-box">
                <img src="newimages/ourstory.webp">
            </div>
        </div>
    </div>
    <!-- About us end -->


    <div class="line3"></div>
    <div class="line4"></div>


    <!-- features start -->
    <div class="features">
        <div class="title">
            <h1>Complete Customer Ideas</h1>
            <span>Best Features</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="newimages/support.svg">
                <h4>24 X 7</h4>
                <p>online support 27/7</p>
            </div>
            <div class="box">
                <img src="newimages/moneyback.svg">
                <h4>Money Back Gurantee</h4>
                <p>100% Secure Payment</p>
            </div>
            <div class="box">
                <img src="newimages/coupon.png">
                <h4>Special Gift Card</h4>
                <p>Give The Perfect Gift</p>
            </div>
            <div class="box">
                <img src="newimages/shipping.svg">
                <h4>Worldwide Shipping</h4>
                <p>On order Above $99</p>
            </div>
        </div>
    </div>
    <!-- features end -->


    <div class="line"></div>
    <div class="line2"></div>


    <!-- team section start -->
    <div class="team">
        <div class="title">
            <h1>Our Workable Team</h1>
            <span>Best Team</span>
        </div>
        <div class="row">
            <div class="box">
                <div class="img-box">
                    <img src="newimages/customer1.jpg">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Mohit</h4>
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-behance"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="img-box">
                    <img src="newimages/customer2.jpg">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Manish</h4>
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-behance"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="img-box">
                    <img src="newimages/customer3.jpg">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Rohit</h4>
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-behance"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="img-box">
                    <img src="newimages/customer4.jpg">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Priyanshi</h4>
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-behance"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="img-box">
                    <img src="newimages/customer5.jpg">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Sweta</h4>
                    <div class="social-links">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-youtube"></i>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-behance"></i>
                        <i class="bi bi-whatsapp"></i>
                    </div>
                </div>

            </div>
        </div>
    </div> 
    <!-- team section end -->


    <div class="line3"></div>
    <div class="line4"></div>


    <!-- project start -->
    <div class="project">
        <div class="title">
            <h1>Different Discount Procedures</h1>
            <span>How It Works</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="newimages/aboutpage1.webp">
            </div>
            <div class="box">
                <img src="newimages/aboutpage2.webp">
            </div>
        </div>
    </div>
    <!-- project end -->


    <div class="line"></div>
    <div class="line2"></div>

    <!-- ideas start -->
    <div class="ideas">
        <div class="title">
            <h1>WE and our Clients are Happy with our Company</h1>
            <span>Our Features</span>
        </div>
        <div class="row">
            <div class="box">
                <i class="bi bi-stack"></i>
                <div class="detail">
                    <h2>What We Really Do</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatem ab amet quas atque, praesentium ipsum iure exercitationem unde nobis!</p>

                </div>
            </div>
            <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                <div class="detail">
                    <h2>History of Beginning</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatem ab amet quas atque, praesentium ipsum iure exercitationem unde nobis!</p>

                </div>
            </div>
            <div class="box">
                <i class="bi bi-tropical-storm"></i>
                <div class="detail">
                    <h2>Our Vision</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatem ab amet quas atque, praesentium ipsum iure exercitationem unde nobis!</p>

                </div>
            </div>
            
        </div>
    </div>
    <!-- ideas end -->


    <div class="line3"></div>


    <?php include 'footer.php'; ?>

    
  <script type="javascript" src="script.js"></script>
</body>
</html>