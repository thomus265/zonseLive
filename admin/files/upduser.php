<?php
	require ("../../inc/functions.php");

	$name = $_POST['username'];
	$mail = $_POST['mail'];
	$oldImg = $_POST['old'];
	$pass = $_POST['pass'];
	$pass = md5($pass);

    $uploadfile = $_FILES["img"]["tmp_name"];

    $id= $_POST['id'];

    if($uploadfile==""){
    	$q=mysqli_query($mysqli,"UPDATE `users` SET `userName` = '$name', `email` = '$mail', `password` = '$pass' WHERE `users`.`user_id` = '$id'");
		echo 2;
    }
    else{
    	$folderPath = "../../assets/img/user/";
    
	    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
	        echo "error";
	        exit();
	    }
	    function getRand($len) {
	        $characters = "45!2*&#(+678a9efghi!2*&#(+ijklm5-678o0123!#*&#))(+456789/pqrstUVwxyzabcD01JKL/";
	        $string = "";
	        for ($i = 0; $i < $len; $i++) 
	            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
	        return $string;
	    }
	    $rand = getRand(3);
	    $temp = explode(".", $_FILES["img"]["name"]);
		$iconame=$name.$rand.'.'.end($temp);
		move_uploaded_file($_FILES["img"]["tmp_name"], $folderPath . $iconame);
		$q=mysqli_query($mysqli,"UPDATE `users` SET `userName` = '$name', `email` = '$mail', `password` = '$pass', `img` = '$iconame' WHERE `users`.`user_id` = '$id'");
    	echo 3;
    }
	
		




?>