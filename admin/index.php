<?php 
	require ("../inc/functions.php");
	require("assets.php");
?>



<div class="container-fluid" style="min-height: 85vh">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1 class="light">Welcome <?php echo $username ?></h1>
            </center>
        </div>
    </div>

        <div class="uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid="masonry: false">
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">News Post</h3>
                    <?php 
                        $postCount=0;
                        $qr=mysqli_query($mysqli,"SELECT * FROM news");
                        while($res=mysqli_fetch_array($qr)){
                            $postCount++;
                        }
                    ?>
                    <p><?php echo'<strong>'.$postCount.' </strong>' ?> Posts</p>
                    <a href="blog.php" class="btn btn-primary">Go to page</a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">Zonse Music</h3>
                    <?php
                        $qr = mysqli_query($mysqli,"SELECT * FROM music");
                        $musicCount=0;
                        while($res=mysqli_fetch_array($qr)){
                            $musicCount++;
                        }
                     ?>
                    <p><?php echo $musicCount ?> Music files</p>
                    <a href="allmusic.php" class="btn btn-primary">Go to page</a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-secondary uk-card-body">
                    <h3 class="uk-card-title">Zonse Tv</h3>
                    <?php 
                        $showCount=0;
                        $videoCount=0;
                        $qr=mysqli_query($mysqli,"SELECT * FROM shows");
                        while($res=mysqli_fetch_array($qr)){
                            $showCount++;
                        }
                        $qr=mysqli_query($mysqli,"SELECT * FROM videos");
                        while($res=mysqli_fetch_array($qr)){
                            $videoCount++;
                        }
                    ?>
                    <p><strong><?php echo $videoCount ?></strong> Videos | <strong><?php echo $showCount ?></strong> shows</p>
                    <a href="ztv.php" class="btn btn-primary">Go to page</a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">Music Submissions</h3>
                    <?php 
                        $postCount=0;
                        $qr=mysqli_query($mysqli,"SELECT * FROM submissions");
                        while($res=mysqli_fetch_array($qr)){
                            $postCount++;
                        }
                    ?>
                    <p><?php echo'<strong>'.$postCount.' </strong>' ?> Posts</p>
                    <a href="submissions.php" class="btn btn-primary">Go to page</a>
                </div>
            </div>
        </div>
</div>
	

<script type="text/javascript">



/**
	$("#add_Video").submit(function(e){
		e.preventDefault();
		var vidt = $("#vidT").val();
		var vid = $("#vid").val();
		var show = $("#show").val();

		if(vidt=="" || vid==""|| show==""){
			alert("fill in all");
		}
		else{
			$.ajax({

                url: "files/addVid.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                	$("#loader").show();

                	$("#progressDivId").css("display", "block");
                    var percentValue = '0%';

                    $('#progressBar').width(percentValue);
                    $('#percent').html(percentValue);
                },
                complete: function(){
                	$("#loader").hide();
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    var percentValue = percentComplete + '%';
                    $("#progressBar").animate({
                        width: '' + percentValue + ''
                    }, {
                        duration: 1000,
                        easing: "linear",
                        step: function (x) {
                        percentText = Math.round(x * 100 / percentComplete);
                            $("#percent").text(percentText + "%");
                        if(percentText == "100") {
                            $(".progress-bar").fadeOut(400).hide();
                            $(".progress").fadeOut(400).hide();
                               $("#targetLayer").fadeIn(400).show();

                        }
                        }
                    });
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
	**/
	$(document).ready(function () {
    $('#ikani').click(function () {
    	    $('#add_Video').ajaxForm({
    	        target: '#outputImage',
    	        url: 'files/addVid.php',
    	        beforeSubmit: function () {
    	        	  $("#outputImage").hide();
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

    	            }
    	            else{  
    	               	$("#outputImage").show();
        	            	$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
        	            	$("#progressBar").stop();
    	            }
    	        }
    	    });
    });
});
	


	

</script>
</html>