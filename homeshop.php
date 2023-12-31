<?php
   include'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <!-- _____ Slick Slider _____ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>
    <section class="popular-brands">
      <h2>POPULAR BRANDS</h2>
      <div class="controls">
        <i class="bi bi-chevron-left left"></i>
        <i class="bi bi-chevron-right right"></i>
      </div>
      
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

        <div class="popular-brands-content">
            <?php
                $select_products = mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
                if(mysqli_num_rows($select_products) > 0) {
                    while($fetch_products = mysqli_fetch_assoc($select_products)) {
                
            ?>
            <form method="post" class="card">
                <img src="image/<?php echo $fetch_products['image'];?>">
                <div class="price">$<?php echo $fetch_products['price'];?>/-</div>
                <div class="name"><?php echo $fetch_products['name'];?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id'];?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
                <input type="hidden" name="product_quantity" value="1" min="1">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
                <div class="icon">
                    <a href="view_page.php?pid=<?php echo $fetch_products['id'];?>" class="bi bi-eye-fill"></a>
                    <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                    <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                </div>
            </form>
            <?php
                    }
                } else {
                    echo    '<p class="empty">no products added yet!</p>';
                }
            ?>

            
        </div>
    </section>
  
    
  <!-- ___________ Slick Slider ______________ -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script>
    
$('.popular-brands-content').slick({
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  slidesToScroll: 1,
  nextArrow: $('.right'),
  prevArrow: $('.left'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    // $('.popular-brands-content').slick({
    //   centerMode: true,
    //   dots: true,
    //   autoplay: true,
    //   centerPadding: '60px',
    //   slidesToShow: 3,
    //   responsive: [{
    //     breakpoint: 768,
    //     settings: {
    //       arrows: false,
    //       centerMode: true,
    //       centerPadding: '40px',
    //       Infinity: true,
    //       slidesToShow: 1
    //     },
    //   }]
    // });

  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="javascript" src="script2.js"></script>
</body>
</html>
