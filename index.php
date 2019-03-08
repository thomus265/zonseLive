<?php 

require('inc/header.php')

?>
<section id="home_content">
  <div class="container-fluid" style="margin-top: 3%">
    <div class="row">
      <div class="col-sm-2">
        
      </div>
      <div class="col-sm-7 body-main">
        <center>
          <div id="bannerAd">
            <img src="assets/img/ads/crystal.jpg" width="100%" height="30px">
          </div>
        </center>

        <div class="news-carousel">
          <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="clsActivated: uk-transition-active; center: true; autoplay: true">
            <ul class="uk-slider-items uk-grid">
              <?php 
                $qry = mysqli_query($mysqli,"SELECT  * FROM news ORDER BY news_id DESC LIMIT 4");
                        while($rs = mysqli_fetch_array($qry)){
              ?>
                <li class="uk-width-3-3">
                    <div class="uk-panel">
                        <img src="assets/img/blog/<?php echo $rs['img'] ?>" alt="" class="img-responsive" width="100%">
                        <div style="padding: 10px;" class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                        <a href="blogSingle.php?news_id=<?php echo $rs['news_id'] ?>"><h5 class="uk-margin-remove"><?php echo $rs['title'] ?></h5></a>
                            
                        </div>
                    </div>
                </li>
                <?php
              }
              ?>
            </ul>

            <a class="uk-position-center-left uk-position-small slider-control uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small slider-control uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

          </div>
        </div>

        <div class="latest-news" style="margin-top: 5%"> 
          <h2 style="font-weight: bold;" >Latest News</h2>
          <div uk-slider>

            <div class="uk-position-relative">

                <div class="uk-slider-container uk-light">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
                      <?php 

                        $qry = mysqli_query($mysqli,"SELECT  * FROM news ORDER BY news_id DESC LIMIT 4");
                        while($rs = mysqli_fetch_array($qry)){

                      ?>
                        <li>
                          <div class="uk-panel">
                            <img src="assets/img/blog/<?php echo $rs['img'] ?>" alt="">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center panel-small" style="padding: 0 !important;">
                              <a class="uk-margin-remove-bottom" href="blogSingle.php?news_id=<?php echo $rs['news_id'] ?>"><p class="truncate"><?php echo $rs['title'] ?><p></a>
                            </div>
                          </div>
                        </li>  
                        <?php
                      }
                      ?>                      
                    </ul>
                </div>

                <div class="uk-hidden@s uk-light">
                    <a class="uk-position-center-left uk-position-small blue-text" href="#"  uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small blue-text" href="#"  uk-slidenav-next uk-slider-item="next"></a>
                </div>

                <div class="uk-visible@s">
                    <a class="uk-position-center-left-out uk-position-small blue-text" href="#" style="margin-right: -5px !important;" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right-out uk-position-small blue-text" style="margin-left: -5px !important;" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

            </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

          </div>

        </div>

        <div class="Latest-videos" style="margin-top: 5%">
          <h2 style="font-weight: bold">Latest Videos</h2>

          <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="center: true; autoplay: true">

            <ul class="uk-slider-items uk-grid">
                
                  <?php 
                    $query= mysqli_query($mysqli,"SELECT * FROM videos ORDER BY v_id DESC LIMIT 4");
                    while($res=mysqli_fetch_array($query)){
                  ?>
                <li class="uk-width-3-4">
                    <div class="uk-panel">
                      <div class="uk-inline uk-dark">
                        <img src="assets/video/snapshots/<?php echo $res['snapshot'] ?>">
                        <div class="uk-overlay-dark uk-position-cover">
                            <div class="uk-position-center">
                                <a href="#one" uk-toggle  class="play_link"><span uk-icon="icon: play-circle; ratio:3"></span></a>
                            </div>
                        </div>
                    </div>
                    <div id="one" class="uk-flex-top" uk-modal>
                        <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                          <button class="uk-modal-close-outside" type="button" uk-close></button>
                          <video controls preload="none" playsinline uk-video="autoplay: true" width="1000px" height="400px" poster="assets/video/snapshots/<?php echo $res['snapshot'] ?>">
                            <source src="assets/video/<?php echo $res['v_file'] ?>" type="video/mp4">
                          </video>
                        </div>
                      </div>
                      
                    </div>
                </li>
                <?php
                  }
                ?>
        

            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover " href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover " href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>
        </div>

        <div class="latest-song" style="margin-top: 5%">
          <h2 style="font-weight: bold">Latest Music</h2>
            <div class="row" style="padding-left: 2%">
              <div class="col-md-12">

                <?php 
                  $query = mysqli_query($mysqli,"SELECT * FROM music ORDER BY music_id  DESC LIMIT 1");
                    while($res=mysqli_fetch_array($query)){
                    ?>
                        
                      <div class="row chart-item" style="width: 102%">
                        <div class="img-cont">
                          <div class="uk-inline uk-dark">
                            <img src="assets/img/covers/<?php echo $res['art'] ?>">
                            <div class="uk-overlay-primary uk-position-cover" style="background: rgba(0,0,0,0.5) !important; margin-right: 20%">
                                <div class="uk-position-center">
                                  <div class="mediPlayer" style=" margin-right: -22%">
                                      <audio oncanplay="javascript: updStream(<?php echo $res['music_id'] ?>)" class="listen" preload="none" data-size="250" src="assets/music/<?php echo $res['song'] ?>"></audio>
                                  </div>
                                </div>
                            </div>

                        </div>

                        </div>
                        <div class="info-cont z-width-expand">
                          <h4 class="uk-margin-remove-bottom t20title"><?php echo $res['title'] ?></h4>
                          <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom t20artist"> <?php echo $res['artist'] ?> <span style="margin-left: 2em" >  </span></p>
                          <p class="uk-margin-remove-top"><a href="assets/music/<?php echo $res['song'] ?>" onclick="javascript: updDownload(<?php echo $res['music_id'] ?>)" uk-icon="icon: download"></a></p>
                        </div>
                      </div>
                  
                  <?php
                }
                ?>
              </div>
            </div>

        </div>

        <div id="bannerAd" style="margin-top: 2%">
          <img src="assets/img/ads/golo.jpg" width="100%" height="50px">
        </div>

      </div>
      <div class="col-sm-3 side">
        <?php require("inc/side.php"); ?>
        
      </div>
    </div>

<?php include("inc/footer.php") ?>

  <script type="text/javascript">
  $(".home").addClass("active");
  $(".news").removeClass("active");
  $(".top20").removeClass("active");
  $(".ztv").removeClass("active");
  $(".music").removeClass("active");
  $(".artist").removeClass("active");
  $(".about").removeClass("active");
</script>

  <script type="text/javascript">

    $(document).ready(function () {
        $('.mediPlayer').mediaPlayer();     
    });

  </script>
</html>
