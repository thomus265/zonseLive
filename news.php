<?php
	require("inc/header.php");
?>
<script type="text/javascript">
  $(".news").addClass("active");
  $(".home").removeClass("active");
  $(".top20").removeClass("active");
  $(".ztv").removeClass("active");
  $(".music").removeClass("active");
  $(".artist").removeClass("active");
  $(".about").removeClass("active");
</script>
<div class="container" id="news_blog_cont">
	<div class="row">
		<section class="col-sm-9 body-main">
			 <center>
	          <div id="bannerAd" style="margin-bottom: 3%">
	            <img src="assets/img/ads/golo.jpg" width="100%" height="30px">
	          </div>
	        </center>
			<div class="news-section margin-bottom">
				<div style="margin-left: 0.5%" class="uk-grid-match uk-child-width-1-2@s uk-margin " uk-grid>
					<?php 
					$sql_news = $dbh->prepare("SELECT  * FROM news");
					if($sql_news->execute()){
					foreach ($sql_news->fetchAll(PDO::FETCH_OBJ) as  $news) {
					?>

					<div>
					   <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2 " uk-grid>
						    <div class="uk-card-media-left uk-cover-container blog-card-img " >
						        <img src="assets/img/blog/<?php echo ($news->img) ?>" alt="" uk-cover>
						        <canvas width="500" height="300"></canvas>
						    </div>
						    <div class="card-details uk-margin-remove-left" style="margin-left: -6% !important">
						        <div class="uk-card-body">
						        	<img src="assets/img/blog/ico/<?php echo($news->ico); ?>" alt="" class="blog-auth-lst">
						        	<a href="#" class="blog-auth-nm">by <?php echo($news->author); ?></a>
						        	<br/><br/>
						            <a href="blogSingle.php?news_id=<?php echo($news->news_id); ?>)" class="head-link uk-card-title  blog-card-title" ><?php echo($news->title); ?></a>
						            <p class="truncate"><?php echo readMore(($news->news),50); ?></p>
						            <p class="uk-text-meta uk-margin-remove-top"><?php echo conv(($news->uploaded)); ?></p>
						        </div>
						    </div>
						</div>    
					</div>
						<?php
						
					}
					}

					?>
				</div>
			</div>
			<div id="bannerAd" style="margin-top: 2%">
          <img src="assets/img/ads/pink.jpg" width="100%" height="50px">
        </div>
		</section>

		<section class="col-sm-3 side">
			<?php require("inc/side.php"); ?>
		</section>
	</div>

	<div class="row">
      <div class="col-md-9">
        
      </div>
      <div class="col-md-3">
        
      </div>
    </div>

</div>
<?php require"inc/footer.php" ?>
