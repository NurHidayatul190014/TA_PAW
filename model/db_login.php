<?php
session_start();
use phpDocumentor\Reflection\PseudoTypes\True_;

try{
        // email dan enkripsi password

        $email = $_POST['email'];
        $password = $_POST['password'];
        //database
        include '../koneksiPDO.php';
        $statement = $koneksi->prepare("SELECT * FROM user WHERE(email = :email)");
        $statement->bindValue(':email', $_POST['email']);
        $statement->execute();

        // cek email, apakah ada?
        if( $statement->rowCount() >= 1){

            // cek password
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $row['password'])){
                // alert message dan direct ke dashbord user jika levelnya sesuai
                if($row['level'] == 'user'){
                    $_SESSION['user'] = true;
                    $_SESSION ['id_user'] = $row['id_user'];
                    header("Location: ../status.php");
                    exit;
                }
                // jika levelnya beda, maka akan kembali ke halaman login
                echo "<script>alert('email / password salah !!');";
                echo "document.location.href = '../form-login.php';";
                echo "</script>";
            }
        }

        // jika error
        $error = True;
        if($error == True){
            echo "<script>alert('email / password salah !!');";
            echo "document.location.href = '../form-login.php';";
            echo "</script>";
        }
    }
    

    catch(PDOException $err)
    {
        echo $err->getMessage();
    }
    
    
?>