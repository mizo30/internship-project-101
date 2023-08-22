<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./login.css" />
 <!-- Favicons -->
    <link href="./cloud-computing.png" rel="icon" />
    <link href="./cloud-computing.png" rel="apple-touch-icon" />
    <title>Tn.Cloud</title>

    <!--Bootstrap icons-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
  </head>

  <body>
    <!--Navbar strat-->
    <header class="header">
      <nav class="navbar">
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="projects.html">Project</a>
        <a href="contact.html">Contact Us</a>
      </nav>
      <form action="#" class="search-bar">
        <input type="text" placeholder="search..." />
        <button type="submit"><i class="bi bi-search"></i></button>
      </form>
    </header>
    <!--Navbar end-->
    <div class="background"></div>
    <div class="container">
      <div class="content">
        <h2 class="logo"><i class="bi bi-clouds-fill"></i>Tn.Cloud</h2>

        <div class="text-sci">
          <h2>Welcome! <br /><span>To our New platforme</span></h2>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi
            fugit necessitatibus quisquam atque similique voluptatibus fugiat
            laborum numquam odio, cumque corrupti, placeat quia maxime
            perferendis optio iusto beatae eum repellendus!
          </p>

          <div class="social-icons">
            <a href="#!"> <i class="bi bi-facebook"></i></a>
            <!-- Twitter -->
            <a href="#!"> <i class="bi bi-twitter"></i></a>

            <!-- Google -->
            <a href="#!"> <i class="bi bi-google"></i></a>

            <!-- Instagram -->
            <a href="#!"> <i class="bi bi-instagram"></i></a>

            <!-- Linkedin -->
            <a href="#!"> <i class="bi bi-linkedin"></i></a>

            <!-- Github -->
            <a href="#!"> <i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>

      <div class="logreg-box">



      <?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_stage` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>


        <!--sign in start-->
        <div class="form-box login" id="signin">
          <form action="" method="POST">
            <h2>Sign In</h2>

            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

            <div class="input-box">
              <span class="icon"><i class="bi bi-envelope-fill"></i></span>
              <input type="email" name="eamil" required />
              <label>Email</label>
            </div>
            <div class="input-box">
              <span class="icon"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" required />
              <label>Password</label>
            </div>
           
            <div class="remember-forgot">
              <label><input type="checkbox" />Remember me</label>
              <a href="#">Forgot password?</a>
            </div>
            <button type="submit" name="submit" value="login now" class="btn">Sign In</button>

            <div class="login-register">
              <p>
                Don't have an account?
                <a href="#signup" class="register-link">Sign Up</a>
              </p>
            </div>
          </form>
        </div>
        <!--sign in end-->



        <?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   
   $select = mysqli_query($conn, "SELECT * FROM `user_stage` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_stage`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');

         if($insert){
          
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

        <!--sign up start-->

        <div class="form-box register">
          <form action="" method="POST">
            <h2>Sign Up</h2>

     <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

            <div class="input-box">
              <span class="icon"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="name" required />
              <label>Name</label>
            </div>

            <div class="input-box">
              <span class="icon"><i class="bi bi-envelope-fill"></i></span>
              <input type="email" name="email" required />
              <label>Email</label>
            </div>
            <div class="input-box">
              <span class="icon"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" required />
              <label>Password</label>
            </div>
            <div class="input-box">
              <span class="icon"><i class="bi bi-lock-fill"></i></span>
              <input type="pass" name="cpassword" required />
              <label>Confirm Password</label>
            </div>
            <div class="remember-forgot">
              <label
                ><input type="checkbox" />I agree to the terms &
                conditions</label
              >
            </div>
            <button type="submit" name="submit" value="login now" class="btn">Sign Up</button>

            <div class="login-register">
              <p id="signup">
                Already have an account?
                <a href="#signin" class="login-link">Sign In</a>
              </p>
            </div>
          </form>
        </div>

        <!--sign up end-->
      </div>
    </div>
    <script src="../code js/script.js"></script>
  </body>
</html>

<header>
  <!--
  <nav class="navbar navbar-expand-lg">
      <div class="container">
          <a class="navbar-brand" href="#"><img src="./img/logo/logoisik.gif" alt="" width="190px" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="#">About</a>
                  </li>


                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Course<i class="bi bi-caret-down"></i></a>
                  
                  <div class="dropdown-menu">
                      <ul>
                          <li><a href="#">UVT.jn</a></li>
                          <li><a href="#">classeroom</a></li>
                      </ul>
                  </div>
                  
                  </li>







                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">service</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Downlods</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Connect</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Contact Us</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  -->

  <!--exp-->

  <!--exp-->
</header>
