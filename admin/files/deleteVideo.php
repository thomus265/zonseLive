<?php 
	require ("../../inc/functions.php");

	$id = $_POST['id'];

	$qr = mysqli_query($mysqli,"SELECT * FROM videos WHERE v_id = $id");
	while($res=mysqli_fetch_array($qr)){
		$file = $res['v_file'];
		$snap = $res['snapshot'];
	}
	$deleteVideoFile = unlink("../../assets/video/".$file);
	$deleteSnapshotFile = unlink("../../assets/video/snapshots/".$snap);
	$deleteVideosDb = mysqli_query($mysqli,"DELETE FROM videos WHERE v_id=$id");
	if(!$deleteVideosDb){
		echo "Error Occured";
	}
	else {
		echo "Deleted Successfuly";
	}
	
?>