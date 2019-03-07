<?php
	require ("../../inc/functions.php");

	$name=$_POST['name'];
	$title=$_POST['name'];

    $uploadfile = $_FILES["uploadImage"]["tmp_name"];
    $folderPath = "../../assets/img/shows/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }
	$path2="../assets/img/shows/";
	$temp = explode(".", $_FILES["uploadImage"]["name"]);
	$nwname=$name.'.'.end($temp);
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderPath . $nwname)) {
        $name = $_FILES["uploadImage"]["name"];
       $q=mysqli_query($mysqli,"INSERT INTO shows(s_title,s_img) VALUES('$title', '$nwname')");
        echo '<img src="' . $path2 . "" . $nwname . '" style="border-radius:100%; width:25%"> <br/> ';
        
        exit();
    }



?>