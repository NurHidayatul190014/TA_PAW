<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: form-login.php");
		exit;
	}
	include "koneksiPDO.php";
	
?>
<!DOCTYPE html>

<html lang="id">
<head>
	<link rel="stylesheet" type="text/css" href="css/profileStatus.css">
	<meta charset="utf-8">
	<title>Status</title>
	<link rel="stylesheet" href="css/header.css">
</head>
<body>
    <!-- header -->
    <?php
		include('header.inc');
	?>
    <!-- status -->
	<div align= "center" class="container">
		<div align="center" class="kotak" >
			<fieldset>
			<div align="center" class="contain">
	

				<div class="button2">
					<button onclick="window.location.href='post.php' " class="btn2">
				<?php
			   		include('koneksiPDO.php');			
					$statement = $koneksi->prepare("SELECT photos, nama FROM user WHERE(id_user = :id_user)");
					$statement->bindValue(':id_user', $_SESSION['id_user']);
					$statement->execute();
					foreach ($statement as $row){
						$photos=$row['photos'];
						$nama=$row['nama'];
					}
					echo '<img src="profil/'.$photos.'" alt="photo" </a>';
				?>

				Buat Status</button>
				</div>

			
			</div>
			<?php
				include('koneksiPDO.php');
				$status = $koneksi->prepare("SELECT * FROM photos");
				$status->execute();
				foreach ($status as $row ) {
					// cari profil user dari post	
					$id_user = $row['id_user'];
					$cari_profil = $koneksi->prepare("SELECT nama, photos FROM user WHERE(id_user = :id_user)");
					$cari_profil->bindValue(':id_user', $id_user);
					$cari_profil->execute();
					foreach($cari_profil as $list){
						$nama_user = $list['nama'];
						$foto_user = $list['photos'];
					}
					// data post
					$photo=$row['nama_photos'];
					$keterangan=$row['keterangan'];		
					echo'<div align="center" class="kotak" >
					<fieldset >
						<div align="left" class="status">
							<table>
							<div class="row">
								<td> ';
							
							echo '<img src="profil/'.$foto_user.'" alt="photo" </a>';
							
						echo'</td>
							</div>
							<div  class="colom">
								<td><h3>'; echo $nama_user; echo '</h3></td>
							</div>
							</table>
							<div>';
								echo'<p>'; echo $keterangan; echo'</p>
							</div>
							<div align="center">';
								echo '<img  class="img2" src="upload/'.$photo.'" alt="photo">';
							echo'</div>
						</div>
						</fieldset>
						</div>';

							}
				?>
			</fieldset>
		</div>
	</div>
</body>
</html>