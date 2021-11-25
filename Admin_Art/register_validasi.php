<?php
// ini validasi
    $errnama = $erremail =  $errphone = $errtempat = $errtgl = $erralamat = $errpassword = $errgambar = "";
	if (isset($_POST["submit"])){
		$valid=0;
		
		if ($_POST["nama"] == ""){
	        $errnama = "*nama harus diisi";
	    } elseif (!preg_match('/^[a-zA-Z ]*$/', $_POST["nama"])){ // validasi dengan alfabet
	        $errnama = "*Hanya boleh huruf dan spasi";
	    } else {
	        $valid++;
	        $errnama = "";
	    }

		
		if ($_POST["email"] == ""){
        	$erremail = "*tempat lahir harus diisi";
        } elseif (!preg_match('/^[a-zA-Z0-9@.]*$/', $_POST["email"])){ // validasi dengan alfanumerik
	        $erremail = "*Hanya boleh huruf";
	    } else {
            $erremail = "";
            $valid++;
    
        }

		
	    if($_POST["no_hp"] == ""){
	        $errphone = "*No telpon harus diisi";
	    } elseif (!preg_match( "/^[0-9]*$/", $_POST["no_hp"])){ // validasi dengan numerik
	        $errphone = "*No telpon harus berupa angka";
	    } elseif (strlen($_POST["no_hp"]) < 8 || strlen($_POST["no_hp"]) > 13){ 
	        $errphone = "*No telpon minimal 8 angka dan maksimal 13 angka";
	    } else {
	        $valid++;
	        $errphone = "";
	    }

		
	    if ($_POST["tempat_lahir"] == ""){
        	$errtempat = "*tempat lahir harus diisi";
        } elseif (!preg_match('/^[a-zA-Z]*$/', $_POST["tempat_lahir"])){ // validasi dengan alfabet
	        $errtempat = "*Hanya boleh huruf";
	    } else {
            $errtempat = "";
            $valid++;
    
        }
	    if ($_POST["tgl_lahir"] == ""){
        	$errtgl = "*tanggal lahir harus diisi";
        } else {
            $errtgl = "";
            $valid++;
    
        }


	    if ($_POST["alamat"] == ""){
        	$erralamat = "*alamat harus diisi";
        } else {
            $erralamat = "";    
            $valid++;

        }


        if($_POST["password"] == ""){
	        $errpassword = "*password harus diisi";
	    } elseif (strlen($_POST["password"]) < 8 ){
	        $errpassword = "*minimal 8 karakter";
	    } elseif (!preg_match('@[A-Z]@', $_POST["password"]) || !preg_match('@[a-z]@', $_POST["password"]) || !preg_match('@[0-9]@', $_POST["password"])){
	        $errpassword = "*minimal harus ada 1 huruf besar, kecil dan angka ";
	    } elseif($_POST["password"] != $_POST["password1"]){
			$errpassword = "*password tidak sama";
		} else {
	        $valid++;
	        $errpassword = "";
	    }

	    if ($_POST["photos"] == ""){
        	$errgambar = "*gambar harus diupload";
        } else {
            $errgambar = "";
            $valid++;
    
        }

	    if($valid == 8){
	    	include('model/db_register.php');

	    }

	}

?>