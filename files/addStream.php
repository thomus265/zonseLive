<?php
require('../inc/functions.php'); 

$id = $_POST['id'];
$q=mysqli_query($mysqli,"SELECT * FROM music WHERE music_id='$id'");
while($r=mysqli_fetch_array($q)){
	$streams = $r['streams'];
	$count = $r['count'];
}
$streams =$streams+1;
$count= $count+1;
$update = mysqli_query($mysqli,"UPDATE music SET streams='$streams', count='$count' WHERE music_id='$id'");
if(!$update){
	echo"Error";
}
else{
	echo $streams;
}


?>