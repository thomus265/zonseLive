<?php
 require ("../../inc/functions.php");

 $link= $_POST['youtube'];

 $query = mysqli_query($mysqli,"INSERT INTO youtube(link) VALUES('$link')");
 if(!$query){
 	echo "Error";
 }
 else{
 	echo "Success";
 }
?>