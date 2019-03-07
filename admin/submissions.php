<?php
    require ("../inc/functions.php");
    require ("../inc/timeago.php");
    require("assets.php");
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="uk-table uk-table-striped">
			    <thead>
			        <tr>
			            <th>Artist</th>
			            <th>Song Name</th>
			            <th>Song Art</th>
			            <th>Song File</th>
			            <th>Uploaded</th>
			            <th>Review</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php 
			    		$q= mysqli_query($mysqli,"SELECT * FROM submissions WHERE reviewed=0");
			    		while($res = mysqli_fetch_array($q)){
			    	 ?>
			        <tr>
			            <td> <?php echo $res['artist']; ?> </td>
			            <td> <?php echo $res['title']; ?> </td>
			            <td> <a uk-tooltip="click to download" href="../assets/submissions/art/<?php echo $res['art'] ?>"><img width="50px" src="../assets/submissions/art/<?php echo $res['art'] ?>"></a> </td>
			            <td> <a href="../assets/submissions/<?php echo $res['song']; ?>" uk-icon="icon: download; ratio:2"></a>  </td>
			            <td><?php echo conv($res['posted']) ?></td>
			            <td><a href="javascript: reviewed(<?php echo $res['sub_id'] ?>)" class="btn btn-primary">Comfirm Review</a></td>
			        </tr>
			        <?php
			    }
			    ?>
			    </tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function reviewed(id){
		$.ajax({
              url: "files/addreview.php",
          type: "POST",
          data:  {id:id,},
          success: function(data)
            {
            	location.reload();
              
          },
            error: function() 
            {
              alert("data");
            }           
         });
	}
</script>
