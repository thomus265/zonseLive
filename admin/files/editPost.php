<?php
	require ("../../inc/functions.php");

	$title=$_POST['title'];
	$author=$_POST['author'];
	$post=$_POST['post'];
	$oldImg=$_POST['old-img'];
	$oldIco=$_POST['old-ico'];

    $uploadfile = $_FILES["ico"]["tmp_name"];
    $file = $_FILES["img"]["tmp_name"];

    $id= $_POST['id'];


    

	


	if($uploadfile=="" && $file==""){
		$q=mysqli_query($mysqli,"UPDATE news SET title='$title', author='$author', ico='$oldIco', img='$oldImg', news='$post' WHERE news_id='$id'");
		if (!$q) {
			echo "1";
		}
		else{
			echo "done";
		}
	}
	else if($uploadfile==""){
		$folderPath = "../../assets/img/blog/ico/";
    
	    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
	        echo "error";
	        exit();
	    }
	    $temp = explode(".", $_FILES["ico"]["name"]);
		$iconame=$title.'.'.end($temp);
		move_uploaded_file($_FILES["ico"]["tmp_name"], $folderPath . $iconame);
		$q=mysqli_query($mysqli,"UPDATE news SET title='$title', author='$author', ico='$iconame', img='$oldImg',news='$post' WHERE news_id='$id'");
		echo "2";
	}
	else if($file==""){

		    $path = "../../assets/img/blog/";
		    
		    if (! is_writable($path) || ! is_dir($path)) {
		        echo "error";
		        exit();
		    }

			$ext = explode(".", $_FILES["img"]["name"]);
			$imgname=$title.'.'.end($ext);

			if(move_uploaded_file($_FILES["img"]["tmp_name"], $path . $imgname)){
				 $q=mysqli_query($mysqli,"UPDATE news SET title='$title', author='$author', ico='$oldIco', img='$imgname',news='$post' WHERE news_id='$id'");

				 echo "3";
			}

		
	}
	else{
		$folderPath = "../../assets/img/blog/ico/";
    
	    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
	        echo "error";
	        exit();
	    }
	    $temp = explode(".", $_FILES["ico"]["name"]);
		$iconame=$title.'.'.end($temp);
		if (move_uploaded_file($_FILES["ico"]["tmp_name"], $folderPath . $iconame)) {

    		
		    $path = "../../assets/img/blog/";
		    
		    if (! is_writable($path) || ! is_dir($path)) {
		        echo "error";
		        exit();
		    }

			$ext = explode(".", $_FILES["img"]["name"]);
			$imgname=$title.'.'.end($ext);

			if(move_uploaded_file($_FILES["img"]["tmp_name"], $path . $imgname)){
				 $q=mysqli_query($mysqli,"UPDATE news SET title='$title', author='$author', ico='$iconame', img='$imgname',news='$post' WHERE news_id='$id'");

				 echo "4";
			}

		}
	}
        exit();



?>