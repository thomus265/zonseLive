<?php 
	require ("../../inc/functions.php");

	$id = $_POST['id'];

	$query = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id=$id");
	while($res = mysqli_fetch_array($query)){
		$img = $res['img'];
	}
	unlink("../../assets/img/user/".$img);


	$deletedb = mysqli_query($mysqli,"DELETE FROM users WHERE user_id=$id");
	if(!$deletedb){
		echo "Failure";
	}
	else{
		echo "Deleted Successfuly";
	}
		



?>