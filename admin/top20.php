<?php 
	require ("../inc/functions.php");
	require("assets.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
                <div uk-grid>

                    <?php
                        $query = mysqli_query($mysqli,"SELECT * FROM music m INNER JOIN top20 t WHERE m.music_id = t.music_id ORDER BY position ASC");
                        while($res=mysqli_fetch_array($query)){

                     ?>

                    <div class="uk-width-1-4@s uk-width-1-1" style="margin-bottom: 10px !important; margin-top: 10px !important;">
                        <center>
                           <br/> 
                           <div class="uk-inline">
                                <img src="../assets/img/covers/<?php echo $res['art'] ?>" width=100px>
                               <div class="uk-overlay-default uk-position-bottom uk-dark">
                                <h3> <?php echo $res['position']; ?> </h3>
                            </div>
                           </div>
                           
                           <br/>
                            <p class="uk-margin-remove-bottom truncate"><?php echo $res['title']; ?></p>
                            
                            <p class="uk-margin-remove-top truncate uk-text-meta light"><?php echo $res['artist']; ?></p>
                            
                            <p class="uk-text-meta"><?php echo $res['streams'].' <i class="material-icons">headset</i> '; ?> | <?php echo $res['downloads'].' <i class="material-icons">save_alt</i>'; ?></p>
                        </center>
                    </div>
                    <?php
                }
                ?>

                </div>
            </div>
		</div>
	</div>
</div>