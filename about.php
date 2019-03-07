<?php require("inc/header.php"); ?>
  <script type="text/javascript">
  $(".about").addClass("active");
  $(".artist").removeClass("active");
  $(".news").removeClass("active");
  $(".top20").removeClass("active");
  $(".ztv").removeClass("active");
  $(".music").removeClass("active");
  $(".home").removeClass("active");

</script>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<center><h2>About Zonse Live</h2></center>

			<p>Zonse Live is an entertainment platform that curates and creates urban entertainment content. We are committed to fulfiling our mission of helping aid the growth of the entertainment industry in Malawi, in order to be the leading and accurate source of urban entertainment content and news from Malawi and Africa to Malawi and Africa.</p>

			<div>
				<center><h2>Contact Us</h2></center>
				<div class="row">

					<div class="col-md-12">
						<center>
							<span uk-icon="icon: mail"></span>
							<p><a href="mailto: submit@zonse.live">submit@zonse.live</a></p>
						</center>
					</div>

					<div class="col-md-12">

						<div class="social d-table mx-auto">
						    <a class="twitter mx-3 h4 d-inline-block text-secondary" uk-icon="icon: twitter" href="https://twitter.com/ZonseLive" target="_blank">
						      <span class="sr-only">View our Twitter Profile</span>
						    </a>
						    <a class="facebook mx-3 h4 d-inline-block text-secondary" href="https://www.facebook.com/zonselive/" target="_blank">
						      <i uk-icon="icon: facebook"></i>
						      <span class="sr-only">View our Facebook Profile<span>
						    </a>
						    <a class="youtube mx-3 h4 d-inline-block text-secondary" href="https://www.youtube.com/channel/UC1UZSC5D655TlES1GzXl3HA" target="_blank">
						      <i uk-icon="icon: youtube"></i>
						      <span class="sr-only">View our Youtube Profile</span>
						    </a>
						    <a class="instagram mx-3 h4 d-inline-block text-secondary" href="https://www.instagram.com/zonselive/" target="_blank">
						      <i uk-icon="icon: instagram"></i>
						      <span class="sr-only">View our Instagram Profile</span>
						    </a>
						</div>

					</div>
				</div>
			</div>
			<div>
				<hr/>
			</div>
			<div style="margin-top: 3%; margin-bottom: 5%">
				<center><h3>Send us a message</h3></center>
				<form id="contact" enctype="multipart/form-data" method="post">
					    <div uk-grid>
					    	<div class="uk-width-1-2@s">
					    		<input type="text" name="artist" id="name" placeholder="Your Name" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-2@s">
					    		<input type="email" name="email" id="email" placeholder="Your Email" class="uk-input">
					    	</div>
					    	<div class="uk-width-1-1@s">
					    
					            <textarea class="uk-textarea" name="msg" id="msg" placeholder="Type your Message" ></textarea>

					    	</div>
					    	<div class="uk-margin">
					    		<button type="submit" class="btn btn-primary" id="ikani">Submit</button>
					    	</div>

					    </div>
					</form>
			</div>
		</div>
		<div class="col-md-3">
			<?php  require("inc/side.php") ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#contact").submit(function(e){
		e.preventDefault();
		var name = $("#name").val();
		var email= $("#email").val();
		var msg = $("#msg").val();
		if(name=="" || email=="" || msg==""){
			UIkit.notification({
				message: '<span uk-icon=\'icon: warning\'> </span> Please fill in all fields ',
				status: 'warning',
				pos: 'top-right',
				timeout: 3000
			});
		}
		else{
			$.ajax({

                url: "files/sendMail.php",
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
						$("#ikani").html('Submit');
                	},2000)
                },
                success: function(data)
                {
                    if(data==1){
                    	UIkit.notification({
						message: '<span uk-icon=\'icon: check\'> </span> Your Message Has been Sent! ',
						status: 'primary',
						pos: 'top-right',
						timeout: 1500
					});

                    }
                    else{
                    	UIkit.notification({
						message: '<span uk-icon=\'icon: warning\'> </span> Error! ',
						status: 'danger',
						pos: 'top-right',
						timeout: 1500
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
	});
</script>
<?php require("inc/footer.php") ?>