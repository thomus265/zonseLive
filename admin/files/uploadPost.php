<?php
	require ("../../inc/functions.php");

	$title=$_POST['title'];
	$author=$_POST['author'];
	$post=$_POST['post'];

    $uploadfile = $_FILES["ico"]["tmp_name"];
    $folderPath = "../../assets/img/blog/ico/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }

	$temp = explode(".", $_FILES["ico"]["name"]);
	$iconame=$title.'.'.end($temp);
    if (move_uploaded_file($_FILES["ico"]["tmp_name"], $folderPath . $iconame)) {

    		$file = $_FILES["img"]["tmp_name"];
		    $path = "../../assets/img/blog/";
		    
		    if (! is_writable($path) || ! is_dir($path)) {
		        echo "error";
		        exit();
		    }

			$ext = explode(".", $_FILES["img"]["name"]);
			$imgname=$title.'.'.end($ext);

			if(move_uploaded_file($_FILES["img"]["tmp_name"], $path . $imgname)){
				 $q=mysqli_query($mysqli,"INSERT INTO news(title,author,ico,img,news) VALUES('$title', '$author','$iconame','$imgname','$post')");

				 echo "done";
			}

        exit();
    }



?>