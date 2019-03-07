<?php require('../inc/functions.php'); require('../inc/timeago.php');
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment= $_POST['comment'];
	$id = $_POST['id'];

	$query = mysqli_query($mysqli,"INSERT INTO comment(news_id,author,email,description) VALUES('$id','$name','$email','$comment')");
	if(!$query){
		echo "Error occured";
	}
	else{
		echo "success";
	}

?>