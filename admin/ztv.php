<?php 
	require ("../inc/functions.php");
	require("assets.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h2>All Shows</h2>
			<a href="#" class="btn btn-primary uk-margin-small-right" uk-toggle="target: #addShowModal" >Add Show</a>
			<a href="#" class="btn btn-danger uk-margin-small-right" uk-toggle="target: #addYT"> <i uk-icon="icon: youtube"></i> Add Youtube Video</a>
			<ol id="showsList" class="uk-list uk-list-divider">
				<?php 
					$query = mysqli_query($mysqli,"SELECT * FROM shows");
					while($res=mysqli_fetch_array($query)){
						?>
						<li><a href="show.php?sid=<?php echo $res['s_id']; ?>"><?php echo $res['s_title'] ?></a></li>
						<?php
					}
				 ?>
			</ol>
		</div>
		<div class="col-md-8">
			<h2>All Video</h2>
			<div class="row" style="margin-top: 6%">
					<?php
						$shw = mysqli_query($mysqli,"SELECT * FROM shows");
						while($res = mysqli_fetch_array($shw)){
							echo '<div class="col-md-12"> <h3> '.$res['s_title'].' </h3> </div>';
							$sid=$res['s_id'];
							$qr = mysqli_query($mysqli,"SELECT * FROM videos WHERE s_id='$sid' ");
							while($rs=mysqli_fetch_array($qr)){
							?>
							<div class="col-md-4">
								<img src="../assets/video/snapshots/<?php echo $rs['snapshot'] ?>">
								<p><?php echo $rs['v_title'] ?></p>
								
							</div>
							<?php
						}
						}
						$qr = mysqli_query($mysqli,"SELECT * FROM videos");
						
					 ?>
				</div>
		</div>
	</div>
</div>





<!-- This is the modal with the default close button -->
<div id="addShowModal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Add Show</h2>
        <div>
        	<form id="add_Show" enctype="multipart/form-data" method="post">
        		<div class="form-group col-md-12">
        			<label for="name" class="col-form-label">Show Name</label>
        			<input class="form-control" type="text" name="name" id="name" placeholder="Show Name">
        		</div>
        		<div class="form-group col-md-12">
        			<label for="file" class="col-form-label">Show Image</label>
        			<input class="form-control" type="file" name="uploadImage" id="img">
        		</div>

				<button type="submit" class="btn btn-primary col-md-12" id="subBtn">Submit</button>
			</form>

		
        </div>
    </div>
</div>

<div id="addYT" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Add youtube Video</h2>
        <div>
        	<form id="add_YT" enctype="multipart/form-data" method="post">
        		<div class="form-group col-md-12">
        			<label for="youtube" class="col-form-label">Paste the Youtube embed Iframe</label>
        			<input class="form-control" type="text" name="youtube" id="youtube" placeholder="Youtube Link">
        		</div>

				<button type="submit" class="btn btn-primary col-md-12" id="subBtn2">Submit</button>
			</form>

		
        </div>
    </div>
</div>


<script type="text/javascript">
	
	$("#add_Show").submit(function(e){
		e.preventDefault();
		var name = $("#name").val();
		var img = $("#img").val();

		if(img=="" || name==""){
			$("#subBtn").removeClass('btn-primary');
				$("#subBtn").addClass('btn-warning');
				$("#subBtn").html('Please Fill in all fields');
			setTimeout(function(){
				$("#subBtn").removeClass('btn-warning');
				$("#subBtn").addClass('btn-primary');
				$("#subBtn").html('submit');
			},3000);
		}
		else{
			$.ajax({

                url: "files/addShow.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                	$("#subBtn").removeClass('btn-primary');
					$("#subBtn").addClass('btn-default');
                	$("#subBtn").html('<img src="../assets/img/loader.gif" width="25px">');
                },
                complete: function(){
                	$("#subBtn").removeClass('btn-default');
					$("#subBtn").addClass('btn-success');
                	$("#subBtn").html('Complete');
                	setTimeout(function(){
                		UIkit.modal('#addShowModal').hide();
                		$("#showsList").load("files/shows.php");
                	},1000)
                },
                success: function(xhr)
                {
                	$("#output").html(xhr);
                },
                error: function(){

                }
            });

		}
	});


	$("#add_YT").submit(function(e){
		e.preventDefault();
		var youtube = $("#youtube").val();

		if(youtube=="" ){
			$("#subBtn2").removeClass('btn-primary');
				$("#subBtn2").addClass('btn-warning');
				$("#subBtn2").html('Please Fill in all fields');
			setTimeout(function(){
				$("#subBtn2").removeClass('btn-warning');
				$("#subBtn2").addClass('btn-primary');
				$("#subBtn2").html('submit');
			},3000);
		}
		else{
			$.ajax({

                url: "files/addYT.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                	$("#subBtn2").removeClass('btn-primary');
					$("#subBtn2").addClass('btn-default');
                	$("#subBtn2").html('<img src="../assets/img/loader.gif" width="25px">');
                },
                complete: function(){
                	$("#subBtn2").removeClass('btn-default');
					$("#subBtn2").addClass('btn-success');
                	$("#subBtn2").html('Complete');
                	setTimeout(function(){
                		UIkit.modal('#add_YT').hide();
                		location.reload();
                	},1000)
                	


                },
                success: function(xhr)
                {
                	$("#output").html(xhr);
                },
                error: function(){

                }
            });

		}
	});
</script>