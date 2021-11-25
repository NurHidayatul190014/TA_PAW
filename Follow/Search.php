<?php
include('koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tb_gambar");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Follow</title>
    <link rel="stylesheet" type="text/css" href="Search.css">
</head>
<body>
    <div class="akun">
        <h3><a href="">Fikih Fastabikul Khoir</a></h3>
    </div>
    <div id="wrapmenu" onclick="togglemenu()">
        <div class="atas">
            <div class="judul">
                <h1>Art Room</h1>
            </div>
        </div>
        <div class="btn-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Beranda</a></li>
                <li><a href="">Search</a></li>
                <li><a href="">Profile</a></li>
                <li><a href="">Setting</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </div>
        <div class="isi">
            <fieldset>
                <legend>Daftar Teman</legend>
                <div class="input">
                    <input type="submit" value="Search" name="submit">
                    <input type="text" name="nama" size="31">
                </div>
                <table class="auto">
                    <?php 
                    $no = 1;
                    while($row = mysqli_fetch_array($query))
                    {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><img src="View_Search.php?id_gambar=<?php echo $row['id_gambar']; ?>" width="100"/></td>
                            <td><?php echo $row['keterangan']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </fieldset>
        </div>
    </div>
    <script src="koneksi.js"></script>   
</body>
</html>