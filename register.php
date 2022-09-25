



<?php
session_start();
include('server/connection.php');

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if($password !== $confirmpassword){
            header('location: register.php?error=password do not match');

        }
        else if(strlen($password) < 6){
            header('location: register.php?error=password must be at least 6 characters');
        }
        else{
        $stmt1= $conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();
        if($num_rows !=0){
            header('location: register.php?error=user with this email already exists ');

        }else{

        $stmt=$conn -> prepare("INSERT INTO users(user_name,user_email,user_password)
                        VALUES (?,?,?)");
        $stmt->bind_param('sss',$name,$email,md5($password));
       
        if($stmt->execute()){
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: account.php?register= You Registered Succesfully');

        }
        else{
            header('location: register.php?error=could not create account at this moment');

        }
        }
        }
    }
    else if(isset($_SESSION['logged_in'])){
        header('locatuon: account.php');
        exit;
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


<!-- Register -->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="footer-widget-bold">Register</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form  id="register-form" method="POST" action="register.php">
            <p style="color: Red ;"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p>
            <div class="form-group">
                <label for=""> Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for=""> Email</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for=""> Password</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for=""> Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="confirmPassword" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="register">
            </div>
            <div class="form-group">
                <a id="login-url" class="btn" href="login.php">Do You Have An Account? Login</a>
            </div>
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