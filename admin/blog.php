<?php 
	require ("../inc/functions.php");
	require("assets.php");
?>
<script src="../assets/js/ckeditor.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div id="editor">
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<center><h2>Blog Posts</h2></center>
			<div class="row">
				<?php 
				$qr=mysqli_query($mysqli,"SELECT * FROM news");
				while($res=mysqli_fetch_array($qr)){
				?>
				<div class="col-md-4" style="margin-top: 3%">
					<img src="../assets/img/blog/<?php echo $res['img'] ?>" alt="image">
					<h6 class="uk-margin-remove-top truncate"><?php echo $res['title']; ?></h6>
					<center>
						<a href="javascript: deletePost(<?php echo $res['news_id'] ?>)" class="btn btn-danger">Delete </a>   <a href="editPost.php?id=<?php echo $res['news_id'] ?>" class="btn btn-primary"> Edit</a>
					</center>
				</div>
				<?php
				}
			?>
			</div>
		</div>

		<div class="col-md-6">
			<center><h2>Add News Post</h2></center>

			<form id="addPost"   method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="title">News Title</label>
						<input type="text" name="title" id="title" class="form-control" placeholder="News Title">
					</div>
					<div class="form-group col-md-6">
						<label for="author">Author</label>
						<input type="text" name="author" id="author" class="form-control" placeholder="Author">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="img">News Image</label>
						<input type="file" name="img" id="img" class="form-control" accept="image/*">
					</div>
					<div class="form-group col-md-6">
						<label for="ico">Author Image</label>
						<input type="file" name="ico" id="ico" class="form-control"  accept="image/*">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="post">Edit your post</label>
						<textarea style="height: 150px" class="form-control" name="post" id="post" placeholder="Edit your post" rows="21">
							
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

	function deletePost(id){
		$.ajax({
              url: "files/deletePost.php",
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

    $('#addPost').submit(function (e) {
    	e.preventDefault();
    	var title = $("#title").val();
    	var author = $("#author").val();

    	var ico = $("#ico").val();
    	var img = $("#img").val();

    	var title = $("#title").val();
    	var post = $("#post").val();

    	if(title=="" || author=="" || ico=="" || img=="" || post==""){
    		alert("please fill in all fields");
    	}
    	else{
    		$.ajax({

                url: "files/uploadPost.php",
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

