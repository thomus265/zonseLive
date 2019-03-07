<?php

$q  =  mysqli_query($mysqli,"SELECT * FROM music");
while($res=mysqli_fetch_array($q)){
	echo "<title>".$res['song']."</title>";
}


?>