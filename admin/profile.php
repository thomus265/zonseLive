<?php 
	require ("../inc/functions.php");
	require("assets.php");
	$q=mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = '$session_id'");
	while($res=mysqli_fetch_array($q)){
		$name = $res['userName'];
		$email= $res['email'];
		$img = $res['img'];
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-6">

			<center>
				<img src="../assets/img/user/<?php echo $img ?>" class="img-responsive" width="300px">
				<p class="uk-margin-remove-bottom"><?php echo $name ?></p>
				<p class="uk-margin-remove-top uk-text-meta"><?php echo $email ?></p>
				<a href="javascript: deleteUser(<?php echo $session_id ?>)" class="btn btn-danger">Delete</a>
			</center>

		</div>

		<div class="col-md-6">
			<center><h3>Add New User</h3></center>
			<form id="updUserForm" enctype="multipart/form-data" method="post">
        		<div class="form-group col-md-12">
        			<label for="name" class="col-form-label">Username</label>
        			<input class="form-control" type="text" name="username" id="name" value="<?php echo $name ?>">
        		</div>
        		<div class="form-group col-md-12">
        			<label for="mail" class="col-form-label">Email</label>
        			<input class="form-control" type="text" name="mail" id="mail" value="<?php echo $email; ?>">
        		</div>
        		<div class="form-group col-md-12">
        			<label for="pass" class="col-form-label">Password</label>
        			<input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
        		</div>
        		<div class="form-group col-md-12">
        			<label for="pass2" class="col-form-label">Comfirm Password</label>
        			<input class="form-control" type="password" name="pass2" id="pass2" placeholder="Comfirm Password">
        		</div>
        		<div class="form-group col-md-12">
        			<label for="img" class="col-form-label">User Image</label>
        			<input class="form-control" type="file" name="img" id="img" accept="image/*">
        		</div>

        		<input type="text" name="id" value="<?php echo $session_id ?>" hidden>
        		<input type="text" name="old" value="<?php echo $img ?>" hidden>

				<button type="submit" class="btn btn-primary col-md-12" id="subBtn">Submit</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

	function deleteUser(id){

		$.ajax({
          url: "files/deleteUser.php",
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

	$("#updUserForm").submit(function(e){
		e.preventDefault();
		var name = $("#name").val();
		var mail = $("#mail").val();
		var pass = $("#pass").val();
		var pass2 = $("#pass2").val();

		if(pass != pass2){
			$("#subBtn").removeClass('btn-primary');
				$("#subBtn").addClass('btn-warning');
				$("#subBtn").html('Passwords Do not match');
			setTimeout(function(){
				$("#subBtn").removeClass('btn-warning');
				$("#subBtn").addClass('btn-primary');
				$("#subBtn").html('submit');
			},3000);
		}

		else{

		if(name=="" || mail=="" || pass ==""){
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

                url: "files/upduser.php",
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
                	$("#subBtn").html(xhr);
                },
                error: function(){

                }
            });

		}
	}
	});

</script>