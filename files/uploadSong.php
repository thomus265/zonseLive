<?php
	require ("../inc/functions.php");

	$artist=$_POST['artist'];
	$title=$_POST['title'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];

    $uploadfile = $_FILES["album"]["tmp_name"];
    $folderPath = "../assets/submissions/art/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }

	$temp = explode(".", $_FILES["album"]["name"]);
	$iconame=$title.'.'.end($temp);
    if (move_uploaded_file($_FILES["album"]["tmp_name"], $folderPath . $iconame)) {

    		$file = $_FILES["song"]["tmp_name"];
		    $path = "../assets/submissions/";
		    
		    if (! is_writable($path) || ! is_dir($path)) {
		        echo "error";
		        exit();
		    }

			$ext = explode(".", $_FILES["song"]["name"]);
			$imgname=$title.'.'.end($ext);

			if(move_uploaded_file($_FILES["song"]["tmp_name"], $path . $imgname)){
				 
				 $q=mysqli_query($mysqli,"INSERT INTO `submissions` (`sub_id`, `artist`, `title`, `art`, `song`, `reviewed`,`phone`,`email`, `posted`) VALUES (NULL, '$artist', '$title', '$iconame', '$imgname', '0', '$phone','$email', CURRENT_TIMESTAMP)");
				 if(!$q){
				 	echo "Error";
				 }
				 else{
				 	echo "1";
				 }
			}
			else{
				echo "error";
			}

        exit();
    }



?>