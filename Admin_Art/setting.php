<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: form-login.php");
    exit;
}
$errnama = $errphone = $erralamat = "";
$valnama = $errphone = $valalamat = "";
$dbc = new PDO('mysql:host=localhost;dbname=socmed','root',''); 
    if (isset($_POST["simpan"])){
        $valid=0;
        if ($_POST["Name"] == ""){
            $errnama = "harus diisi";
            $valnama = "";
        } elseif (!preg_match('/^[a-zA-Z ]*$/', $_POST["Name"])){
            $errnama = "Hanya boleh huruf dan spasi";
            $valnama = "";
        } elseif (strlen($_POST["Name"]) < 6 || strlen($_POST["Name"]) > 20){
            $errnama = "Nama minimal 6 karakter dan maksimal 20 karakter";
            $valnama = "";
        } else {
            $valid++;
            $errnama = "";
            $valnama = $_POST["Name"];
        }

        if($_POST["PhoneNumber"] == ""){
            $errphone = "No telpon harus diisi";
            $valphone = "";
        } elseif (!preg_match( "/^[0-9]*$/", $_POST["PhoneNumber"])){
            $errphone = "No telpon harus berupa angka";
            $valphone = "";
        } elseif (strlen($_POST["PhoneNumber"]) < 8 || strlen($_POST["PhoneNumber"]) > 13){
            $errphone = "No telpon minimal 8 angka dan maksimal 13 angka";
            $valphone = "";
        } else {
            $valid++;
            $errphone = "";
            $valphone = $_POST["PhoneNumber"];
        }


        if ($_POST["alamat"] == ""){
            $erralamat = "harus diisi";
            $valalamat = "";
        } else {
            $erralamat = "";    
            $valalamat = $_POST["alamat"];
            $valid++;

        }



        if($valid == 3){
            $query = $dbc->prepare("UPDATE user SET nama = :nama, no_hp = :phonenumber, alamat = :alamat WHERE id_user = 1");
            $query->bindValue(":nama", $_POST["Name"]);
            $query->bindValue(":phonenumber", $_POST["PhoneNumber"]);
            $query->bindValue(":alamat", $_POST["alamat"]);
            $query->execute();

        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Room</title>

    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    
    <div class="sidebar-nav">
        <div class="logo">
            <a href="#">
                <h1>Art Room</h1>
            </a>
            
        </div>
        <div class="side-nav">
            <ul>
                <li>
                    <span><i class="fas fa-home"></i></span>
                    <a href="index.php">Dashbord</a>
                </li>
                <li>
                    <span><i class="fa fa-user-circle"></i></span>
                    <a href="user.php">Users</a>
                </li>
                <li>
                    <span><i class="fa fa-file-image"></i></span>
                    <a href="photos.php">Photos</a>
                </li>
                <li>
                    <span><i class="fa fa-cog"></i></span>
                    <a href="setting.php">Setting</a>
                </li>
                <li>
                    <span><i class="fa fa-sign-out-alt"></i></span>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main_contant">
        <div class="bread-crumbs">
            <ul>
                <li>
                    <span><i class="fas fa-user-circle"></i></span>
                    <h3>Setting - Edit Profile</h3>
                </li>
            </ul>
        </div>
        <div>
            <?php
                try {
                    $koneksi = new PDO('mysql:host=localhost;dbname=socmed', "root", "");
                    echo " ";
                } catch (PDOException $mesaage) {
                    echo "koneksi gagal" . $message->getMessage();
                }

                $sql = "select * from user WHERE id_user=1";
                $query = $koneksi->query($sql);
                $baris = $query->fetch(PDO::FETCH_ASSOC)
            ?>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="Name" class="input-form" value="<?php echo $baris['nama']; ?>"><br><?php echo $errnama ?>
                    <input type="text" name="PhoneNumber" class="input-form" value="<?php echo $baris['no_hp']; ?>"><br><?php echo $errphone ?>
                    <input type="text" name="alamat" class="input-form" value="<?php echo $baris['alamat']; ?>"><br><?php echo $erralamat ?>
                 
                <input class="btn-simpan" name="simpan" type="submit" value="Simpan">
            </form>
        </div>
    </div>
    
</body>
</html>