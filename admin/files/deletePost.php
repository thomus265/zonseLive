<?php 
	require ("../../inc/functions.php");

	$id = $_POST['id'];

	$query = mysqli_query($mysqli,"SELECT * FROM news WHERE news_id=$id");
	while($res = mysqli_fetch_array($query)){
		$img = $res['img'];
		$ico = $res['ico'];
	}
	unlink("../../assets/img/blog/".$img);
	unlink("../../assets/img/blog/ico/".$ico);


	$deletedb = mysqli_query($mysqli,"DELETE FROM news WHERE news_id=$id");
	if(!$deletedb){
		echo "Failure";
	}
	else{
		echo "Deleted Successfuly";
	}
		



?>