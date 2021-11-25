<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: form-login.php");
    exit;
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
                    <a href="setting.php">Settings</a>
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
                    <h3>Users</h3>
                </li>
            </ul>
        </div>
        <div class="main">
            <?php
                try {
                    $koneksi = new PDO('mysql:host=localhost;dbname=socmed', "root", "");
                    echo "koneksi berhasil";
                } catch (PDOException $mesaage) {
                    echo "koneksi gagal" . $message->getMessage();
                }

                $sql = "select * from user";
                $query = $koneksi->query($sql);
            ?>
                <table>
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Alamat</td>
                            <td>No Hp</td>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>Foto</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                            while ($baris = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $baris['nama'] . "</td>";
                                echo "<td>" . $baris['email'] . "</td>";
                                echo "<td>" . $baris['alamat'] . "</td>";
                                echo "<td>" . $baris['no_hp'] . "</td>";
                                echo "<td>" . $baris['tempat_lahir'] . ",". $baris['tgl_lahir'] ."</td>";
                                echo "<td><img src='../image/".$baris['photos']."' width='100' height='100'></td>";
                                echo "<td><a href='#' class='btn-hapus'>Hapus</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

    </div>
                                       
</body>
</html>