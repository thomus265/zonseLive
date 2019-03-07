<?php 
	require ("../inc/functions.php");
	require("assets.php");
?>



<div class="container" style="min-height: 85vh">

    <div class="row">
        <div class="col-md-3">
            
        </div>

        <div class="col-md-6">
            <center><h3>Add Song To Music List</h3></center>

            <form id="uploadSong" enctype="multipart/form-data" method="post">
                <div class="form-group ">
                    <label for="artist">Artist</label>
                    <input type="text" name="artist" id="artist" placeholder="Artist" class="form-control">

                </div>
                <div class="form-group">
                    <label for="title">Song Title</label>
                    <input type="text" name="title" id="title" placeholder="Song Title" class="form-control">
                </div>
                <div class="form-group">
                    
                    <div uk-form-custom="target:true">
                        <label for="album">Album/Song Art</label>
                        <input type="file" name="album" id="album" class="form-control " accept="image/*">
                        <input class="uk-input uk-form-width-large" type="text" placeholder="Select file" disabled>
                        <p class="uk-margin-remove-top uk-text-meta light ">Files allowed : jpg, jpeg, png</p>
                    </div>
                </div>
                <div class="form-group">
                    
                    <div uk-form-custom="target: true">
                        <label for="song">Song</label> <br/>
                        <input type="file" name="song" id="song" class="form-control" accept="audio/mp3">
                        <input class="uk-input uk-form-width-large" type="text" placeholder="Select file" disabled>
                        <p class="uk-margin-remove-top uk-text-meta light">Files allowed : mp3</p>
                    </div>
                    
                    
                </div>
                <div class="form-group">
                    <button type="submit" id="ikani" class="btn btn-primary">Upload Song</button>
                </div>

                <div class="form-group" id="output">
                    <div class='progress' id="progressDivId">
                        <div class='progress-bar btn-primary' id='progressBar'></div>
                        <div class='percent' id='percent'>0%</div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
        

    $('#ikani').click(function () {

        var artist=$("#artist").val();
        var title=$("#title").val();
        var album=$("#album").val();
        var song=$("#song").val();

        if(artist==""){
            alert("Please Fill in all fields");
        }
        else{
    	    $('#uploadSong').ajaxForm({
                target: '#outputImage',
                url: 'files/uploadSong.php',
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
                          
                          
                          $("#ikani").removeClass('btn-primary');
                                $("#ikani").addClass('btn-success');
                                $("#ikani").html('Upload Complete')
                          setTimeout(function(){
                                $("#ikani").addClass('btn-primary');
                                $("#ikani").removeClass('btn-success');
                                $("#ikani").html('Song Uploaded');
                            },1000);
                          $("#ikani").show();
                          $("#progressDivId").hide();
                          setTimeout(function(){
                                location.reload();
                            },2000);
                          
                          
                          

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
</html>