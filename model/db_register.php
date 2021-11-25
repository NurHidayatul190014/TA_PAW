<?php
    $namaFile = $_FILES["photos"]["name"];
    $ukuranFile = $_FILES["photos"]["size"];
    $error = $_FILES["photos"]["error"];
    $tempname = $_FILES["photos"]["tmp_name"];
        move_uploaded_file($tempname, "profil/". $namaFile);

    // enkripsi password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //database
    include("./koneksiPDO.php");
    $statement = $koneksi->prepare("INSERT INTO user (nama, email, alamat, no_hp, tgl_lahir, tempat_lahir, photos, level, password) VALUEs (:nama, :email, :alamat, :no_hp, :tgl_lahir, :tempat_lahir, :photos, :level, :password)");
    $statement->bindValue(':nama', $_POST['nama']);
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':alamat', $_POST['alamat']);
    $statement->bindValue(':no_hp', $_POST['no_hp']);
    $statement->bindValue(':tgl_lahir', $_POST['tgl_lahir']);
    $statement->bindValue(':tempat_lahir', $_POST['tempat_lahir']);
    $statement->bindValue(':photos', $namaFile);
    $statement->bindValue(':level','user');
    $statement->bindValue(':password', $password);
    $statement->execute();

    // alert message dan direct ke form-login
    echo "<script>alert('registrasi sukses !!');";
    echo "document.location.href = './form-login.php';";
    echo "</script>";
    
?>