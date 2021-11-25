<?php
session_start();
if(isset($_SESSION['admin'])){
    header("Location: index.php");
}
include('register_validasi.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/register.css">

</head>
<body>
    <!-- form register -->
    <div class="container">
        <fieldset>
        <h3 class="logo">Register Admin</h3>
        <span></span>
        <h4 class="logo">Buat akun Baru</h4>
        <form action="form-register.php" method="post" >
            <label for="nama">Nama</label>
            <?php echo '<div class="warna_huruf">' . $errnama . "</div>" ?>
            <div>
                <input type="text" class="form-input" name="nama" value="<?php if(isset($_POST['nama'])) echo htmlspecialchars($_POST['nama'])?>">
            </div>
            <label for="email">E-Mail</label>
            <?php echo '<div class="warna_huruf">' . $erremail . "</div>" ?>
            <div>
                <input type="text" class="form-input" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
            </div>
            <label for="telp">Alamat</label>
            <?php echo '<div class="warna_huruf">' . $erralamat . "</div>" ?>
            <div>
                <input type="text" class="form-input" name="alamat" value="<?php if(isset($_POST['alamat'])) echo htmlspecialchars($_POST['alamat'])?>">
            </div>
            <label for="telp">Nomor HP</label>
            <?php echo '<div class="warna_huruf">' . $errphone . "</div>" ?>
            <div>
                <input type="text" class="form-input" name="no_hp" value="<?php if(isset($_POST['no_hp'])) echo htmlspecialchars($_POST['no_hp'])?>">
            </div>
            <label for="telp">Tempat Lahir</label>
            <?php echo '<div class="warna_huruf">' . $errtempat . "</div>" ?>
            <div>
                <input type="text" class="form-input" name="tempat_lahir" value="<?php if(isset($_POST['tempat_lahir'])) echo htmlspecialchars($_POST['tempat_lahir'])?>">
            </div>
            <label for="tanggal-lahir">Tanggal lahir</label>
            <?php echo '<div class="warna_huruf">' . $errtgl . "</div>" ?>
            <div>
                <input type="date" class="form-input" name="tgl_lahir" value="<?php if(isset($_POST['tgl_lahir'])) echo htmlspecialchars($_POST['tgl_lahir'])?>"> 
            </div>
            <label for="tanggal-lahir">Upload Foto</label>
            <?php echo '<div class="warna_huruf">' . $errgambar . "</div>" ?>
            <div>
                <input type="file" name="photos" class="form-input">
            </div>
            <label for="password">Password</label>
            <?php echo '<div class="warna_huruf">' . $errpassword . "</div>" ?>
            <div>
                <input type="password" class="form-input" name="password">
            </div>
            <label for="password1">Konfirmasi Password</label>
            <?php echo '<div class="warna_huruf">' . $errpassword . "</div>" ?>
            <div>
                <input type="password" class="form-input" name="password1">
            </div>
            <br>
            <input type="hidden" name="level" value="admin">
            <button type="submit" name="submit" class="daftar">Daftar</button>
            <div class="atau">
                <span class="span1"></span>
                <span class="span2"></span>
                <p> atau </p>
                <span class="span2"></span>
                <span class="span1"></span>
            </div>
            <input type="button" class="Back-Login" onclick="location.href='form-login.php'" value="Back to Login" />
            
        </form>
        </fieldset>
    </div>
</body>
</html>