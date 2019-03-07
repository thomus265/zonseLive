<?php 
    require ("../inc/functions.php");
    require("assets.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <center><h3>All Music</h3></center>
            <div class="container-fluid">
                <div  uk-grid>

                    <?php
                        $query = mysqli_query($mysqli,"SELECT * FROM music");
                        while($res=mysqli_fetch_array($query)){

                     ?>

                    <div class="uk-width-1-3@s uk-width-1-1">
                      <div uk-grid>
                        <div class="uk-width-auto">
                          <img src="../assets/img/covers/<?php echo $res['art'] ?>" width=100px>
                        </div>
                        <div class="uk-width-expand">
                          <p class="truncate uk-margin-remove-bottom"><?php echo $res['title']; ?></p>
                          <p class="truncate uk-margin-remove-top uk-meta-text"><?php echo $res['artist']; ?></p>
                          <p class="truncate"><a href="javascript: deleteSong(<?php echo $res['music_id'] ?>)" class="btn btn-danger">Delete</a></p>
                        </div>
                      </div>
                      <div class="uk-margin-remove-bottom" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                        <div>
                           
                            
                            
                        </div>
                      </div>
                    </div>
                    <?php
                }
                ?>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteSong(id){
        $.ajax({
              url: "files/deleteSong.php",
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
</script>