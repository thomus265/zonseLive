<?php 
$show = $_GET["sid"];
require ("../inc/functions.php");
$qry = mysqli_query($mysqli,"SELECT * FROM shows WHERE s_id=$show");
while($rs = mysqli_fetch_array($qry)){
	$showImg = $rs['s_img'];
	$name = $rs['s_title'];
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<center>
				<img src="assets/img/shows/<?php echo $showImg ?>" width="200px">
				<h3><?php echo $name ?></h3>
			</center>
		</div>
	</div>
	<div class="row" style="margin-top: 2%">
		<?php
			$qr = mysqli_query($mysqli,"SELECT * FROM videos WHERE s_id = '$show'");
			while($res=mysqli_fetch_array($qr)){
				?>
				<div class="col-md-4">

			        <div class="uk-inline uk-dark">
			            <img src="assets/video/snapshots/<?php echo $res['snapshot'] ?>">
			            <div class="uk-overlay-dark uk-position-cover">
			                <div class="uk-position-center">
			                    <a href="#one" uk-toggle  class="play_link"><span uk-icon="icon: play-circle; ratio:3"></span></a>
			                </div>
			            </div>
			        </div>
						<p><?php echo $res['v_title'] ?></p>

					<div id="one" class="uk-flex-top" uk-modal>
                        <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                          <button class="uk-modal-close-outside" type="button" uk-close></button>
                          <video controls preload="none" playsinline uk-video="autoplay: true" width="1000px" height="400px" poster="assets/video/snapshots/<?php echo $res['snapshot'] ?>">
                            <source src="assets/video/<?php echo $res['v_file'] ?>" type="video/mp4">
                          </video>
                        </div>
                      </div>
					
				</div>
				<?php
			}
		 ?>
	</div>
</div>