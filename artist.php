<?php require('inc/header.php') ?>
  <script type="text/javascript">
  $(".artist").addClass("active");
  $(".news").removeClass("active");
  $(".top20").removeClass("active");
  $(".ztv").removeClass("active");
  $(".music").removeClass("active");
  $(".home").removeClass("active");
  $(".about").removeClass("active");
</script>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<center>
	          <div id="bannerAd" style="margin-top: 2%">
		          <img src="assets/img/ads/crystal.jpg" width="100%" height="50px">
		        </div>
	        </center>

	        <div style="margin-top: 3%">
	        	<h2>Submit your Music to Zonse Live</h2>
	        	<div>
	        		<form id="musicForm" enctype="multipart/form-data" method="post">
					    <div uk-grid>
					    	<div class="uk-width-1-2@s">
					    		<input type="text" name="artist" id="artist" placeholder="Artist" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<input type="text" name="title" id="title" placeholder="Title" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<input type="email" name="email" id="email" placeholder="Email" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<input type="text" name="phone" id="phone" placeholder="Phone" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<div uk-form-custom="target: true">
						            <input type="file" name="album" id="album" accept="image/*">
						            <input class="uk-input uk-form-width-large" type="text" placeholder="Select Album/Song Art" disabled>
						        </div>
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<div uk-form-custom="target: true">
						            <input type="file" name="song" id="song" accept="audio/*" >
						            <input class="uk-input uk-form-width-large" type="text" placeholder="Select Song MP3 File" disabled>
						        </div>
					    	</div>
					    	<div class="uk-margin">
					    		<button type="submit" class="btn btn-primary" id="ikani">Submit Song</button>
					    	</div>

					    </div>
					    <h5>You can also submit your music by emailing us at <a href="mailto: submit@zonse.live">submit@zonse.live</a></h5>
					</form>
	        	</div>
	        	
	        </div>

	        <div style="margin-top: 3%">
	        	<div id="bannerAd" style="margin-top: 2%">
		          <img src="assets/img/ads/pink.jpg" width="100%" height="50px">
		        </div>
	        </div>


		</div>
		<div class="col-md-3">
			<?php require("inc/side.php"); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#musicForm").submit(function(e){
		e.preventDefault();
		var artist=$("#artist").val();
        var title=$("#title").val();
        var phone=$("#phone").val();
        var email=$("#email").val();
        var album=$("#album").val();
        var song=$("#song").val();
        if(artist=="" || title=="" || album=="" || song=="" || phone=="" || email==""){
        	$("#ikani").removeClass('btn-primary');
				$("#ikani").addClass('btn-warning');
				$("#ikani").html('Please Fill in all fields');
        	setTimeout(function(){
        		$("#ikani").removeClass('btn-warning');
				$("#ikani").addClass('btn-primary');
				$("#ikani").html('Submit Song');
        	},2000);
        }
        else{
        	$.ajax({

                url: "files/uploadSong.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                	$("#ikani").removeClass('btn-primary');
					$("#kani").addClass('btn-default');
                	$("#ikani").html('<img src="assets/img/loader.gif" width="25px">');
                },
                complete: function(){
                	$("#ikani").removeClass('btn-default');
					$("#ikani").addClass('btn-success');
                	$("#ikani").html('Complete');
                	$("#artist").val("");
			        $("#title").val("");
			        $("#album").val("");
			        $("#song").val("");
                	setTimeout(function(){
                		$("#ikani").removeClass('btn-success');
						$("#ikani").addClass('btn-primary');
						$("#ikani").html('Submit Song');
                	},2000)
                },
                success: function(data)
                {
                    if(data==1){
                    	UIkit.notification({
						message: '<span uk-icon=\'icon: check\'> </span> Your Song Has Been Submitted! ',
						status: 'primary',
						pos: 'top-right',
						timeout: 1000
					});

                    }
                    else{
                    	UIkit.notification({
						message: '<span uk-icon=\'icon: warning\'> </span> Error! ',
						status: 'danger',
						pos: 'top-right',
						timeout: 1000
					});
                    }
                },
                error: function() 
                {
                	UIkit.notification({
						message: '<span uk-icon=\'icon: warning\'> </span> Fatal Error, Try again later! ',
						status: 'danger',
						pos: 'top-right',
						timeout: 3000
					});
                }           
           });
        }
	})
</script>