<?php 
	require ("../../inc/functions.php");

	$id = $_POST['id'];

	$query = mysqli_query($mysqli,"SELECT * FROM shows WHERE s_id=$id");
	while($res = mysqli_fetch_array($query)){
		$shwImg = $res['s_img'];
	}
	unlink("../../assets/img/shows/".$shwImg);

	$query = mysqli_query($mysqli,"SELECT * FROM videos WHERE s_id=$id");
	while($res = mysqli_fetch_array($query)){
		unink("../../assets/video/".$res['v_file']);
		unlink("../../assets/video/snapshots/".$res['snapshot']);
	}
	$deleteVideos = mysqli_query($mysqli,"DELETE FROM videos WHERE s_id=$id");
	$deleteShow = mysqli_query($mysqli,"DELETE FROM shows WHERE s_id=$id");
	if(!$deleteShow){
		echo "Error Encountered";
	}
	else{
		echo "Deleted Successfuly";
	}
		



?>