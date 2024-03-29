<?php
session_start();
if(isset($_SESSION['admin'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- form login -->
    <div class="container">
        <!-- logo -->
        <h3 class="logo">Login Admin</h3>
        <span></span>
        <h4 class="logo">Silahkan login terlebih dahulu</h4>
        <br>
        <form action="model/db_login.php" method="post">
            <!-- email -->
            <div>
                <label>Email address</label>
                <div>
                    <input class="form-input" type="text" name="email">
                </div>
            </div>
            <!-- password -->
            <div>
                <label>Password</label>
                <div>
                    <input class="form-input" type="password" name="password">
                </div>
            </div>
            <br>
            <button type="submit" class="login">Login</button>
            <div class="atau">
                <span class="span1"></span>
                <span class="span2"></span>
                <p> atau </p>
                <span class="span2"></span>
                <span class="span1"></span>
            </div>
            <input type="button" class="daftar" onclick="location.href='form-register.php'" value="Daftar" />
        </form>
    </div>
</body>
</html>