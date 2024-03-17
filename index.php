<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/wanderlust" rel="stylesheet">
                
</head>
<body>
<h1>Welcome to Alaska</h1>
<div class="container">
    <div class="centered">
        <?php if (isset($user)): ?>
            <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
            <a href="logout.php"><button>Log out</button></a>
        <?php else: ?>
            <a href="login.php"><button>Log in</button></a><a href="signup.html"><button>Sign up</button></a>
        <?php endif; ?>
    </div>
</div>
<iframe src="https://www.youtube.com/embed/QriB1k4lwh8" frameborder="0"></iframe>
<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="assets/eagle.jpg" alt="an image of a flying eagle"></div>
    <div class="swiper-slide"><img src="assets/dogs.jpg" alt="an image of dogs sitting on snow" srcset=""></div>
    <div class="swiper-slide"><img src="assets/anchorage.jpg" alt="an image of the city of anchorage"></div>
    <div class="swiper-slide"><img src="assets/green.jpg" alt="an image of a green field in alaska"></div>
    <div class="swiper-slide"><img src="assets/mountains.jpg" alt="an image of mountains in alaska"></div>
    <div class="swiper-slide"><img src="assets/lake.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/road.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/river3.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/plane.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/river2.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/orcas.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/river.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/grizzly.jpg" alt="an image of a lake in alaska"></div>
    <div class="swiper-slide"><img src="assets/clouds.jpg" alt="an image of a lake in alaska"></div>
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->


  <!-- If we need scrollbar -->
</div>
<script src="js/script.js"></script>  
</body>
</html>