<?php require("inc/header.php"); ?>
  <script type="text/javascript">
  $(".ztv").addClass("active");
  $(".news").removeClass("active");
  $(".top20").removeClass("active");
  $(".home").removeClass("active");
  $(".music").removeClass("active");
  $(".artist").removeClass("active");
  $(".about").removeClass("active");
</script>
<div class="container" id="ztv_container">
  <div class="row">
    <div class="col-md-12 container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-8 container-fluid">
            <div class="row">
              <?php 
                $ls = mysqli_query($mysqli,"SELECT * FROM videos ORDER BY v_id DESC LIMIT 1");
                while ($res=mysqli_fetch_array($ls)) {
                  $title=$res['v_title'];
                  $file=$res['v_file'];
                  $snap=$res['snapshot'];
                  $time = $res['uploaded'];
                  $shw = $res['s_id'];
                  $vid = $res['v_id'];

                  $q2 = mysqli_query($mysqli,"SELECT * FROM shows WHERE s_id='$shw' ");
                  while($r2 = mysqli_fetch_array($q2)){
                    $showname = $r2['s_title'];
                  }
                }
                if($res!=""){
              ?>
              <p class="uk-margin-remove-bottom"><?php echo '<h4 class="uk-margin-remove-bottom">'.$showname.' | <small>'.$title.'</small> </h4>' ?></p>
              <div class="blue">
                  <video controls preload="none" playsinline uk-video="autoplay: false" width="1000px" height="400px" poster="assets/video/snapshots/<?php echo $snap?>">
                    <source src="assets/video/<?php echo $file ?>" type="video/mp4">
                  </video> 
                <?php }
                else{
                  
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <?php if($res!=""){ ?>
    <div class="col-md-12">
      <div class="container" style="margin-top: 3%">
        <h5>More From <?php echo $showname ?></h5>
        <div uk-grid>
          <?php 
            $qr = mysqli_query($mysqli,"SELECT * FROM videos WHERE s_id='$shw' AND v_id !=$vid");
            while($r = mysqli_fetch_array($qr)){
              ?>
              <div class="uk-width-1-4@s uk-width-1-2">
                <div class="image" style="width: 100%;">
                  <div class="uk-inline uk-dark">
                    <img src="assets/video/snapshots/<?php echo $r['snapshot'] ?>">
                    <div class="uk-overlay-dark uk-position-cover">
                        <div class="uk-position-center">
                            <a href="#one" uk-toggle  class="play-link"><span uk-icon="icon: play-circle; ratio:3"></span></a>
                        </div>
                    </div>
                </div>

                  <div id="one" class="uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                      <button class="uk-modal-close-outside" type="button" uk-close></button>
                      <video controls preload="none" playsinline uk-video="autoplay: true" width="1000px" height="400px" poster="assets/video/snapshots/<?php echo $r['snapshot'] ?>">
                        <source src="assets/video/<?php echo $r['v_file'] ?>" type="video/mp4">
                      </video>
                    </div>
                  </div>

                  
                </div>
                <p class="uk-margin-remove-top"><?php echo $r['v_title'] ?></p>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>

  <div class="row uk-margin">
    <div class="col-md-12">
      <div class="col-md-12 more-from-zonse">
        <h4 ">More From Zonse</h4>
        <div class="row" uk-grid>
        <?php
            $shw = mysqli_query($mysqli,"SELECT * FROM shows");
            while($res = mysqli_fetch_array($shw)){
              if($res!=""){
              ?>
              <div class="uk-width-1-4@s uk-width-1-2">
                <div class="image " >
                  <a href="javascript: show(<?php echo $res['s_id'] ?>)"><img  width="100%" src="assets/img/shows/<?php echo $res['s_img'] ?>"></a>
                </div>
                <p class="uk-margin-remove-top"><?php echo $res['s_title'] ?></p>
              </div>
              <?php
            }
            else{

            }

            }
            
           ?>
        </div>
          


        </div>
      </div>
    </div>

    <div class="row uk-margin">
    <div class="col-md-12">
      <div class="col-md-12 more-from-zonse">
        <h4 ">Zonse Youtube</h4>
        <div class="row">
        <?php
            $shw = mysqli_query($mysqli,"SELECT * FROM youtube");
            while($res = mysqli_fetch_array($shw)){
              ?>

                <div class="col-md-3" style="margin-top: 2%">
                  <?php echo $res['link']; ?>
                </div>

              <?php

            }
            
           ?>
        </div>
          


        </div>
      </div>
    </div>
  </div>

<?php require("inc/footer.php") ?>

<script type="text/javascript">
  function show(showId){
    $("#ztv_container").load("files/show.php?sid="+showId+"");
  }
  $("iframe").addClass("uk-responsive");
</script>