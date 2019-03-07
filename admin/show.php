<?php 
	require ("../inc/functions.php");
	require("assets.php");

	$sid = $_GET['sid'];
	$query = mysqli_query($mysqli,"SELECT * FROM shows WHERE s_id='$sid'");
	while($res=mysqli_fetch_array($query)){
		$show = $res['s_title'];
		$image = $res['s_img'];
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<center> 
				<img src="../assets/img/shows/<?php echo $image ?> " style="border-radius: 100%; width: 100px;"> <h3 class="uk-margin-remove-top"><?php echo $show ?></h3>
                <a href="javascript: deleteShow(<?php echo $sid ?>)" class="btn btn-danger">Delete Show</a>
			</center>
		</div>
	</div>
	<div class="row" style="margin-top: 5%">
		<div class="col-md-8">
			<div class="container-fluid" >
				<h3 class="uk-position-left">Videos</h3>
				<div class="row" style="margin-top: 6%">
					<?php
						$qr = mysqli_query($mysqli,"SELECT * FROM videos WHERE s_id = '$sid'");
 
						while($rs=mysqli_fetch_array($qr)){
							?>
							<div class="col-md-4">
								<img src="../assets/video/snapshots/<?php echo $rs['snapshot'] ?>">
								<p><?php echo $rs['v_title'] ?>  |  <a href="javascript: deleteVideo(<?php echo $rs['v_id'] ?>)" class="btn btn-danger">Delete</a></p>

								
							</div>

							<?php


                        }
						
                        
					 ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h4>Add Video</h4>

				<form id="add_Video" enctype="multipart/form-data" method="post">
					<div class="form-group col-md-12">
						<label for="title" class="col-form-label">Video Title</label>
						<input class="form-control" type="text" name="title" id="vidT" placeholder="video title">
					</div>
					<div class="form-group col-md-12"  >
                        <div uk-form-custom="target: true">
                        <label for="file">Select Video</label> <br/>
                        <input type="file" name="uploadvideo" id="file" class="form-control" accept="video/mp4">
                        <input class="uk-input uk-form-width-large" type="text" placeholder="Select Video file" disabled>
                        <p class="uk-margin-remove-top uk-text-meta light">Files allowed : mp4</p>
                    </div>
						
					</div>
					<div class="form-group">
						 <input type="text" name="show" value="<?php echo $sid ?>" hidden>
					</div>

					<button value="Submit" class="btn btn-primary col-md-12" id="ikani">Upload</button>
				</form>
				<div class='progress' id="progressDivId">
		            <div class='progress-bar btn-primary' id='progressBar'></div>
		            <div class='percent' id='percent'>0%</div>
		        </div>
		</div>
	</div>
</div>

<script type="text/javascript">

    function deleteShow(id){
        $.ajax({
              url: "files/deleteShow.php",
          type: "POST",
          data:  {id:id,},
          success: function(data)
            {
                alert(data);
                window.location.href='ztv.php';
          },
            error: function() 
            {
              alert("data");
            }           
         });
    }

    function deleteVideo(id){
        $.ajax({
            url: "files/deleteVideo.php",
          type: "POST",
          data:  {id:id,},
          success: function(data)
            {
                alert(data);
               location.reload();
            },
            error: function() 
            {
              alert("data");
            }           
         });
    }
	$(document).ready(function () {
    $('#ikani').click(function () {
    	var title = $("#title").val();
    	var file = $("#file").val();

    	if(title=="" || file==""){
    		alert();
    	}
    	else{
    		$('#add_Video').ajaxForm({
    	        target: '#outputImage',
    	        url: 'files/addVid.php',
    	        beforeSubmit: function () {
    	        	  $("#ikani").hide();
    	        	   if($("#uploadImage").val() == "") {
    	        		   $("#outputImage").show();
    	        		   $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
                    return false; 
                }
    	            $("#progressDivId").css("display", "block");
    	            var percentValue = '0%';

    	            $('#progressBar').width(percentValue);
    	            $('#percent').html(percentValue);
    	        },
    	        uploadProgress: function (event, position, total, percentComplete) {

    	            var percentValue = percentComplete + '%';
    	            $("#progressBar").animate({
    	                width: '' + percentValue + ''
    	            }, {
    	                duration: 0,
    	                easing: "linear",
    	                step: function (x) {
                        percentText = Math.round(x * 100 / percentComplete);
    	                    $("#percent").text(percentText + "%");
                        if(percentText == "100") {
                        	   $("#outputImage").show();
                        }
    	                }
    	            });
    	        },
    	        error: function (response, status, e) {
    	            alert('Oops something went.');
    	        },
    	        
    	        complete: function (xhr) {
    	            if (xhr.responseText && xhr.responseText != "error")
    	            {
    	            	  $("#outputImage").html(xhr.responseText);
    	            	  $("#output").html(xhr.responseText);
    	            	  $("#ikani").removeClass('btn-primary');
	    	            	    $("#ikani").addClass('btn-success');
	    	            	    $("#ikani").html('Upload Complete')
    	            	  setTimeout(function(){
	    	            	  	$("#ikani").addClass('btn-primary');
	    	            	    $("#ikani").removeClass('btn-success');
	    	            	    $("#ikani").html('Upload');
    	            		},1000);
                          location.reload();
    	            	  $("#ikani").show();
    	            	  $("#progressDivId").hide();

    	            }
    	            else{  
    	               	$("#outputImage").show();
        	            	$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
        	            	$("#progressBar").stop();
    	            }
    	        }
    	    });
    	}

    	    
    });
});
</script>