<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Drk Shop</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  bg-light shadow-lg py-3 fixed-top">
        <div class="container">
         <img src="assets/imgs/logo.png" height="20px" width=" auto" />
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html" >Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html" >Login</a>
              </li>
              <li class="nav-item">
                <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                
                <a href="account.html"><i class="fas fa-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- home -->
      <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1> <span> Best Prices</span> This Season</h1>
            <p>Drk Shop Offers The Best Products For The Most Affordable Prices</p>
            <button>Shop Now</button>
        </div>
        
      </section>

<!-- brand -->
<section id="brand" class="container">
<div class="row">
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand 1.png" >
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand 2.png" >
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand 3.png" >
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand 4.png" >
  <!-- <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand 5.png" > -->
</div>
</section>

<!-- new -->
<section id="new" class="w-100">
  <div class="row p-0 m-0">
    <!-- one -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/laptop1.png" alt="">
      <div class="details">
        <h2>Best Laptops</h2>
        <button class="test-uppercase">Shop Now</button>
      </div>
    </div>
    <!-- two -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/ram1.png" alt="">
      <div class="details">
        <h2>Best Ram</h2>
        <button class="test-uppercase">Shop Now</button>
      </div>
    </div>
    <!-- three -->
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/ssd1.png" alt="">
      <div class="details">
        <h2>Best SSD</h2>
        <button class="test-uppercase">Shop Now</button>
      </div>
    </div>
  </div>

</section>

<!-- Featured -->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Featured</h3>
    <hr class="mx-auto">
    <p>Here You Can Check Out Featured Products</p>
  </div>

  <div class="row mx-auto container-fluid">
<?php include('server/get_featured_products.php'); ?>
<?php while($row =$featured_products ->fetch_assoc()){ ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
      <a href= <?php echo "single_product.php?product_id=". $row['product_id'];?>><button class="button button2">Buy Now</button></a>
    </div>

    <?php } ?>
  </div>
</section>
<!-- Laptops -->
<section id="featured" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Lattest Laptops</h3>
    <hr class="mx-auto">
    <p>Here You Can Check Out Our Lattest Laptops</p>
  </div>
  <div class="row mx-auto container-fluid">
  <?php include('server/get_laptops.php'); ?>
  <?php while($row =$featured_products ->fetch_assoc()){ ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
      <a href= <?php echo "single_product.php?product_id=". $row['product_id'];?>><button class="button button2">Buy Now</button></a>
      
    </div>

    <?php } ?>
  </div>

  
</section>

<!-- footer -->

<footer class="footer-section">
  <div class="container">
      <div class="footer-cta pt-5 pb-5">
          <div class="row">
              <div class="col-xl-4 col-md-4 mb-30">
                  <div class="single-cta">
                      <i class="fas fa-map-marker-alt"></i>
                      <div class="cta-text">
                          <h4>Find us</h4>
                          <span>Chittagong, Bangladesh</span>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-4 mb-30">
                  <div class="single-cta">
                      <i class="fas fa-phone"></i>
                      <div class="cta-text">
                          <h4>Call us</h4>
                          <span>018..</span>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-md-4 mb-30">
                  <div class="single-cta">
                      <i class="far fa-envelope-open"></i>
                      <div class="cta-text">
                          <h4>Mail us</h4>
                          <span>drkdevil106@gmail.com</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-content pt-5 pb-5">
          <div class="row">
              <div class="col-xl-4 col-lg-4 mb-50">
                  <div class="footer-widget">
                      <div class="footer-logo">
                          <a href="index.php"><img src="assets/imgs/logo.png" class="img-fluid" alt="logo"></a>
                      </div>
                      <div class="footer-text">
                          <p>We are provide The best Products <br> to your Affordable Prices</p>
                      </div>
                      <div class="footer-social-icon">
                          <span>Follow us</span>
                          <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                          <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                          <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                  <div class="footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Useful Links</h3>
                      </div>
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">about</a></li>
                          <li><a href="#">services</a></li>
                          <li><a href="#">portfolio</a></li>
                          <li><a href="#">Contact</a></li>
                          <li><a href="#">About us</a></li>
                          <li><a href="#">Our Services</a></li>
                          <li><a href="#">Expert Team</a></li>
                          <li><a href="#">Contact us</a></li>
                          <li><a href="#">Latest products</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                  <div class="footer-widget">
                      <div class="footer-widget-heading">
                          <h3>Subscribe</h3>
                      </div>
                      <div class="footer-text mb-25">
                          <p>Don???t miss to subscribe to our new feeds, kindly fill the form below.</p>
                      </div>
                      <div class="subscribe-form">
                          <form action="#">
                              <input type="text" placeholder="Email Address">
                              <button><i class="fab fa-telegram-plane"></i></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="copyright-area">
      <div class="container">
          <div class="row">
              <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                  <div class="copyright-text">
                      <p>Copyright &copy; 2022, All Right Reserved <a href="#">Drk Shop</a></p>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                  <div class="footer-menu">
                      <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Terms</a></li>
                          <li><a href="#">Privacy</a></li>
                          <li><a href="#">Policy</a></li>
                          <li><a href="#">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>