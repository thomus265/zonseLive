<?php 
	require ("../inc/functions.php");
?>
  <!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ZonseLIve |Admin</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css"">
  <link rel="stylesheet" href="../assets/css/shards.min.css?v=2.1.0">
  <link rel="stylesheet" href="../assets/css/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/IuiaDsNc.woff2">
  <link rel="stylesheet" type="text/css" href="../assets/css/Material+Icons.css">
  <link rel="stylesheet" href="../assets/css/uikit.css">

  <script src="../assets/js/jquery-2.2.3.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/shards.js"></script>
  <script src="../assets/js/jqueryForm.js"></script>
  <script src="../assets/js/audioPlayer.js"></script>
  <script src="../assets/js/uikit.js"></script>
  <script src="../assets/js/uikit-icons.js"></script>

  

  
</head>
<body style="height: 100vh">
	<div>
		<div class="row">
		<div class="col-md-12  navbar-dark bg-dark mb-4">
			<center>
				<a class="navbar-brand" href="index.php"> <img src="../assets/img/logo.png" width="80px"> </a>
			</center>
		</div>
	</div>
	</div>
<div class="container">
	
	<div class="row">
		 <div class="col-md-4">
		 	
		 </div>
		 <div class="col-md-4">
		 	<center><h4>Admin Login</h4></center>
		 	<form id="LoginForm" enctype="multipart/form-data" method="post">
        		<div class="form-group col-md-12">
        			
        			<input class="form-control" type="text" name="name" id="name" placeholder="Username">
        		</div>
        		<div class="form-group col-md-12">
        			
        			<input class="form-control" type="password" name="pass" id="pass" placeholder="password">
        		</div>

        		<center><button type="submit" class="btn btn-primary col-md-12" id="subBtn">Login</button></center>
        	</form>
		 </div>
	</div>
</div>

</body>
<script type="text/javascript">
	$("#LoginForm").submit(function(e){
		e.preventDefault();
		var name = $("#name").val();
		var pass = $("#pass").val();

		if(pass=="" || name==""){
			$("#subBtn").removeClass('btn-primary');
				$("#subBtn").addClass('btn-warning');
				$("#subBtn").html('Please Fill in all fields');
			setTimeout(function(){
				$("#subBtn").removeClass('btn-warning');
				$("#subBtn").addClass('btn-primary');
				$("#subBtn").html('Login');
			},3000);

		}

		else{
			$.ajax({

                url: "files/login.php",
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
                
                success: function(xhr)
                {
                	if(xhr==0){
                		$("#subBtn").removeClass('btn-default');
						$("#subBtn").addClass('btn-warning');
                		$("#subBtn").html("Your Username or password is incorrect");
                		setTimeout(function(){
							$("#subBtn").removeClass('btn-warning');
							$("#subBtn").addClass('btn-primary');
							$("#subBtn").html('Login');
						},3000);

                	}
                	else{
                		$("#subBtn").removeClass('btn-default');
						$("#subBtn").addClass('btn-success');
                		$("#subBtn").html('Redirecting <img src="../assets/img/loader.gif" width="25px">');
                		setTimeout(function(){
							window.location="index.php";
						},1000);
                	}
                	
                },
                error: function(){

                }
            });

		}
	});
</script>
</html>