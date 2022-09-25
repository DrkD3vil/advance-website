<?php
    //include('server/connection.php');
    session_start();
    if(isset($_POST['add_to_cart'])){
        // if user already added to cart
        if(isset($_SESSION['cart'])){
            $product_array_ids = array_column($_SESSION['cart'],"product_id");
            if(!in_array($_POST['product_id'],$product_array_ids)){
                $product_id = $_POST['product_id'];
             
                $product_array = array(
                                'product_id' => $_POST['product_id'],
                                'product_name' => $_POST['product_name'],
                                'product_price' => $_POST['product_price'],
                                'product_image' => $_POST['product_image'],
                                'product_quantity' => $_POST['product_quantity']
                );
                $_SESSION['cart'][$product_id]= $product_array;

            }else{
                echo'<script>alert("product was already to cart")</script>';
                //echo'<script>alert(window.location="index.php")</script>';
            }
        }
        // if this the first product
        else{
            $product_id =$_POST['product_id'];
            $product_name =$_POST['product_name'];
            $product_price =$_POST['product_price'];
            $product_image =$_POST['product_image'];
            $product_quantity =$_POST['product_quantity'];
    
            $product_array =array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_image' => $product_image,
                            'product_quantity' => $product_quantity
            );
            $_SESSION['cart'][$product_id]= $product_array;
        }
         //update total
    calculatetotalcart();
    }
   
    else if(isset($_POST['remove_product'])){
        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);
        //update total
    calculatetotalcart();
    }
    elseif(isset($_POST['edit_quantity'])){
        $product_id = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
        $product_array = $_SESSION['cart'][$product_id];
        $product_array['product_quantity'] = $product_quantity;
        $_SESSION['cart'][$product_id]=$product_array;
        //update total
        calculatetotalcart();
    }else{
        //header('location: index.php');
        echo("not work");
    }



function calculatetotalcart(){
    $total = 0;
    foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];
        $total = $total + ( $price * $quantity);
    }
    $_SESSION['total'] = $total;
}







?>









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
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
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
                <a href="cart.html"><i class="fa fa-cart-plus"></i></a>
                
                <a href="account.html"><i class="fas fa-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<!-- cart -->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="footer-widget-bolde"> Your Cart</h2>
        <hr>
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>SubTotal</th>
        </tr>
        <?php foreach($_SESSION['cart'] as $key => $value){?>

        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo $value['product_image']; ?>"/>
                    <div class="">
                        <p><?php echo $value['product_name']; ?></p>
                        <small><span>BDT </span><?php echo $value['product_price']; ?></small>
                        <br>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <input type="submit" name="remove_product" class="remove-btn" value="remove">
                        </form>

                    </div>
                </div>
            </td>
            <td>
                
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                    <input type="submit" class="edit-btn" value="set" name="edit_quantity">
                </form>
                <!-- <a class="edit-btn" href="#">Edit</a> -->
            </td>
            <td>
                <span class="product-price"> <?php echo $value['product_quantity'] * $value['product_price']; ?></span>
            </td>
        </tr>

        <?php } ?>
    </table>


    <div class="cart-total">
        <table>
            <!-- <tr>
                <td>SubTotal</td>
                <td>BDT 36000</td>
            </tr> -->
            <tr>
                <td>Total</td>
                <td>BDT <?php echo $_SESSION['total']; ?></td>
            </tr>
        </table>
    </div>

<div class="checkout-container">
    <form method="POST" action="checkout.php">

    <input type="submit" class="btn checkout-btn" value="CheckOut" name="checkout"></input>
    </form>
    
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
                            <a href="index.html"><img src="assets/imgs/logo.png" class="img-fluid" alt="logo"></a>
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
                            <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
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