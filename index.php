<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: status.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Room</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <section>
        <!--navigation------------------------->
        <nav>
        <!--logo-->
        <a href="index.php" class="logo">Art Room</a>
        <!--menu-->
        <ul>
        <li><a href="form-login.php">Login</a></li>
        </ul>
        <!--bars--------------->
        <div class="toggle"></div>
        
        </nav>
      </section>
      <!-- Content -->
      <div class="text-container">
        <p>Welcome To</p>
        <p>Art Room</p>
        <p>Platform sharing untuk para pecinta seni lukis di Indonesia.</p>
    </div>
    <div class="about-container">
        <!--img-->
            <img class="gambar" src="profil/art.jpg"/>
        <!--about-me-text-->
            <div class="about-text">
            <p>About Art Room</p>
            <p>Platform Sharing Dunia Seni</p>
            <p>Art Room adalah platform untuk para pegiat seni terkhususnya pelukis atau pecinta karya seni lukis berbagi ilmu atau mengposting karyanya supaya dapat dilihat oleh dunia luar.</p>
            </div>
        </div>
      
    
</body>
</html>