<?php
	require ("../../inc/functions.php");

	$artist=$_POST['artist'];
	$title=$_POST['title'];

    $uploadfile = $_FILES["album"]["tmp_name"];
    $folderPath = "../../assets/img/covers/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }

	$temp = explode(".", $_FILES["album"]["name"]);
	$iconame=$title.'.'.end($temp);
    if (move_uploaded_file($_FILES["album"]["tmp_name"], $folderPath . $iconame)) {

    		$file = $_FILES["song"]["tmp_name"];
		    $path = "../../assets/music/";
		    
		    if (! is_writable($path) || ! is_dir($path)) {
		        echo "error";
		        exit();
		    }

			$ext = explode(".", $_FILES["song"]["name"]);
			$imgname=$title.'.'.end($ext);

			if(move_uploaded_file($_FILES["song"]["tmp_name"], $path . $imgname)){
				 $q=mysqli_query($mysqli,"INSERT INTO `music` (`music_id`, `artist`, `title`, `art`, `song`, `downloads`, `streams`, `count`, `uploaded`) VALUES (NULL, '$artist', '$title', '$iconame', '$imgname','0', '0', '0', CURRENT_TIMESTAMP)");

				 echo "done";
			}
			else{
				echo "error";
			}

        exit();
    }



?>