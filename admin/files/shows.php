<?php 
require ("../../inc/functions.php");
	$query = mysqli_query($mysqli,"SELECT * FROM shows");
	while($res=mysqli_fetch_array($query)){
		?>
		<li><a href="show.php?sid=<?php echo $res['s_id'] ?>"><?php echo $res['s_title'] ?></a></li>
		<?php
	}
 ?>