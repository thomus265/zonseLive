<?php 
	require ("../inc/functions.php");
	require("assets.php");
	$id= $_GET['id'];
?>
<?php 
				$qr=mysqli_query($mysqli,"SELECT * FROM news WHERE news_id='$id'");
				while($res=mysqli_fetch_array($qr)){
					$title = $res['title'];
					$author= $res['author'];
					$ico = $res['ico'];
					$img = $res['img'];
					$post =$res['news'];
				}
			?>
<script src="../assets/js/ckeditor.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">

		</div>

		<div class="col-md-8">
			<center><h2>Add News Post</h2></center>

			<form id="addPost"   method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="title">News Title</label>
						<input type="text" name="title" id="title" class="form-control" value="<?php echo $title ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="author">Author</label>
						<input type="text" name="author" id="author" class="form-control" value="<?php echo $author ?>">
					</div>

					<input type="text" name="old-img" value="<?php echo $img ?>" hidden>
					<input type="text" name="old-ico" value="<?php echo $ico ?>" hidden>
					<input type="text" name="id" value="<?php echo $id ?>" hidden>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="img">News Image</label>
						<input type="file" name="img" id="img" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="ico">Author Image</label>
						<input type="file" name="ico" id="ico" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="post">Edit your post</label>
						<textarea style="height: 150px" class="form-control" name="post" id="post" placeholder="Edit your post" rows="21">
							<?php echo $post ?>
						</textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-primary" type="submit" id="upload">Upload Post</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>



<script>
    ClassicEditor
        .create( document.querySelector( '#post' ) ),{
        	toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList','NumberedList', 'Blockquote']
        }

</script>


<script type="text/javascript">
	$('#addPost').submit(function (e) {
    	e.preventDefault();
    	var title = $("#title").val();
    	var author = $("#author").val();

    	var title = $("#title").val();
    	var post = $("#post").val();

    	if(title=="" || author=="" || ico=="" || img=="" || post==""){
    		alert("please fill in all fields");
    	}
    	else{
    		$.ajax({

                url: "files/editPost.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    alert(data);
                    location.reload();
                },
                error: function() 
                {
                }           
           });
    	}

    	    
    });

</script>

