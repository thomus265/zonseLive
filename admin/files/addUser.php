<?php
	require ("../../inc/functions.php");

	$name = $_POST['username'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$pass = md5($pass);

	$uploadfile = $_FILES["uploadImage"]["tmp_name"];
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
	$temp = explode(".", $_FILES["uploadImage"]["name"]);
	$nwname=$name.$rand.'.'.end($temp);
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $nwname)) {
    	$query= mysqli_query($mysqli,"INSERT INTO users(userName,email,password,img) VALUES('$name','$mail','$pass','$nwname')");
    	echo "done";
    }

?>